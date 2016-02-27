<?php
/*
=================================================
Register Navmenus For sleeky Theme
@package sleeky
=================================================
*/
if (!function_exists('sleeky_register_menus')){
	function sleeky_register_menus(){
		register_nav_menus(array(
			'primary'   => __('Header Menu', 'sleeky'), 
			'footer' => __('Footer Menu', 'sleeky')
		));
	}
}
add_action('after_setup_theme', 'sleeky_register_menus');
