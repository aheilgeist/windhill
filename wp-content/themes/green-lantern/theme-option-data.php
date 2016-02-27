<?php
function weblizar_default_settings()
{
	$ImageUrl = GL_TEMPLATE_DIR_URI ."/images/home-slide-1.png";
	$ImageUrl2 = GL_TEMPLATE_DIR_URI ."/images/home-slide-2.png";
	$ImageUrl3 = GL_TEMPLATE_DIR_URI ."/images/home-slide-3.png";
	$ImageUrl4 = GL_TEMPLATE_DIR_URI ."/images/home-ppt1.png";
	$ImageUrl5 = GL_TEMPLATE_DIR_URI ."/images/home-ppt2.png";
	$ImageUrl6 = GL_TEMPLATE_DIR_URI ."/images/home-ppt3.png";
	$ImageUrl7 = GL_TEMPLATE_DIR_URI ."/images/home-ppt4.png";
	$wl_theme_options=array(
			//Logo and Fevicon header			
			'upload_image_logo'=>'',
			'height'=>'55',
			'width'=>'150',
			'_frontpage' => 'on',
			'text_title'=>'off',
			'upload_image_favicon'=>'',			
			'custom_css'=>'',
			'slide_image' => $ImageUrl,
			'slide_title' => __('Revaluation Slider','weblizar'),
			'slide_desc' => __('Green lantern slider is Revaluation Slider.','weblizar'),
			'slide_btn_text' => __('Read More','weblizar'),
			'slide_btn_link' => '#',
			'slide_image_1' => $ImageUrl2,
			'slide_title_1' => __('Touch slider','weblizar'),
			'slide_desc_1' => __('Green lantern slider is Touch Slider.','weblizar'),
			'slide_btn_text_1' => __('Read More','weblizar'),
			'slide_btn_link_1' => '#',
			'slide_image_2' => $ImageUrl3,
			'slide_title_2' => __('Responsive slider','weblizar'),
			'slide_desc_2' => __('Green lantern slider is Responsive Slider.','weblizar'),
			'slide_btn_text_2' => __('Read More','weblizar'),
			'slide_btn_link_2' => '#',
			
			'site_intro_title'=>__('Weblizar theme is the theme that you have been waiting for','weblizar'),
			'site_intro_text'=>__("Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.",'weblizar'),
			'blog_title'=>__('Latest Blog','weblizar'),
			'blog_text'=>__("Lorem Ipsum is simply dummy text of the printing and typesetting industry..",'weblizar'),
			
			//Social media links
			'social_media_in_contact_page_enabled'=>'on',
			'footer_section_social_media_enbled'=>'on',
			'social_media_twitter_link' =>"https://twitter.com/",
			'social_media_facebook_link' =>"https://facebook.com",
			'social_media_linkedin_link' =>"http://linkedin.com/",
			'social_media_google_plus' =>"https://plus.google.com/",

			'footer_customizations' => ' @ 2014 Weblizar Theme',
			'developed_by_text' => __('Theme Developed By','weblizar'),
			'developed_by_weblizar_text' => __('weblizar','weblizar'),
			'developed_by_link' => 'http://weblizar.com/',
			
			'service_1_title'=>__("Idea",'weblizar'),
			'service_1_icons'=>"fa fa-lightbulb-o",
			'service_1_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",'weblizar'),
			'service_1_link'=>"#",
			
			'service_2_title'=>__("Design",'weblizar'),
			'service_2_icons'=>"fa fa-laptop",
			'service_2_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",'weblizar'),
			'service_2_link'=>"#",
			
			'service_3_title'=>__("management",'weblizar'),
			'service_3_icons'=>"fa fa-tasks",
			'service_3_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",'weblizar'),
			'service_3_link'=>"#",
			
			'service_4_title'=>__("Development",'weblizar'),
			'service_4_icons'=>"fa fa-code",
			'service_4_text'=>__("There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",'weblizar'),
			'service_4_link'=>"#",
			'latest_post' => __('Latest Post','weblizar'),
			'blog_text' => __('Lorem Ipsum is simply dummy text of the printing','weblizar'),
			'side_interval' => '1000',
			'side_pause' => 'on',
		);
	return apply_filters( 'weblizar_options_gl', $wl_theme_options );
}

$wl_theme_options = get_option('weblizar_options_gl');
/*
* General Settings
*/
function reset_general_setting()
{
	$wl_theme_options['upload_image_logo']="";
	$wl_theme_options['height']=55;
	$wl_theme_options['width']=150;
	$wl_theme_options['upload_image_favicon']="";
	$wl_theme_options['text_title']="off";	
	$wl_theme_options['custom_css']="";		
	update_option('weblizar_options_gl',$wl_theme_options);
}

/*
* Slide image Settings
*/
function reset_slide_image_setting()
{
	$ImageUrl = get_template_directory_uri()."/images/home-slide-1.png";
	$ImageUrl2 = get_template_directory_uri()."/images/home-slide-2.png";
	$ImageUrl3 = get_template_directory_uri()."/images/home-slide-3.png";
	$wl_theme_options['slide_image'] = $ImageUrl;	
	$wl_theme_options['slide_title'] = "Touch slider";
	$wl_theme_options['slide_desc'] = "Green lantern slider is Touch Slider.";
	$wl_theme_options['slide_btn_text'] = "Read More";
	$wl_theme_options['slide_btn_link'] = "#";
	$wl_theme_options['slide_image_1'] = $ImageUrl2;
	$wl_theme_options['slide_title_1'] = "Revaluation Slider";
	$wl_theme_options['slide_desc_1'] = "Green lantern slider is Revaluation Slider.";
	$wl_theme_options['slide_btn_text_1'] = "Read More";
	$wl_theme_options['slide_btn_link_1'] = "#";
	$wl_theme_options['slide_image_2'] = $ImageUrl3;
	$wl_theme_options['slide_title_2'] = "Responsive slider";
	$wl_theme_options['slide_desc_2'] = "Green lantern slider is Responsive Slider.";
	$wl_theme_options['slide_btn_text_2'] = "Read More";
	$wl_theme_options['slide_btn_link_2'] = "#";
	update_option('weblizar_options_gl', $wl_theme_options);
}

/*
* Service Settings
*/
function reset_service_setting()
{
	$wl_theme_options['service_1_title']="Idea";
	$wl_theme_options['service_1_icons']="fa fa-lightbulb-o";
	$wl_theme_options['service_1_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_1_link']="";
	
	$wl_theme_options['service_2_title']="Design";
	$wl_theme_options['service_2_icons']="fa fa-laptop";
	$wl_theme_options['service_2_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_2_link']="#";
	
	$wl_theme_options['service_3_title']="Management";
	$wl_theme_options['service_3_icons']="fa fa-tasks";
	$wl_theme_options['service_3_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_3_link']="#";
	
	$wl_theme_options['service_4_title']="Development";
	$wl_theme_options['service_4_icons']="fa fa-code";
	$wl_theme_options['service_4_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_4_link']="#";	
	update_option('weblizar_options_gl',$wl_theme_options);
}

/*
* Social Settings
*/
function reset_social_setting()
{
	$wl_theme_options['footer_section_social_media_enbled']="on";	
	$wl_theme_options['social_media_twitter_link']="https://twitter.com/";
	$wl_theme_options['social_media_facebook_link']="https://facebook.com/";
	$wl_theme_options['social_media_linkedin_link']="https://linkedin.com/";
	$wl_theme_options['social_media_google_plus']="https://plus.google.com/";			
	
	update_option('weblizar_options_gl', $wl_theme_options);
}

/*
* footer customizations Settings
*/
function reset_footer_customizations_setting()
{
	$wl_theme_options['footer_customizations']="@ 2014 Weblizar Theme";
	$wl_theme_options['developed_by_text']="Theme Developed By";
	$wl_theme_options['developed_by_weblizar_text']="Weblizar";
	$wl_theme_options['developed_by_link']="http://weblizar.com/";
	update_option('weblizar_options_gl',$wl_theme_options);
}
?>