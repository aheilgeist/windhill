<?php
add_action( 'customize_register', 'weblizar_gl_customizer' );
function weblizar_gl_customizer( $wp_customize ) {
		wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');
	$ImageUrl1 =  esc_url(get_template_directory_uri() ."/images/home-slide-1.png");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/home-slide-2.png");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/home-slide-3.png");
	$ImageUrl4 = esc_url(get_template_directory_uri() ."/images/home-ppt1.png");
	$ImageUrl5 = esc_url(get_template_directory_uri() ."/images/home-ppt2.png");
	$ImageUrl6 = esc_url(get_template_directory_uri() ."/images/home-ppt3.png");
	$ImageUrl7 = esc_url(get_template_directory_uri() ."/images/home-ppt4.png");
	
	/* Genral section */
		/* Slider Section */
	$wp_customize->add_panel( 'weblizar_gl_theme_option', array(
    'title' => __( 'Theme Options','weblizar' ),
    'priority' => 30, // Mixed with top-level-section hierarchy.
) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => 'Theme General Options',
            'description' => 'Here you can customize Your theme\'s general Settings',
			'panel'=>'weblizar_gl_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
		$wl_theme_options = weblizar_default_settings();
	$wp_customize->add_setting(
		'weblizar_options_gl[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'weblizar_gl_front_page', array(
		'label'        => __( 'Show Front Page', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'weblizar_options_gl[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'weblizar_gl_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'weblizar_gl_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'weblizar' ),
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'weblizar_gl_logo_height', array(
		'label'        => __( 'Logo Height', 'weblizar' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[height]',
	) );
	$wp_customize->add_control( 'weblizar_gl_logo_width', array(
		'label'        => __( 'Logo Width', 'weblizar' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[width]',
	) );
	
	$wp_customize->add_setting(
		'weblizar_options_gl[upload_image_favicon]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_upload_image_favicon', array(
		'label'        => __( 'Custom favicon', 'weblizar' ),
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[upload_image_favicon]',
	) ) );
	$wp_customize->add_setting(
		'weblizar_options_gl[latest_post]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['latest_post'],
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'weblizar_gl_latest_post', array(
		'label'        => __( 'Home Blog Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[latest_post]',
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[blog_text]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['blog_text'],
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'weblizar_gl_blog_text', array(
		'label'        => __( 'Home Blog Description', 'weblizar' ),
		'type'=>'text',
		'section'    => 'general_sec',
		'settings'   => 'weblizar_options_gl[blog_text]',
	) );
	/* Slider options */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => 'Theme Slider Options',
			'panel'=>'weblizar_gl_theme_option',
            'description' => 'Here you can add slider images',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wp_customize->add_setting(
		'weblizar_options_gl[side_interval]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['side_interval'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_integer'
		)
	);
	$wp_customize->add_control( 'weblizar_gl_slide_side_interval', array(
		'label'        => __( 'Slide Show Interval', 'weblizar' ),
		'type'=>'select',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[side_interval]',
		'choices' => array(
            '2000' => '2000',
            '3000' => '3000',
			'4000' => '4000',
			'5000' => '5000',
			'6000' => '6000',
			'7000' => '7000',
			'8000' => '8000',
			'9000' => '9000',
			'10000' => '10000',
        ),
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[side_pause]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['side_interval'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text'
		)
	);
	$wp_customize->add_control( 'weblizar_gl_slide_side_pause', array(
		'label'        => __( 'Pause On Mouse Hover', 'weblizar' ),
		'type'=>'select',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[side_pause]',
		'choices' => array(
            'yes' => 'Yes',
            'no' => 'No'
        ),
	) );
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl1,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl2,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$ImageUrl3,
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_desc]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_desc_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_desc_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_desc_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_text_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_text_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'weblizar_gl_sanitize_text',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_setting(
		'weblizar_options_gl[slide_btn_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_btn_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
			
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image', array(
		'label'        => __( 'Slider Image One', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image]'
	) ) );
	$wp_customize->add_control( 'weblizar_gl_slide_title', array(
		'label'        => __( 'Slider title one', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_desc', array(
		'label'        => __( 'Slider description one', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_desc]'
	) );
	$wp_customize->add_control( 'Slider button one', array(
		'label'        => __( 'Slider Button Text One', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text]'
	) );
	
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink', array(
		'label'        => __( 'Slider Button Link', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image_1', array(
		'label'        => __( 'Slider Image Two ', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image_1]'
	) ) );
	
	$wp_customize->add_control( 'weblizar_gl_slide_title_1', array(
		'label'        => __( 'Slider Title Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title_1]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_desc_1', array(
		'label'        => __( 'Slider Description Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_desc_1]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btn_1', array(
		'label'        => __( 'Slider Button Text Two', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text_1]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink_1', array(
		'label'        => __( 'Slider Link Two', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'weblizar_gl_slider_image_2', array(
		'label'        => __( 'Slider Image Three', 'weblizar' ),
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_image_2]'
	) ) );
	$wp_customize->add_control( 'weblizar_gl_slide_title_2', array(
		'label'        => __( 'Slider Title Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_title_2]'
	) );
	
	$wp_customize->add_control( 'weblizar_gl_slide_desc_2', array(
		'label'        => __( 'Slider Description Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_desc_2]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btn_2', array(
		'label'        => __( 'Slider Button Text Three', 'weblizar' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_text_2]'
	) );
	$wp_customize->add_control( 'weblizar_gl_slide_btnlink_2', array(
		'label'        => __( 'Slider Button Link Three', 'weblizar' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'weblizar_options_gl[slide_btn_link_2]'
	) );
	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","incredible"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));
	$wp_customize->add_setting(
	'weblizar_options_gl[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
			)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_4_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_icons']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text'
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_4_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_title']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
			)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_3_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
	'weblizar_options_gl[service_4_text]',
		array(
		'default'=>esc_attr($wl_theme_options['service_4_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options',
			)
	);
	$wp_customize->add_control(
    new weblizar_gl_Customize_Misc_Control(
        $wp_customize,
        'service_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	$wp_customize->add_control( 'service_one_title', array(
		'label'        => __( 'Service One Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_1_title]'
	) );
	
		$wp_customize->add_control('weblizar_options_gl[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_1_icons]'
        )
    );
	
	$wp_customize->add_control( 'service_one_text', array(
		'label'        => __( 'Service One Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_1_text]'
	) );
		$wp_customize->add_control(
    new weblizar_gl_Customize_Misc_Control(
        $wp_customize,
        'service_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'service_two_title', array(
		'label'        => __( 'Service Two Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_2_title]'
	) );
		$wp_customize->add_control( 'weblizar_options_gl[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_2_icons]'
        )
    );
	$wp_customize->add_control( 'weblizar_gl_service_two_text', array(
		'label'        => __( 'Service Two Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_2_text]'
	) );
		$wp_customize->add_control(new weblizar_gl_Customize_Misc_Control(
        $wp_customize, 'weblizar_gl_service_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'weblizar_gl_service_three_title', array(
		'label'        => __( 'Service Three Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_3_title]'
	) );
	$wp_customize->add_control('weblizar_options_gl[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_3_icons]'
        )
    );
	$wp_customize->add_control( 'weblizar_gl_service_three_text', array(
		'label'        => __( 'Service Three Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_3_text]'
	) );
	
	$wp_customize->add_control(new weblizar_gl_Customize_Misc_Control(
        $wp_customize, 'weblizar_gl_service_options4-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'weblizar_gl_service_four_title', array(
		'label'        => __( 'Service Four Title', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_4_title]'
	) );
	$wp_customize->add_control('weblizar_options_gl[service_4_icons]',
        array(
			'label'        => __( 'Service Icon Four', 'weblizar' ),
			'description'=>__('<a href="http://fontawesome.bootstrapcheatsheets.com">FontAwesome Icons</a>','weblizar'),
            'section'  => 'service_section',
			'type'=>'text',
			'settings'   => 'weblizar_options_gl[service_4_icons]'
        )
    );
	$wp_customize->add_control( 'weblizar_gl_service_four_text', array(
		'label'        => __( 'Service Four Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'weblizar_options_gl[service_4_text]'
	) );
/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","weblizar"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_in_contact_page_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_in_contact_page_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'social_media_in_contact_page_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_in_contact_page_enabled]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'weblizar' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'social_media_twitter_link', array(
		'label'        =>  __('Twitter', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_twitter_link]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'social_media_facebook_link', array(
		'label'        => __( 'Facebook', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_facebook_link]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'social_media_linkedin_link', array(
		'label'        => __( 'LinkedIn', 'social_media_incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_linkedin_link]'
	) );
	
	$wp_customize->add_setting(
	'weblizar_options_gl[social_media_google_plus]',
		array(
		'default'=>esc_attr($wl_theme_options['social_media_google_plus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'social_media_google_plus', array(
		'label'        => __( 'Goole+', 'weblizar' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'weblizar_options_gl[social_media_google_plus]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","weblizar"),
	'panel'=>'weblizar_gl_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'weblizar_options_gl[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Footer Customization Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'weblizar_gl_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_weblizar_text', array(
		'label'        => __( 'Footer Customization Text', 'weblizar' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'weblizar_options_gl[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Footer Customization Text', 'weblizar' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'weblizar_options_gl[developed_by_link]'
	) );
	
	$wp_customize->add_section( 'gl_more' , array(
				'title'      	=> __( 'Upgrade to Green-Lantern Premium', 'weblizar' ),
				'priority'   	=> 999,
				'panel'=>'weblizar_gl_theme_option',
			) );

			$wp_customize->add_setting( 'gl_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_gl_Control( $wp_customize, 'gl_more', array(
				'label'    => __( 'Green-Lantern Premium', 'weblizar' ),
				'section'  => 'gl_more',
				'settings' => 'gl_more',
				'priority' => 1,
			) ) );
}
function weblizar_gl_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function weblizar_gl_sanitize_checkbox( $input ) {
    return $input;
}
function weblizar_gl_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'weblizar_gl_Customize_Misc_Control' ) ) :
class weblizar_gl_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_gl_Control' ) ) :
class More_gl_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/green-lantern-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Incredible Premium','weblizar'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri() .'/images/glp-slide-1.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Green-Lantern Premium - Features','weblizar'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','weblizar'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 13 Templates','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Different Types of Blog Templates','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates','weblizar'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','weblizar'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','weblizar'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','weblizar'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','weblizar'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','weblizar'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','weblizar'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','weblizar'); ?> </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/green-lantern-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Green-Lantern Premium','weblizar'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Green-Lantern ?', 'weblizar' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'weblizar' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/green-lantern?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;
?>