<?php

class Cornerstone_Layouts_Controller extends Cornerstone_Plugin_Component {

  public function setup() {
    $routing = $this->plugin->component( 'Routing' );
    $routing->add_route('get',  'layout', [$this, 'read']);
    $routing->add_route('post', 'layout-create', [$this, 'create']);
    $routing->add_route('post', 'layout-update', [$this, 'update']);
    $routing->add_route('post', 'layout-delete', [$this, 'delete']);

    $saving = $this->plugin->component( 'Save_Controller' );
    $saving->add_builder_handler('layout', [$this, 'update']);
  }

  public function read($params) {

    $post_id = isset($params['id']) ? (int) $params['id'] : null;

    if (!$post_id) {
      throw new Exception( 'Not found' );
    }

    if ( ! $this->plugin->component('App_Permissions')->user_can('layouts') ) {
      throw new Exception( 'Unauthorized' );
    }

    $record = new Cornerstone_Layout( $post_id );
    return $record->serialize();

  }

  public function create($params) {

    if ( ! $this->plugin->component('App_Permissions')->user_can('layouts.create') && ! $this->plugin->component('App_Permissions')->user_can('layouts.create_from_template') ) {
      throw new Exception( 'Unauthorized' );
    }

    $atts = array( 'settings' => [ 'layout_type' => $params['layoutType'] ] );

    if ( isset( $params['lang'] ) ) {
      $this->plugin->component('Wpml')->switch_lang( $params['lang'] );
    }

    if ( isset( $params['clone'] )) {
      $copy_from = new Cornerstone_Layout( (int) $params['clone'] );
      $atts['regions'] = $copy_from->get_regions();
      $atts['settings'] = $copy_from->get_settings();
    }

    if ( isset( $params['regions'] ) ) {
      $atts['regions'] = $params['regions'];
    }

    if ( isset( $params['settings'] ) ) {
      $atts['settings'] = $params['settings'];
    }

    $record = new Cornerstone_Layout( $atts );

    if (isset( $params['title'] ) ) {
      $record->set_title( $params['title'] );
    }

    $result = $record->save();

    if ( isset( $params['lang'] ) ) {
      $this->plugin->component('Wpml')->switch_back();
    }

    return $result;

  }

  public function delete($params) {

    if ( ! $this->plugin->component('App_Permissions')->user_can('layouts.delete') ) {
      throw new Exception( 'Unauthorized' );
    }

    if ( ! isset($params['id']) || ! $params['id'] ) {
      throw new Exception( 'Attempting to delete Layout without specifying an ID.' );
    }

    $record = new Cornerstone_Layout( (int) $params['id'] );
    return $record->delete();
  }

  public function update($params) {

    if ( ! $this->plugin->component('App_Permissions')->user_can('layouts') ) {
      throw new Exception( 'Unauthorized' );
    }

    if ( ! isset($params['id']) || ! $params['id'] ) {
      throw new Exception( 'Attempting to update Layout without specifying an ID.' );
    }

    $id = (int) $params['id'];

    $record = new Cornerstone_Layout( $id );

    if ( isset( $params['title'] ) && $this->plugin->component('App_Permissions')->user_can('layouts.rename') ) {
      $record->set_title( $params['title'] );
    }

    if ( isset( $params['regions'] ) ) {
      $record->set_regions( $params['regions'] );
    }

    if ( isset( $params['settings'] ) ) {
      $record->set_settings( $params['settings'] );
    }

    return $record->save();

  }

}
