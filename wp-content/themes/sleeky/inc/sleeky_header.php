<?php
/**
 * Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package sleeky
 */

function sleeky_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'sleeky_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/img/banner.jpg',
		'random-default'         => false,
		'flex-width'    		 => true,
		'width'                  => 2560,
		'flex-height'            => true,
		'height'                 => 500,	
		'uploads'       		 => true,
		'header-text'            => false,
		'admin-preview-callback' => 'sleeky_admin_header_image',
	) ) );
/*
*Register a selection of default headers to be displayed by the custom header admin UI.
*/
	register_default_headers( array(
        'mypic' => array(
        'url'   => get_template_directory_uri() . '/img/banner.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/img/banner.jpg',
        'description'   => _x( 'Default header', 'Default header', 'sleeky' )),
    ));
}
add_action( 'after_setup_theme', 'sleeky_custom_header_setup' );

if ( ! function_exists( 'sleeky_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see sleeky_custom_header_setup().
 */
function sleeky_admin_header_image() {
	
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; 
