<?php
/**
 * The Banner Sidebar
 * @package Sleeky
 *
 * @since 1.0.0
 */
if ( (get_header_image() && is_front_page() ) || is_active_sidebar('banner-wide')) { ?>
	<div class="sleeky_banner" style="<?php if ( get_header_image() ) : ?>background-image: url(<?php header_image(); ?>);<?php endif; ?><?php if( get_post_meta($post->ID, 'header_background', true) ) { ?> background-image: url(<?php echo esc_url (the_field('header_background')); ?>); <?php } ?>">
		<?php dynamic_sidebar( 'banner-wide' ); ?>
	</div> <?php
}





