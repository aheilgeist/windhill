<?php
add_action('wp_enqueue_scripts', 'zion_removeScripts' , 20);
function zion_removeScripts() {
//De-Queuing Styles sheet 
wp_dequeue_style( 'green',get_template_directory_uri() .'/css/skins/green.css');
wp_dequeue_style( 'theme-menu',get_template_directory_uri() .'/css/theme-menu.css');
//EN-Queing Style sheet 
wp_enqueue_style( 'style',get_template_directory_uri() .'/style.css');
wp_enqueue_style('flat-blue', get_stylesheet_directory_uri() . '/css/skins/flat-blue.css');
wp_enqueue_style('theme-menu-blue', get_stylesheet_directory_uri() . '/css/theme-menu-blue.css');

}

add_action( 'after_setup_theme', 'zion_setup' ); 	
	function zion_setup()
	{
	add_theme_support( 'title-tag' );
	}?>