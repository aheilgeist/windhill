<?php
/*	*Theme Name	: Green-Lantern
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('GL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('GL_TEMPLATE_DIR', get_template_directory());
	define('GL_TEMPLATE_DIR_CORE' , GL_TEMPLATE_DIR . '/core');
	
	require( GL_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' ); // for Default Menus
	require( GL_TEMPLATE_DIR_CORE . '/menu/weblizar_nav_walker.php' ); // for Custom Menus	
	require( GL_TEMPLATE_DIR_CORE . '/comment-box/comment-function.php' ); //for comments
	require(dirname(__FILE__).'/customizer.php');
	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 720; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'weblizar', GL_TEMPLATE_DIR_CORE . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'weblizar' ) );
		// theme support 	
		//$args = array('default-color' => '000000',);
		//add_theme_support( 'custom-background', $args); 
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links'); 
		require_once('theme-option-data.php');
			//Function To get the Options-DATA
		function weblizar_get_options() {
			// Options API
			return wp_parse_args( get_option( 'weblizar_options_gl', array() ), weblizar_default_settings());
		}			
	}
	if ( ! function_exists( 'wl_render_title' ) ) :
	function wl_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'wl_render_title' );
endif;
	function weblizar_scripts()
	{	
		wp_enqueue_style('font-awesome-css', GL_TEMPLATE_DIR_URI . '/css/font-awesome.css');
		wp_enqueue_style('font-awesome-css-4.5.0', GL_TEMPLATE_DIR_URI . '/css/font-awesome-4.5.0/css/font-awesome.css');

		wp_enqueue_style('font-awesome-css', GL_TEMPLATE_DIR_URI . '/css/elegant_font/HTML CSS/style.css');

		wp_enqueue_style('bootstrap', GL_TEMPLATE_DIR_URI . '/css/bootstrap.css');
		wp_enqueue_style('responsive', GL_TEMPLATE_DIR_URI . '/css/responsive.css');
		wp_enqueue_style('green', GL_TEMPLATE_DIR_URI . '/css/skins/green.css');	
		wp_enqueue_style('theme-menu', GL_TEMPLATE_DIR_URI . '/css/theme-menu.css');
		wp_enqueue_style('carousel', GL_TEMPLATE_DIR_URI . '/css/carousel.css');
		// Js
			wp_enqueue_script('jquery');
		wp_enqueue_script('menu', GL_TEMPLATE_DIR_URI .'/js/menu/menu.js', array('jquery'));
		wp_enqueue_script('bootstrap-js', GL_TEMPLATE_DIR_URI .'/js/menu/bootstrap.js');
		wp_enqueue_script('holder-js', GL_TEMPLATE_DIR_URI .'/js/holder.js');
		
		if(is_front_page()) {
		wp_enqueue_script('jquery.themepunch.plugins', GL_TEMPLATE_DIR_URI .'/js/jquery.themepunch.plugins.js');
		wp_enqueue_script('jquery.themepunch.revolution', GL_TEMPLATE_DIR_URI .'/js/jquery.themepunch.revolution.js');
		wp_enqueue_script('jquery.carouFredSel-6.2.1-packed', GL_TEMPLATE_DIR_URI .'/js/jquery.carouFredSel-6.2.1-packed.js');
		wp_enqueue_script('green-laltern', GL_TEMPLATE_DIR_URI .'/js/green-lantern.js');
		wp_enqueue_script('jquery.prettyPhoto', GL_TEMPLATE_DIR_URI .'/js/jquery.prettyPhoto.js');		
		wp_enqueue_style('revolution_settings', GL_TEMPLATE_DIR_URI . '/css/revolution_settings.css');
		wp_enqueue_style('animate', GL_TEMPLATE_DIR_URI . '/css/animate.css');
		wp_enqueue_style('prettyPhoto', GL_TEMPLATE_DIR_URI . '/css/prettyPhoto.css');
		}	
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts'); 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<div class="blog-post-details-item blog-read-more"><a href="'.get_permalink().'">Read More...</a></div>';
	}   
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
		/*sidebar*/
		register_sidebar( array(
			'name' => __( 'Sidebar', 'weblizar' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'weblizar' ),
			'before_widget' => '<div class="sidebar-block">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="h3-sidebar-title sidebar-title">',
			'after_title' => '</h3>'
		) );

		register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'weblizar' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'weblizar' ),
			'before_widget' => '<div class="col-md-3 col-sm-3 footer-col">',
			'after_widget' => '</div>',
			'before_title' => '<div class="footer-title">',
			'after_title' => '</div>',
		) );             
	}
	
	/*
	* Image resize and crop
	*/
	 if ( ( 'add_image_size' ) ) 
	 { add_image_size('wl_media_sidebar_img',54,54,true);
		add_image_size('wl_media_blog_img',800,400,true);
		add_image_size('wl_blog_img',350,150,true);
		/*** blog ***/
		add_image_size('home_blog',360,165,true);
	}
	// code for home slider post types 
	add_filter( 'intermediate_image_sizes', 'weblizar_image_presets');
	function weblizar_image_presets($sizes){
	   $type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value)
		{	if($type=='post'  && $value != 'home_blog' &&  $value != 'wl_media_blog_img' &&  $value != 'wl_media_sidebar_img' && $value != 'wl_blog_img')
			{   unset($sizes[$key]);      }		 
		}
		return $sizes;	 
	}
	if (is_admin()) {
	require_once('core/admin/admin.php');
}
?>