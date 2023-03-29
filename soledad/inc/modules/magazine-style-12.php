<?php
/**
 * Template display for featured category style 12
 *
 * @since 2.0
 */
?>

<div class="magcat-carousel">
    <div class="magcat-thumb hentry">
        <a href="<?php penci_permalink_fix(); ?>" class="mag-post-thumb<?php echo penci_class_lightbox_enable(); ?>">
			<?php
			/* Display Review Piechart  */
			if ( function_exists( 'penci_display_piechart_review_html' ) ) {
				penci_display_piechart_review_html( get_the_ID(), 'small' );
			}
			?>
			<?php if ( ! get_theme_mod( 'penci_disable_lazyload_layout' ) ) { ?>
                <span class="penci-image-holder penci-lazy"
                      data-bgset="<?php echo penci_get_featured_image_size( get_the_ID(), penci_featured_images_size() ); ?>"
                      href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			</span>
			<?php } else { ?>
                <span class="penci-image-holder"
                      style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), penci_featured_images_size() ); ?>');"
                      href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
			</span>
			<?php } ?>
			<?php if ( has_post_thumbnail() && get_theme_mod( 'penci_home_featured_cat_icons' ) ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<?php penci_fawesome_icon( 'fas fa-play' ); ?>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
					<?php penci_fawesome_icon( 'fas fa-music' ); ?>
				<?php endif; ?>
				<?php if ( has_post_format( 'link' ) ) : ?>
					<?php penci_fawesome_icon( 'fas fa-link' ); ?>
				<?php endif; ?>
				<?php if ( has_post_format( 'quote' ) ) : ?>
					<?php penci_fawesome_icon( 'fas fa-quote-left' ); ?>
				<?php endif; ?>
				<?php if ( has_post_format( 'gallery' ) ) : ?>
					<?php penci_fawesome_icon( 'far fa-image' ); ?>
				<?php endif; ?>
			<?php endif; ?>
        </a>
        <div class="magcat-detail">
            <h3 class="magcat-titlte entry-title matcat-small-title entry-title"><a
                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php $hide_readtime = get_theme_mod( 'penci_home_cat_readtime' ); ?>
			<?php if ( ! get_theme_mod( 'penci_home_featured_cat_author' ) || ! get_theme_mod( 'penci_home_featured_cat_date' ) || get_theme_mod( 'penci_home_featured_cat_comment' ) || get_theme_mod( 'penci_home_cat_views' ) || penci_isshow_reading_time( $hide_readtime ) ): ?>
                <div class="grid-post-box-meta mag-meta matcat-small-meta">
					<?php if ( ! get_theme_mod( 'penci_home_featured_cat_author' ) ) : ?>
                        <span class="featc-author author vcard"><?php echo penci_get_setting( 'penci_trans_by' ); ?> <?php if ( function_exists( 'coauthors_posts_links' ) ) :
		                        coauthors_posts_links();
	                        else: ?>
                                <a class="author-url url fn n"
                                   href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
	                        <?php endif; ?></span>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'penci_home_featured_cat_date' ) ) : ?>
                        <span class="featc-date"><?php penci_soledad_time_link(); ?></span>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_home_featured_cat_comment' ) ) : ?>
                        <span class="featc-comment"><a
                                    href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a></span>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_home_cat_views' ) ) {
						echo '<span class="featc-views">';
						echo penci_get_post_views( get_the_ID() );
						echo ' ' . penci_get_setting( 'penci_trans_countviews' );
						echo '</span>';
					} ?>
					<?php if ( penci_isshow_reading_time( $hide_readtime ) ): ?>
                        <span class="featc-readtime"><?php penci_reading_time(); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php penci_soledad_meta_schema(); ?>
        </div>
    </div>
</div>
