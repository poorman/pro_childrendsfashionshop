<?php

namespace PenciSoledadElementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Loader {
	private static $_instance;

	public $modules_manager;

	private $classes_aliases = array(
		'PenciSoledadElementor\Modules\PanelPostsControl\Module'                       => 'PenciSoledadElementor\Modules\QueryControl\Module',
		'PenciSoledadElementor\Modules\PanelPostsControl\Controls\Penci_Group_Control_Posts' => 'PenciSoledadElementor\Modules\QueryControl\Controls\Penci_Group_Control_Posts',
		'PenciSoledadElementor\Modules\PanelPostsControl\Controls\Query'               => 'PenciSoledadElementor\Modules\QueryControl\Controls\Query',
	);

	/**
	 * Plugin constructor.
	 */
	private function __construct() {
		spl_autoload_register( array( $this, 'autoload' ) );

		$this->includes();
		$this->setup_hooks();
	}

	private function includes() {
		require PENCI_ELEMENTOR_PATH . 'includes/modules-manager.php';
		require PENCI_ELEMENTOR_PATH . 'includes/helper.php';
		require PENCI_ELEMENTOR_PATH . 'includes/utils.php';
	}

	private function setup_hooks() {
		add_action( 'elementor/init', array( $this, 'on_elementor_init' ) );
		add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categories' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'enqueue_editor_styles' ) );
		//add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'enqueue_editor_scripts' ));
		add_action( 'elementor/frontend/before_register_scripts', array( $this, 'register_frontend_scripts' ) );

		//handle select2 ajax search
		add_action( 'wp_ajax_penci_select2_search_post', [ $this, 'select2_ajax_posts_filter_autocomplete' ] );
		add_action( 'wp_ajax_nopriv_penci_select2_search_post', [ $this, 'select2_ajax_posts_filter_autocomplete' ] );

		add_action( 'wp_ajax_penci_select2_get_title', [ $this, 'select2_ajax_get_posts_value_titles' ] );
		add_action( 'wp_ajax_nopriv_penci_select2_get_title', [ $this, 'select2_ajax_get_posts_value_titles' ] );
	}

	/**
	 * @return \Elementor\Plugin
	 */

	public static function elementor() {
		return \Elementor\Plugin::$instance;
	}

	/**
	 * @return Plugin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * @Register Control Select2
	 */
	public function register_controls( $controls_manager ) {
		require_once( __DIR__ . '/includes/select2.php' );
		require_once( __DIR__ . '/includes/autocomplete.php' );
		$controls_manager->register( new \PenciSoledadElementor\Controls\Select2() );
		$controls_manager->register( new \PenciSoledadElementor\Controls\Autocomplete() );
	}

	public function autoload( $class ) {
		if ( 0 !== strpos( $class, __NAMESPACE__ ) ) {
			return;
		}

		$has_class_alias = isset( $this->classes_aliases[ $class ] );

		// Backward Compatibility: Save old class name for set an alias after the new class is loaded
		if ( $has_class_alias ) {
			$class_alias_name = $this->classes_aliases[ $class ];
			$class_to_load    = $class_alias_name;
		} else {
			$class_to_load = $class;
		}

		if ( ! class_exists( $class_to_load ) ) {
			$filename = strtolower( preg_replace( array(
						'/^' . __NAMESPACE__ . '\\\/',
						'/([a-z])([A-Z])/',
						'/_/',
						'/\\\/'
					), array( '', '$1-$2', '-', DIRECTORY_SEPARATOR ), $class_to_load ) );
			$filename = PENCI_ELEMENTOR_PATH . $filename . '.php';

			if ( is_readable( $filename ) ) {
				include( $filename );
			}
		}

		if ( $has_class_alias ) {
			class_alias( $class_alias_name, $class );
		}
	}

	public function widget_categories( $elements_manager ) {
		// Add our categories
		$category_prefix = 'penci-';

		$elements_manager->add_category( $category_prefix . 'archive-builder', [
				'title' => '[PenciDesign] Archive Builder',
				'icon'  => 'fa fa-plug',
			] );

		// Hack into the private $categories member, and reorder it so our stuff is at the top
		$reorder_cats = function () use ( $category_prefix ) {
			uksort( $this->categories, function ( $keyOne, $keyTwo ) use ( $category_prefix ) {
				if ( substr( $keyOne, 0, 6 ) == $category_prefix ) {
					return - 1;
				}
				if ( substr( $keyTwo, 0, 6 ) == $category_prefix ) {
					return 1;
				}

				return 0;
			} );

		};

		$reorder_cats->call( $elements_manager );
	}

	/**
	 *  Editor enqueue styles.
	 */
	public function enqueue_editor_styles() {
		wp_enqueue_style( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/css/editor.css', array( 'elementor-editor' ), '' );
	}

	public function enqueue_editor_scripts() {
		if ( defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			return;
		}

		if ( version_compare( ELEMENTOR_VERSION, '3.0.0', '<' ) ) {
			wp_enqueue_script( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/js/editor.bak.js', array( 'backbone-marionette' ), PENCI_SOLEDAD_VERSION, true );
		} else {
			wp_enqueue_script( 'penci-elementor', PENCI_ELEMENTOR_URL . 'assets/js/editor.min.js', array(
				'backbone-marionette',
				'elementor-common',
				'elementor-editor-modules',
				'elementor-editor-document',
			), PENCI_SOLEDAD_VERSION, true );
		}

		wp_localize_script( 'penci-elementor', 'PenciElementorConfig', array(
			'i18n'     => array(),
			'isActive' => true,
		) );
	}

	/**
	 * Register scripts
	 */
	public function register_frontend_scripts() {
		$api = get_theme_mod( 'penci_map_api_key', '' );
		if ( $api ) {
			$map_url = 'https://maps.google.com/maps/api/js?key=' . esc_attr( $api );
		} else {
			$map_url = get_template_directory_uri() . '/js/mapsJavaScriptAPI.js';
		}
		wp_register_script( 'google-map', esc_url( $map_url ), array(), PENCI_SOLEDAD_VERSION, true );
		wp_register_script( 'jquery.plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js', array( 'jquery' ), '2.0.2', true );
		wp_register_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), '2.0.2', true );
		wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '2.0.3', true );
		wp_register_script( 'jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array(
			'jquery',
			'waypoints'
		), '1.0', true );
		wp_register_script( 'penci-button-popup', get_template_directory_uri() . '/inc/elementor/assets/js/penci-button-popup.js', array( 'jquery' ), '1.0', true );
	}

	public function on_elementor_init() {
		$this->modules_manager = new Manager();
	}

	public function select2_ajax_posts_filter_autocomplete() {
		$post_type   = 'any';
		$source_name = 'post_type';

		if ( ! empty( $_GET['post_type'] ) && 'by_id' != $_GET['post_type'] && 'current_query' != $_GET['post_type'] && 'related_posts' != $_GET['post_type'] ) {
			$post_type = sanitize_text_field( $_GET['post_type'] );
		}

		if ( ! empty( $_GET['source_name'] ) ) {
			$source_name = sanitize_text_field( $_GET['source_name'] );
		}

		$search  = ! empty( $_GET['term'] ) ? sanitize_text_field( $_GET['term'] ) : '';
		$results = $post_list = [];
		switch ( $source_name ) {
			case 'taxonomy':
				$post_list = wp_list_pluck( get_terms( $post_type, [
						'hide_empty' => false,
						'orderby'    => 'name',
						'order'      => 'ASC',
						'search'     => $search,
						'number'     => '10',
					] ), 'name', 'term_id' );
				break;
			default:
				$post_list = $this->get_query_post_list( $post_type, 10, $search );
		}

		if ( ! empty( $post_list ) ) {
			foreach ( $post_list as $key => $item ) {
				$results[] = [ 'text' => $item, 'id' => $key ];
			}
		}
		wp_send_json( [ 'results' => $results ] );
	}

	public function get_query_post_list( $post_type = 'any', $limit = - 1, $search = '' ) {
		global $wpdb;
		$where = '';
		$data  = [];

		if ( - 1 == $limit ) {
			$limit = '';
		} elseif ( 0 == $limit ) {
			$limit = "limit 0,1";
		} else {
			$limit = $wpdb->prepare( " limit 0,%d", esc_sql( $limit ) );
		}

		if ( 'any' === $post_type ) {
			$in_search_post_types = get_post_types( [ 'exclude_from_search' => false ] );
			if ( empty( $in_search_post_types ) ) {
				$where .= ' AND 1=0 ';
			} else {
				$where .= " AND {$wpdb->posts}.post_type IN ('" . join( "', '", array_map( 'esc_sql', $in_search_post_types ) ) . "')";
			}
		} elseif ( ! empty( $post_type ) ) {
			$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_type = %s", esc_sql( $post_type ) );
		}

		if ( ! empty( $search ) ) {
			$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_title LIKE %s", '%' . esc_sql( $search ) . '%' );
		}

		$query   = "select post_title,ID  from $wpdb->posts where post_status = 'publish' $where $limit";
		$results = $wpdb->get_results( $query );
		if ( ! empty( $results ) ) {
			foreach ( $results as $row ) {
				$data[ $row->ID ] = $row->post_title;
			}
		}

		return $data;
	}

	public function select2_ajax_get_posts_value_titles() {
		if ( empty( array_filter( $_POST['id'] ) ) ) {
			wp_send_json_error( [] );
		}

		$ids         = array_map( 'intval', $_POST['id'] );
		$source_name = ! empty( $_POST['source_name'] ) ? sanitize_text_field( $_POST['source_name'] ) : '';

		switch ( $source_name ) {
			case 'taxonomy':
				$response = wp_list_pluck( get_terms( sanitize_text_field( $_POST['post_type'] ), [
						'hide_empty' => false,
						'orderby'    => 'name',
						'order'      => 'ASC',
						'include'    => implode( ',', $ids ),
					] ), 'name', 'term_id' );
				break;
			default:
				$post_info = get_posts( [
					'post_type' => sanitize_text_field( $_POST['post_type'] ),
					'include'   => implode( ',', $ids )
				] );
				$response  = wp_list_pluck( $post_info, 'post_title', 'ID' );
		}

		if ( ! empty( $response ) ) {
			wp_send_json_success( [ 'results' => $response ] );
		} else {
			wp_send_json_error( [] );
		}
	}
}

Loader::instance();

