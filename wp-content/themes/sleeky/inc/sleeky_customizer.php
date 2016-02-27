<?php
    add_action('customize_register', 'sleeky_theme_customize');

    function sleeky_theme_customize( $wp_customize ) {

        /**
        *  Page to CHeck the Pro Version
        */
        class sleeky_note extends WP_Customize_Control {
            public function render_content() {
                echo __( '<div style="color:red"><h4>This following features are available in the <a href="http://styledthemes.com/sleeky-pro" title="premium version" target="_blank">Premium version only.</a></h4></div>', 'sleeky' );
            }
        }

        /*
        =================================================
        Top Bar Display
        =================================================
        */
        $wp_customize->add_panel( 'sleeky_pro_panel', array(// Header Panel
        'priority'       => 5,
        'capability'     => 'edit_theme_options',
        'title'          => __('Pro Version Features', 'sleeky'),
        'description'    => __('This is the Features that you get while Buying The Pro Version', 'sleeky'),
    ));

        $wp_customize->add_section( 'header_top_settings', array(
            'title'          => __( 'Top Bar Display', 'sleeky' ),
            'description'    => __('Header Top Represents the top position ahead of Menu', 'sleeky'),   
            'priority'       => 5,
            'panel'         => 'sleeky_pro_panel',
        ) );

        $wp_customize->add_setting( 'sleeky_top_settings', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
        
        $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_top_settings', array(
                'section'  => 'header_top_settings',
                'priority' => 1,
        ) ) );
    
        // Hide the Top bar
        
        $wp_customize->add_setting( 'hide_styletop', array(
            'default'        => '1',
            'sanitize_callback' => 'sleeky_sanitize_text',
        ) );
    
        $wp_customize->add_control('hide_styletop', array(
            'label'   => __( 'Hide Top Bar', 'sleeky' ),
            'section' => 'header_top_settings',
            'settings'   => 'hide_styletop',
            'priority' => 2,
            'type'    => 'checkbox',
        ));

        // Hide the Announcement on the Top Menu
        $wp_customize->add_setting( 'hide_announcement', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_text',
        ) );
    
        $wp_customize->add_control('hide_announcement', array(
            'label'   => __( 'Hide Announcement', 'sleeky' ),
            'section' => 'header_top_settings',
            'settings'   => 'hide_announcement',
            'priority' => 2,
            'type'    => 'checkbox',
        ));

        // Hide the Social Icons on the Top Menu
        $wp_customize->add_setting( 'hide_social_icons', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_text',
        ) );
    
        $wp_customize->add_control('hide_social_icons', array(
            'label'   => __( 'Hide Social Icons', 'sleeky' ),
            'section' => 'header_top_settings',
            'settings'   => 'hide_social_icons',
            'priority' => 3,
            'type'    => 'checkbox',
        )); 

        // Setting for showing the Announcement
        $wp_customize->add_setting( 'style_announcement', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_text',
        ) );


        $wp_customize->add_control( 'style_announcement', array(
            'label' => __( 'Short Announcement', 'sleeky' ),
            'type' => 'text',
            'section' => 'header_top_settings',
            'setting' => 'style_announcement',
            'priority' => 4,
        ) );
  
        // Social Icons Colors

        $wp_customize->add_setting( 'styletop_bg', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'styletop_bg', array(
            'label'   => __( 'Top Bar Background', 'sleeky' ),
            'section' => 'header_top_settings',
            'settings'   => 'styletop_bg',
            'priority' => 5,            
        ) ) );

        // Top Bar Text Color
        $wp_customize->add_setting( 'styletop_text', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'styletop_text', array(
            'label'   => __( 'Top Bar Text Color', 'sleeky' ),
            'section' => 'header_top_settings',
            'settings'   => 'styletop_text',
            'priority' => 6,            

        ) ) );



        $wp_customize->add_section('default_content_setting', array(
            'title'     => __('Default Content Setting', 'sleeky'),
             'priority' =>  2,
        ));
        

        $wp_customize->add_setting( 'hide_default_content', array(
            'default' => 0,
             'sanitize_callback' => 'sleeky_sanitize_checkbox',
        ));

        $wp_customize->add_control( 'hide_default_content', array(
            'type' => 'checkbox',
            'label'    => __( 'Hide default content from theme', 'sleeky' ),
            'section' => 'default_content_setting',
            'priority' => 13,
        ) );

		/*
        =================================================
        lOGO DISPLAY
        =================================================
        */
        $wp_customize->add_setting('sleeky_logo', array(
            'default'           => '',
            'sanitize_callback' => 'sleeky_sanitize_upload',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'sleeky_logo', array(
            'label'    => __('Your Logo', 'sleeky'),
            'section'  => 'title_tagline',
            'settings' => 'sleeky_logo',
            'priority' => 1,
        )));
        /*
        

        /*
        =================================================
        Social Icons Setup
        =================================================
        */
        $wp_customize->add_panel( 'social_networking_panel', array(// Header Panel
            'priority'       => 6,
            'capability'     => 'edit_theme_options',
            'title'          => __('Social Networking', 'sleeky'),
            'description'    => __('Deals with the social networking of your theme', 'sleeky'),
        ));

        $wp_customize->add_section( 'social_networking', array(
            'title'          => __( 'Social Networking Links', 'sleeky' ),
            'priority'       => 1,
            'panel'          => 'social_networking_panel',
        ));

        

        // Setting group for Twitter
        $wp_customize->add_setting( 'twitter_uid', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_url',
        ) );

        $wp_customize->add_control( 'twitter_uid', array(
            'settings' => 'twitter_uid',
            'label'    => __( 'Twitter', 'sleeky' ),
            'section'  => 'social_networking',
            'type'     => 'text',
            'priority' => 2,
        ));  
  
        // Setting group for Facebook
        $wp_customize->add_setting( 'facebook_uid', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_url'
        ) );

        $wp_customize->add_control( 'facebook_uid', array(
            'settings' => 'facebook_uid',
            'label'    => __( 'Facebook', 'sleeky' ),
            'section'  => 'social_networking',
            'type'     => 'text',
            'priority' => 3,
        ));  
  
        // Setting group for Google+
        $wp_customize->add_setting( 'google_uid', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_url'
        ));

        $wp_customize->add_control( 'google_uid', array(
            'settings' => 'google_uid',
            'label'    => __( 'Google+', 'sleeky' ),
            'section'  => 'social_networking',
            'type'     => 'text',
            'priority' => 4,
        ));  
  
        
        // Setting group for Twitter
        $wp_customize->add_setting( 'social_more_get', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_text',
        ) );

        $wp_customize->add_control( 'social_more_get', array(
            'settings' => 'social_more_get',
            'label'    => __( 'Get More Social Icons on Pro version of the theme.', 'sleeky' ),
            'section'  => 'social_networking',
            'type'     => 'checkbox',
            'priority' => 10,
        ));  

        /*
        =================================================
        Footer COpyright Text
        =================================================
        */
        $wp_customize->add_section( 'footer_copyright', array(
            'title'          => __( 'Copyright Name', 'sleeky' ),
            'priority'       => 6,
            'panel'         => 'sleeky_pro_panel',
        ));

        $wp_customize->add_setting( 'sleeky_footer_copyright_note', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
        
        $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_footer_copyright_note', array(
            'section'  => 'footer_copyright',
            'priority' => 1,
        ) ) );

        // Setting group for Twitter
        $wp_customize->add_setting( 'footer_copyright_text', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_text'
        ) );  

        /*
        =================================================
        STICKY MENU
        =================================================
        */

        $wp_customize->add_section( 'choose_sticky_style', array(
            'title'          => __( 'Sticky Menu', 'sleeky' ),
            'description'    => __(' ', 'sleeky'),  
            'priority'       => 55,
            
        ) );
      

        $wp_customize->add_setting( 'nav_position_scrolltop', array(
            'default' => 0,
            'sanitize_callback' => 'sleeky_sanitize_checkbox',
        ) );
        
        $wp_customize->add_control( 'nav_position_scrolltop', array(
            'label'   => __( 'Sticky Menu', 'sleeky' ),
            'section' => 'choose_sticky_style',
            'settings' => 'nav_position_scrolltop',
            'type'    => 'checkbox',
            'choices' => array(
                '1' => __( 'Sticky Menu', 'sleeky' ),
            ),
           'priority'       => 20,  
        ));
        $wp_customize->add_setting( 'nav_position_scrolltop_val_pro', array(
            'default' => 'This features is available in the Premium version only.',
            'sanitize_callback' => 'sleeky_sanitize_number',
        ) );

        $wp_customize->add_setting( 'nav_position_scrolltop_val', array(
            'default' => '180',
            'sanitize_callback' => 'sleeky_sanitize_number',
        ) );
        $wp_customize->add_control( new sleeky_note ( $wp_customize,'nav_position_scrolltop_val_pro', array(
            'section'  => 'choose_sticky_style',
            'priority' => 21,
        ) ) );
        
        $wp_customize->add_control( 'nav_position_scrolltop_val', array(
            'label'   => __( 'Sticky Menu Offset', 'sleeky' ),
            'section' => 'choose_sticky_style',
            'settings' => 'nav_position_scrolltop_val',
            'type' => 'text',
            'priority'       => 22,  
        ));


        /*
        =================================================
        NAVIGATION COLORS
        =================================================
        */
        $wp_customize->add_section( 'navigation_colours', array(
            'title'          => __( 'Navigation Colours', 'sleeky' ),
            'description'    => __(' ', 'sleeky'),  
            'priority'       => 5,
            'panel'         => 'sleeky_pro_panel',
        ) );

        $wp_customize->add_setting( 'sleeky_navigation_colours', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
        
        $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_navigation_colours', array(
            'section'  => 'navigation_colours',
            'priority' => 1,
        ) ) );

        // Menu 1st level link color
        $wp_customize->add_setting( 'menu_link', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link', array(
            'label'   => __( 'Menu Link Color', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_link',
            'priority' => 23,           
        ) ) );

        $wp_customize->add_setting( 'menu_link_bg', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_bg', array(
            'label'   => __( 'Menu Link Background', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_link_bg',
            'priority' => 24,           
        ) ) );
        

        // Menu 1st level link color on hover and acive
        $wp_customize->add_setting( 'menu_active', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active', array(
            'label'   => __( 'Menu Active Background', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_active',
            'priority' => 25,           
        ) ) );

        $wp_customize->add_setting( 'menu_active_text', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_active_text', array(
            'label'   => __( 'Menu Active Text Color', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_active_text',
            'priority' => 26,           
        ) ) );
    
        $wp_customize->add_setting( 'menu_hover', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover', array(
            'label'   => __( 'Menu Hover Background', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_hover',
            'priority' => 27,           
        ) ) );

        $wp_customize->add_setting( 'menu_hover_text', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_text', array(
            'label'   => __( 'Menu Hover Text', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'menu_hover_text',
            'priority' => 28,           
        ) ) );
    
        $wp_customize->add_setting( 'submenu_bg_color', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg_color', array(
            'label'   => __( 'Submenu Background Color', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_bg_color',
            'priority' => 29,           
        ) ) );

        $wp_customize->add_setting( 'submenu_link_color', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link_color', array(
            'label'   => __( 'Submenu Link Color', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_link_color',
            'priority' => 30,           
        ) ) );

        $wp_customize->add_setting( 'submenu_active', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_active', array(
            'label'   => __( 'Submenu Active Text', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_active',
            'priority' => 31,           
        ) ) );

        $wp_customize->add_setting( 'submenu_active_bg', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_active_bg', array(
            'label'   => __( 'Submenu Active Background', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_active_bg',
            'priority' => 32,           
        ) ) );


        $wp_customize->add_setting( 'submenu_hover', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover', array(
            'label'   => __( 'Submenu Hover Background', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_hover',
            'priority' => 33,           
        ) ) );

        $wp_customize->add_setting( 'submenu_hover_text', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_text', array(
            'label'   => __( 'Submenu Hover Text', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_hover_text',
            'priority' => 34,           
        ) ) );

        // Submenu bottom border
        $wp_customize->add_setting( 'submenu_border', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
            'label'   => __( 'Submenu Bottom Border', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_border',
            'priority' => 35,           
        ) ) );

        // Submenu Divider border
        $wp_customize->add_setting( 'submenu_divider', array(
            'default'        => '',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_divider', array(
            'label'   => __( 'Submenu Link Divider', 'sleeky' ),
            'section' => 'navigation_colours',
            'settings'   => 'submenu_divider',
            'priority' => 35,           
        ) ) );

        $wp_customize->add_section( 'nav_size', array(
            'title'          => __( 'Navigation Sizes', 'sleeky' ),
            'priority'       => 6,
            'panel'         => 'header_settings_panel',
        ) );

        $wp_customize->add_setting( 'sleeky_nav_size', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );

        $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_nav_size', array(
            'section'  => 'nav_size',
            'priority' => 1,
        ) ) );

        // Menu 1st level Size
        $wp_customize->add_setting( 'menu_link_size', array(
            'default'        => '0.80rem',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control('menu_link_size', array(
            'label'   => __( 'Menu Link Size', 'sleeky' ),
            'section' => 'nav_size',
            'settings'   => 'menu_link_size',
            'priority' => 1,            
        ) );

        // Menu 1st level Size
        $wp_customize->add_setting( 'submenu_link_size', array(
            'default'        => '0.80rem',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
        
        $wp_customize->add_control( 'submenu_link_size', array(
            'label'   => __( 'Submenu Menu Link Size', 'sleeky' ),
            'section' => 'nav_size',
            'settings'   => 'submenu_link_size',
            'priority' => 2,            
        ) );

        // Menu 1st level Size
        $wp_customize->add_setting( 'sub_submenu_link_size', array(
            'default'        => '0.80rem',
            'sanitize_callback' => 'sleeky_sanitize_hex_color',
        ) );
    
        $wp_customize->add_control('sub_submenu_link_size', array(
            'label'   => __( 'Third Level Menu Link Size', 'sleeky' ),
            'section' => 'nav_size',
            'settings'   => 'sub_submenu_link_size',
            'priority' => 2,            
        ) );

        /*
        =================================================
        SITE LAYOUT
        =================================================
        */
        $wp_customize->add_section( 'site_layout', array(
            'title'          => __( 'Site Layout', 'sleeky' ),
            'description'    => __('This is the layout for your overall Sote', 'sleeky'),
            'priority'       => 1,
            'panel'         => 'sleeky_pro_panel'
        ) );

        $wp_customize->add_setting( 'sleeky_site_layout_pro', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
        
        $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_site_layout_pro', array(
            'section'  => 'site_layout',
            'priority' => 1,
        ) ) );

        // Setting for page width
        $wp_customize->add_setting( 'page_width', array(
                'default' => 'default',
                'sanitize_callback' => 'sleeky_sanitize_pagewidth',
        ) );
        // Control for page width   
        $wp_customize->add_control( 'page_width', array(
                'label'   => __( '', 'sleeky' ),
                'section' => 'site_layout',
                'type'    => 'radio',
                    'choices' => array(
                        'default' => __( 'Full Width', 'sleeky' ),
                        'boxedmedium' => __( 'Boxed Medium 1200px', 'sleeky' ),
                        'boxedsmall' => __( 'Boxed Small 1000px', 'sleeky' ),
                    ),
                    'priority'       => 2,  
        ));

        /*
        =================================================
        BLOG LAYOUT
        =================================================
        */
        $wp_customize->add_section( 'blog_settings', array(
        'title'          => __( 'Blog Settings', 'sleeky' ),
        'description'    => __( 'Blog Layouts, Please choose any one of them', 'sleeky' ),
        'priority'       => 2,
        'panel'         => 'sleeky_pro_panel'
    ) );

    $wp_customize->add_setting( 'sleeky_blog_layout', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_blog_layout', array(
            'section'  => 'blog_settings',
            'priority' => 1,
     ) ) );
        
    // Setting for blog layout
    $wp_customize->add_setting( 'blog_style', array(
            'default' => 'blogright',
            'sanitize_callback' => 'sleeky_sanitize_blogstyle',
    ) );
    // Control for blog layout  
    $wp_customize->add_control( 'blog_style', array(
            'label'   => __( '', 'sleeky' ),
            'section' => 'blog_settings',
            'priority' => 1,
            'type'    => 'radio',
                'choices' => array(
                    
                    'blogright' => __( 'Blog with Right Sidebar', 'sleeky' ),
                    'blogleft' => __( 'Blog with Left Sidebar', 'sleeky' ),
                    'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'sleeky' ),
                    'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'sleeky' ),
                    'manosaryleft' => __( 'Blog Manosary with Left Sidebar', 'sleeky' ),
                    'manosaryright' => __( 'Blog Manosary with Right Sidebars', 'sleeky' ),
                    'manosarywide' => __( 'Blog Manosary Full Width', 'sleeky' ),
                    'manosaryright' => __( 'Blog Manosary with Right Sidebars', 'sleeky' ),
                    'boxedleft' => __( 'Blog Boxed Left Sidebar', 'sleeky' ),
                    'boxedright' => __( 'Blog Boxed Right Sidebar', 'sleeky' ),
                    'boxedwide' => __( 'Blog Boxed Full Width', 'sleeky' )
                ),
    )); 
    

    $wp_customize->add_setting( 'sleeky_blog_color', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_blog_color', array(
            'section'  => 'blog_color',
            'priority' => 1,
     ) ) );

        
    // Setting for blog layout
    $wp_customize->add_setting( 'blog_button_style', array(
            'default' => 'one',
            'sanitize_callback' => 'sleeky_sanitize_text',
    ) );
    // Control for blog layout  
    $wp_customize->add_control( 'blog_button_style', array(
            'label'   => __( 'Choose Blog ReadMore Button Style', 'sleeky' ),
            'section' => 'blog_settings',
            'priority' => 1,
            'type'    => 'radio',
                'choices' => array(
                    'one' => __( 'Button Style 1', 'sleeky' ),
                    'two' => __( 'Button Style 2', 'sleeky' ),
                    'three' => __( 'Button Style 3', 'sleeky' ),
                    'four' => __( 'Button Style 4', 'sleeky' ),
                ),
    )); 

    // Setting for blog Color Classes
    $wp_customize->add_setting( 'blog_button_style_class', array(
            'default' => '',
            'sanitize_callback' => 'sleeky_sanitize_text',
    ) );
    // Control for blog layout  
    $wp_customize->add_control( 'blog_button_style_class', array(
            'label'   => __( 'Choose Button Class (Note: The Button Classes are found in the btn snippets of theme package folder)', 'sleeky' ),
            'section' => 'blog_settings',
            'priority' => 1,
            'type'    => 'text',
    )); 

    

    //Manosary Background Color
    $wp_customize->add_setting( 'manosary_bg_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'manosary_bg_color', array(
        'label'   => __( 'Manosary & Blog Box Background', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'manosary_bg_color',
        'priority' => 5,            
    ) ) );
    // Title Color
    $wp_customize->add_setting( 'manosary_blog_title_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'manosary_blog_title_color', array(
        'label'   => __( 'Blog Title Color', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'manosary_blog_title_color',
        'priority' => 6,            
    ) ) );
    
    // Blog Details Color
    $wp_customize->add_setting( 'bblog_details_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bblog_details_color', array(
        'label'   => __( 'Blog Details Color', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'bblog_details_color',
        'priority' => 8,            
    ) ) );
    // Quote & Link Post background Color
    $wp_customize->add_setting( 'blog_quote_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_quote_bg', array(
        'label'   => __( 'Quote and Link Background', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_quote_bg',
        'priority' => 9,            
    ) ) );
    // Quote & Link Post hover background Color
    $wp_customize->add_setting( 'blog_quote_hovbg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_quote_hovbg', array(
        'label'   => __( 'Quote and Link Hover Background', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_quote_hovbg',
        'priority' => 10,           
    ) ) );
    
    // Pagination Link Color
    $wp_customize->add_setting( 'blog_pagination_link_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color', array(
        'label'   => __( 'Blog Pagination Link Color', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_link_color',
        'priority' => 13,           
    ) ) );
    // Pagination Hover Color
    $wp_customize->add_setting( 'blog_pagination_link_color_hover', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_hover', array(
        'label'   => __( 'Blog Pagination Link Color Hover', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_link_color_hover',
        'priority' => 14,           
    ) ) );

    // Pagination Background Color
    $wp_customize->add_setting( 'blog_pagination_link_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color', array(
        'label'   => __( 'Blog Pagination Background Color', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_link_color',
        'priority' => 12,           
    ) ) );

    // Pagination Link Color
    $wp_customize->add_setting( 'blog_pagination_text_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color', array(
        'label'   => __( 'Blog Pagination Text Color', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_text_color',
        'priority' => 12,           
    ) ) );

    // Pagination Hover Color
    $wp_customize->add_setting( 'blog_pagination_link_color_hover', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_hover', array(
        'label'   => __( 'Blog Pagination Background Color Hover', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_link_color_hover',
        'priority' => 12,           
    ) ) );

    // Pagination Hover Text Color
    $wp_customize->add_setting( 'blog_pagination_text_color_hover', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color_hover', array(
        'label'   => __( 'Blog Pagination Text Color Hover', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_text_color_hover',
        'priority' => 12,           
    ) ) );

    // Pagination Active Color
    $wp_customize->add_setting( 'blog_pagination_link_color_active', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_link_color_active', array(
        'label'   => __( 'Blog Pagination Background Color Active', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_link_color_active',
        'priority' => 13,           
    ) ) );

    // Pagination Active Color
    $wp_customize->add_setting( 'blog_pagination_text_color_active', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_pagination_text_color_active', array(
        'label'   => __( 'Blog Pagination Text Color Active', 'sleeky' ),
        'section' => 'blog_settings',
        'settings'   => 'blog_pagination_text_color_active',
        'priority' => 13,           
    ) ) );

    /*
    =================================================
    Basic Settings
    =================================================
    */

    $wp_customize->add_section( 'move_top_top', array(
        'title'          => __( 'Move To Top', 'sleeky' ),
        'priority'       => 4,
        'panel'         => 'sleeky_pro_panel'
    ) );

    $wp_customize->add_setting( 'sleeky_move_top_top', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_move_top_top', array(
            'section'  => 'move_top_top',
            'priority' => 1,
     ) ) );


    $wp_customize->add_setting( 'movetotop', array(
        'default'        => '1',
        'sanitize_callback' => 'sleeky_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'movetotop', array(
        'settings' => 'movetotop',
        'label'    => __( 'Enable Move To Top', 'sleeky' ),
        'section'  => 'move_top_top',       
        'type'     => 'checkbox',
        'priority' => 14,
    ) );

    /*
    =================================================
    TypoGraphy Settings
    =================================================
    */

    $wp_customize->add_section( 'typography', array(
        'title'          => __( 'Typography', 'sleeky' ),
        'priority'       => 6,
        'panel' => 'sleeky_pro_panel',
    ) );

    $wp_customize->add_setting( 'sleeky_typography_settings', array(
        'sanitize_callback' =>  'sleeky_sanitize_text'
    ) );

    $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_typography_settings', array(
        'section'  => 'typography',
        'priority' => 1,
    ) ) );

    $wp_customize->add_setting('h1_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h1_fontsize', array(
        'label'     => __( 'H1 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h1_fontsize',
        'priority' => 2,            
    ) );
        
    $wp_customize->add_setting( 'h1_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h1_fontcolor', array(
        'label'   => __( 'H1 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h1_fontcolor',
        'priority' => 3,            
    ) ) );
        
    $wp_customize->add_setting('h2_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h2_fontsize', array(
        'label'     => __( 'H2 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h2_fontsize',
        'priority' => 4,            
    ) );
        
    $wp_customize->add_setting( 'h2_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h2_fontcolor', array(
        'label'   => __( 'H2 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h2_fontcolor',
        'priority' => 5,            
    ) ) );
        
    $wp_customize->add_setting('h3_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h3_fontsize', array(
        'label'     => __( 'H3 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h3_fontsize',
        'priority' => 6,            
    ) );
        
    $wp_customize->add_setting( 'h3_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h3_fontcolor', array(
        'label'   => __( 'H3 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h3_fontcolor',
        'priority' => 7,            
    ) ) );
        
    $wp_customize->add_setting('h4_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h4_fontsize', array(
        'label'     => __( 'H4 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h4_fontsize',
        'priority' => 8,            
    ) );
        
    $wp_customize->add_setting( 'h4_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h4_fontcolor', array(
        'label'   => __( 'H4 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h4_fontcolor',
        'priority' => 9,            
    ) ) );
        
    $wp_customize->add_setting('h5_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h5_fontsize', array(
        'label'     => __( 'H5 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h5_fontsize',
        'priority' => 10,           
    ) );
        
    $wp_customize->add_setting( 'h5_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h5_fontcolor', array(
        'label'   => __( 'H5 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h5_fontcolor',
        'priority' => 11,           
    ) ) );
        
    $wp_customize->add_setting('h6_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'h6_fontsize', array(
        'label'     => __( 'H6 Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'h6_fontsize',
        'priority' => 12,           
    ) );
        
    $wp_customize->add_setting( 'h6_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'h6_fontcolor', array(
        'label'   => __( 'H6 Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'h6_fontcolor',
        'priority' => 13,           
    ) ) );
        
    $wp_customize->add_setting('p_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'p_fontsize', array(
        'label'     => __( 'Paragraph Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'p_fontsize',
        'priority' => 14,           
    ) );
        
    $wp_customize->add_setting( 'p_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'p_fontcolor', array(
        'label'   => __( 'Paragraph Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'p_fontcolor',
        'priority' => 15,           
    ) ) );
        
    $wp_customize->add_setting('a_fontsize', array(
        'default'           => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'a_fontsize', array(
        'label'     => __( 'Anchor Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'a_fontsize',
        'priority' => 16,           
    ) );
        
    $wp_customize->add_setting( 'a_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'a_fontcolor', array(
        'label'   => __( 'Anchor Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'a_fontcolor',
        'priority' => 17,           
    ) ) );
        
    $wp_customize->add_setting( 'ahover_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ahover_fontcolor', array(
        'label'   => __( 'Anchor Hover Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'ahover_fontcolor',
        'priority' => 18,           
    ) ) );
        
    $wp_customize->add_setting('li_fontsize', array(
        'default'           => '1em',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ));
        
    $wp_customize->add_control( 'li_fontsize', array(
        'label'     => __( 'Link Font-Size', 'sleeky' ),
        'section'   => 'typography',
        'settings'  => 'li_fontsize',
        'priority' => 19,           
    ) );
    
    $wp_customize->add_setting( 'li_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'li_fontcolor', array(
        'label'   => __( 'Link Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'li_fontcolor',
        'priority' => 20,           
    ) ) );

    $wp_customize->add_setting( 'lihov_fontcolor', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lihov_fontcolor', array(
        'label'   => __( 'Link Hover Color', 'sleeky' ),
        'section' => 'typography',
        'settings'   => 'lihov_fontcolor',
        'priority' => 21,           
    ) ) );

    /*
    =================================================
    COLOR SETTINGS
    =================================================
    */
    $wp_customize->add_section( 'sleeky_colors', array(
        'title'          => __( 'Colors', 'sleeky' ),
        'priority'       => 5,
        'panel'         => 'sleeky_pro_panel',
    ) );

    $wp_customize->add_setting( 'sleeky_color_settings', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_color_settings', array(
            'section'  => 'sleeky_colors',
            'priority' => 1,
     ) ) );
        

     
        // Body background
    $wp_customize->add_setting( 'bodyback_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bodyback_bg', array(
        'label'   => __( 'Body Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'bodyback_bg',
        'priority' => 2,            
    ) ) );
        
           

    // BreadCumb background
    $wp_customize->add_setting( 'breadcumb_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcumb_bg', array(
        'label'   => __( 'Breadcrumb Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'breadcumb_bg',
        'priority' => 4,            
    ) ) );

     // BreadCumb background
    $wp_customize->add_setting( 'breadcumb_header_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcumb_header_color', array(
        'label'   => __( 'Breadcrumb Heading Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'breadcumb_header_color',
        'priority' => 4,            
    ) ) );
        
        // Breadcrumbs text
    $wp_customize->add_setting( 'breadcrumbs_text', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_text', array(
        'label'   => __( 'Breadcrumbs Text', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'breadcrumbs_text',
        'priority' => 37,           
    ) ) );
        // Breadcrumbs text link 
    $wp_customize->add_setting( 'breadcrumbs_link', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link', array(
        'label'   => __( 'Breadcrumbs Link Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'breadcrumbs_link',
        'priority' => 38,           
    ) ) );  
        // Breadcrumbs text link on hover
    $wp_customize->add_setting( 'breadcrumbs_link_hov', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_link_hov', array(
        'label'   => __( 'Breadcrumbs Link Hover', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'breadcrumbs_link_hov',
        'priority' => 39,           
    ) ) );
        
        
        // Call to Action background
    $wp_customize->add_setting( 'cta_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg', array(
        'label'   => __( 'Call to Action Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'cta_bg',
        'priority' => 4,            
    ) ) );
        
        // Top Widget background
    $wp_customize->add_setting( 'top_widget_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_widget_bg', array(
        'label'   => __( 'Top Widget Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'top_widget_bg',
        'priority' => 5,            
    ) ) );
           
        
    
        // Inset Top Widget background
    $wp_customize->add_setting( 'insettop_widget_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'insettop_widget_bg', array(
        'label'   => __( 'Inset Top Widget Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'insettop_widget_bg',
        'priority' => 6,            
    ) ) );
    
        
              
        // Left Sidebar background
    $wp_customize->add_setting( 'leftsidebar_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'leftsidebar_bg', array(
        'label'   => __( 'Left Sidebar Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'leftsidebar_bg',
        'priority' => 8,            
    ) ) );
     
    // Content background
    $wp_customize->add_setting( 'content_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
        'label'   => __( 'Content Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'content_bg',
        'priority' => 9,            
    ) ) );

        // Content Text Color
    $wp_customize->add_setting( 'content_text_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text_color', array(
        'label'   => __( 'Content Text Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'content_text_color',
        'priority' => 10,           
    ) ) );
        
        // Content Link Color
    $wp_customize->add_setting( 'content_link_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_link_color', array(
        'label'   => __( 'Content Link Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'content_link_color',
        'priority' => 11,           
    ) ) );
        
    // Right Sidebar background
    $wp_customize->add_setting( 'rightsidebar_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rightsidebar_bg', array(
        'label'   => __( 'Right Sidebar Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'rightsidebar_bg',
        'priority' => 11,           
    ) ) );
        
        
     
         
        // Inset Bottom Widget background
        $wp_customize->add_setting( 'insetbottom_widget_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'insetbottom_widget_bg', array(
        'label'   => __( 'Inset Bottom Widget Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'insetbottom_widget_bg',
        'priority' => 12,           
    ) ) );
        
        
        
        // Content Bottom  Widget background
        $wp_customize->add_setting( 'contentbottom_widget_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbottom_widget_bg', array(
        'label'   => __( 'Content Bottom Widget Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'contentbottom_widget_bg',
        'priority' => 14,           
    ) ) );

    // Content Bottom  Widget Border 
        $wp_customize->add_setting( 'contentbottom_widget_border_top', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contentbottom_widget_border_top', array(
        'label'   => __( 'Bottom Widget Top Border Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'contentbottom_widget_border_top',
        'priority' => 14,           
    ) ) );
        
        //Bottom  Widget background
        $wp_customize->add_setting( 'bottom_widget_bg', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_widget_bg', array(
        'label'   => __( 'Bottom Widget Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'bottom_widget_bg',
        'priority' => 15,           
    ) ) );

    

    $wp_customize->add_setting( 'btn_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_color', array(
        'label'   => __( 'Button Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'btn_color',
        'priority' => 17,           
    ) ) );
        $wp_customize->add_setting( 'btn_bg_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_bg_color', array(
        'label'   => __( 'Button Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'btn_bg_color',
        'priority' => 18,           
    ) ) );
        $wp_customize->add_setting( 'btnhover_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btnhover_color', array(
        'label'   => __( 'Button Hover Color', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'btnhover_color',
        'priority' => 19,           
    ) ) );
        $wp_customize->add_setting( 'btnhover_bg_color', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btnhover_bg_color', array(
        'label'   => __( 'Button Hover Background', 'sleeky' ),
        'section' => 'sleeky_colors',
        'settings'   => 'btnhover_bg_color',
        'priority' => 20,           
    ) ) );

    /*
    =================================================
    SLEEKY HOME PAGE
    =================================================
    */
    $wp_customize->add_section( 'sleeky_home_page', array(
        'title'          => __( 'SLEEKY HOME PAGE', 'sleeky' ),
        'description'          => __( 'This Options will help you to setup your homepage', 'sleeky' ),
        'priority'       => 1,
        'panel'         => 'sleeky_pro_panel',
    ) );

    $wp_customize->add_setting( 'sleeky_color_settings', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_color_settings', array(
            'section'  => 'sleeky_home_page',
            'priority' => 1,
     ) ) );


    $wp_customize->add_setting( 'home_main_heading', array(
        'default'        => '' ,
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_main_heading', array(
        'settings' => 'home_main_heading',
        'label'    => __( 'Main Heading', 'sleeky' ),
        'description' => __('Enter the text for the main heading in the header area.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'home_sub_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_sub_heading', array(
        'settings' => 'home_sub_heading',
        'label'    => __( 'Sub Heading', 'sleeky' ),
        'description' => __('Enter the text for the sub heading in the header area', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'home_button_link', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_url',
    ) );

    $wp_customize->add_control( 'home_button_link', array(
        'settings' => 'home_button_link',
        'label'    => __( 'Button Link', 'sleeky' ),
        'description' => __('Enter the Link for the main heading in the billboard area', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 3,
    ) );

    $wp_customize->add_setting( 'home_button_text', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_button_text', array(
        'settings' => 'home_button_text',
        'label'    => __( 'Button Text', 'sleeky' ),
        'description' => __('Enter the text for the main heading in the billboard area', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 4,
    ) );

    $wp_customize->add_setting( 'home_quote_link', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_url',
    ) );

    $wp_customize->add_control( 'home_quote_link', array(
        'settings' => 'home_quote_link',
        'label'    => __( 'Quote Button Link', 'sleeky' ),
        'description' => __('Enter the link for the Quote button', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 5,
    ) );

    $wp_customize->add_setting( 'home_quote_text', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_quote_text', array(
        'settings' => 'home_quote_text',
        'label'    => __( 'Quote Button Text', 'sleeky' ),
        'description' => __('Enter the Text for the Quote button', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 6,
    ) );

    $wp_customize->add_setting( 'home_top3_display_section', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_display_section', array(
        'settings' => 'home_top3_display_section',
        'label'    => __( 'Check this box if you would like to hide this section from showing on your homepage', 'sleeky' ),
        'section'  => 'sleeky_home_page',
        'type'     => 'checkbox',
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'home_top3_main_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_main_heading', array(
        'settings' => 'home_top3_main_heading',
        'label'    => __( 'Main heading', 'sleeky' ),
        'description' => __('Enter the text for the main heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'home_top3_sub_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_sub_heading', array(
        'settings' => 'home_top3_sub_heading',
        'label'    => __( 'Sub heading', 'sleeky' ),
        'description' => __('Enter the text for the sub heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 3,
    ) );

    /*
    Left Columns Init
    */

    $wp_customize->add_setting( 'home_top3_left_col_icon', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_left_col_icon', array(
        'settings' => 'home_top3_left_col_icon',
        'label'    => __( 'Left Column Icon', 'sleeky' ),
        'description' => __('Go to <a href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> and copy the icon name you want to use (Ex: fa-magic).', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 4,
    ) );

    $wp_customize->add_setting( 'home_top3_left_col_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_left_col_heading', array(
        'settings' => 'home_top3_left_col_heading',
        'label'    => __( 'Left Column Heading', 'sleeky' ),
        'description' => __('Enter text to use for the column heading.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 5,
    ) );

    $wp_customize->add_setting( 'home_top3_left_col_content', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_left_col_content', array(
        'settings' => 'home_top3_left_col_content',
        'label'    => __( 'Left Column Text', 'sleeky' ),
        'description' => __('Enter text to use for the column Content.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 6,
    ) );

    /*
    Center Columns Init
    */

    $wp_customize->add_setting( 'home_top3_center_col_icon', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );    

    $wp_customize->add_control( 'home_top3_center_col_icon', array(
        'settings' => 'home_top3_center_col_icon',
        'label'    => __( 'Center Column Icon', 'sleeky' ),
        'description' => __('Go to <a href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> and copy the icon name you want to use (Ex: fa-magic).', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 7,
    ) );

    $wp_customize->add_setting( 'home_top3_center_col_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_center_col_heading', array(
        'settings' => 'home_top3_center_col_heading',
        'label'    => __( 'Center Column Heading', 'sleeky' ),
        'description' => __('Enter text to use for the column heading.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 8,
    ) );

    $wp_customize->add_setting( 'home_top3_center_col_content', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_center_col_content', array(
        'settings' => 'home_top3_center_col_content',
        'label'    => __( 'Center Column Text', 'sleeky' ),
        'description' => __('Enter text to use for the column Content.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 9,
    ) );

    /*
    Right Columns Init
    */

    $wp_customize->add_setting( 'home_top3_right_col_icon', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );    

    $wp_customize->add_control( 'home_top3_right_col_icon', array(
        'settings' => 'home_top3_right_col_icon',
        'label'    => __( 'Right Column Icon', 'sleeky' ),
        'description' => __('Go to <a href="http://fortawesome.github.io/Font-Awesome/icons/">Font Awesome</a> and copy the icon name you want to use (Ex: fa-magic).', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'text',
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'home_top3_right_col_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_right_col_heading', array(
        'settings' => 'home_top3_right_col_heading',
        'label'    => __( 'Right Column Heading', 'sleeky' ),
        'description' => __('Enter text to use for the column heading.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 11,
    ) );

    $wp_customize->add_setting( 'home_top3_right_col_content', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_top3_right_col_content', array(
        'settings' => 'home_top3_right_col_content',
        'label'    => __( 'Right Column Text', 'sleeky' ),
        'description' => __('Enter text to use for the column Content.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 12,
    ) );


    $wp_customize->add_setting( 'home_portfolio_display_section', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_portfolio_display_section', array(
        'settings' => 'home_portfolio_display_section',
        'label'    => __( 'Check this box if you would like to hide this section from showing on your homepage', 'sleeky' ),
        'section'  => 'sleeky_home_page',
        'type'     => 'checkbox',
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'home_portfolio_main_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_portfolio_main_heading', array(
        'settings' => 'home_portfolio_main_heading',
        'label'    => __( 'Main heading', 'sleeky' ),
        'description' => __('Enter the text for the main heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'home_portfolio_sub_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_portfolio_sub_heading', array(
        'settings' => 'home_portfolio_sub_heading',
        'label'    => __( 'Sub heading', 'sleeky' ),
        'description' => __('Enter the text for the sub heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 3,
    ) );


    $wp_customize->add_setting( 'home_blog_display_section', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_blog_display_section', array(
        'settings' => 'home_blog_display_section',
        'label'    => __( 'Check this box if you would like to hide this section from showing on your homepage', 'sleeky' ),
        'section'  => 'sleeky_home_page',
        'type'     => 'checkbox',
        'priority' => 1,
    ) );

    $wp_customize->add_setting( 'home_blog_main_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_blog_main_heading', array(
        'settings' => 'home_blog_main_heading',
        'label'    => __( 'Main heading', 'sleeky' ),
        'description' => __('Enter the text for the main heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 2,
    ) );

    $wp_customize->add_setting( 'home_blog_sub_heading', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_text',
    ) );

    $wp_customize->add_control( 'home_blog_sub_heading', array(
        'settings' => 'home_blog_sub_heading',
        'label'    => __( 'Sub heading', 'sleeky' ),
        'description' => __('Enter the text for the sub heading in the column section on your homepage.', 'sleeky'),
        'section'  => 'sleeky_home_page',
        'type'     => 'textarea',
        'priority' => 3,
    ) );

    /*
    =================================================
    SLEEKY CUSTOM PORTFOLIO
    =================================================
    */
    $wp_customize->add_section( 'sleeky_custom_portfolio', array(
        'title'          => __( 'Custom Portfolio', 'sleeky' ),
        'priority'       => 8,
        'panel' => 'sleeky_pro_panel'
    ) );
        
    $wp_customize->add_setting( 'sleeky_top', array(
            'sanitize_callback' =>  'sleeky_sanitize_text'
        ) );
     $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_top_settings', array(
            'section'  => 'sleeky_top_settings',
            'priority' => 1,
     ) ) );

    $wp_customize->add_setting( 'sleeky_custom_portfolio_shortcode', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );

    $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_custom_portfolio_shortcode', array(
            'section'  => 'sleeky_custom_portfolio',
            'priority' => 1
     ) ) );

    /*
    =================================================
    SITE ANALYTICS
    =================================================
    */
    $wp_customize->add_control( new sleeky_note ( $wp_customize,'sleeky_top_settings', array(
            'section'  => 'site_analytics_settings',
            'priority' => 1,
     ) ) );

    $wp_customize->add_section( 'site_analytics_settings', array(
        'title'          => __( 'Site Analytics or other Scripts', 'sleeky' ),
        'priority'       => 8,
        'panel' => 'sleeky_pro_panel'
    ) );
   
    $wp_customize->add_setting( 'site_analytics_data', array(
        'default'        => '',
        'sanitize_callback' => 'sleeky_sanitize_hex_color',
    ) );
 
function sleeky_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 *  Registers
 */
function sleeky_registers() {
    wp_register_script( 'sleeky_customizer_scripts', get_template_directory_uri() . '/js/sleeky_customizer.js', array("jquery"), '20120315', true  );
    wp_enqueue_script( 'sleeky_customizer_scripts' );
    wp_localize_script( 'sleeky_customizer_scripts', 'sleeky_buttons', array(
        'pro_version'       => __( 'View Pro Version', 'sleeky' ),
        'review'       => __( 'Rate Us', 'sleeky' )
    ) );
    
}
add_action( 'customize_controls_enqueue_scripts', 'sleeky_registers' );


function sleeky_sanitize_pagewidth( $input ) {
    $valid = array(
            'default' => __( 'Full Width', 'sleeky' ),
            'boxedmedium' => __( 'Boxed Medium', 'sleeky' ),
            'boxedsmall' => __( 'Boxed Small', 'sleeky' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * adds sanitization callback function for the featured image : radio
 * @package sleeky 
*/
function sleeky( $input ) {
    $valid = array(
        'big' => __( 'Wide Featured Image', 'sleeky' ),
        'small' => __( 'Small Featured Image', 'sleeky' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the excerpt : radio
 * @package sleeky 
*/
function sleeky_sanitize_excerpt( $input ) {
    $valid = array(
        'content' => __( 'Content', 'sleeky' ),
        'excerpt' => __( 'Excerpt', 'sleeky' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


    function sleeky_sanitize_url( $value) {
        $value = esc_url( $value);
        return $value;
    }



/**
 * adds sanitization callback function for the layout : radio
 * @package sleeky 
*/
function sleeky_sanitize_blogstyle( $input ) {
    $valid = array(
        'blogright' => __( 'Blog with Right Sidebar', 'sleeky' ),
        'blogleft' => __( 'Blog with Left Sidebar', 'sleeky' ),
        'blogleftright' => __( 'Blog with Left &amp; Right Sidebar', 'sleeky' ),
        'blogwide' => __( 'Blog with Full Width &amp; no Sidebars', 'sleeky' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for the logo style : radio
 * @package sleeky 
*/
function sleeky_sanitize_logo_style( $input ) {
    $valid = array(
            'default' => __( 'Default Logo', 'sleeky' ),
            'custom' => __( 'Your Logo', 'sleeky' ),
            'logotext' => __( 'Logo with Title and Tagline', 'sleeky' ),
            'text' => __( 'Text Title', 'sleeky' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function sleeky_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}   

/**
 * adds sanitization callback function for numeric data : number
 * @package sleeky 
*/

function sleeky_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}


/**
 * adds sanitization callback function for uploading : uploader
 * @package sleeky * Special thanks to: https://github.com/chrisakelley
 */

add_filter( 'sleeky_sanitize_image', 'sleeky_sanitize_upload' );

add_filter( 'sleeky_sanitize_file', 'sleeky_sanitize_upload' );

function sleeky_sanitize_upload( $input ) {

        $output = '';

        $filetype = wp_check_filetype($input);

        if ( $filetype["ext"] ) {

                $output = $input;
        }
        return $output;
}

}
/**
*adds css in load of page
*@package Sleeky
*@Description: It hooks the following css on page load
*/
add_action( 'customize_controls_print_styles', 'sleeky_customize_css');   
    function sleeky_customize_css()   {    ?>
        <style type="text/css">

            .footer-social-icon ul li a i { color:<?php echo get_theme_mod('social_uid_color'); ?>; background-color:<?php echo get_theme_mod('social_uid_bg_color'); ?>;}

            .footer-social-icon ul li a i:hover { color:<?php echo get_theme_mod('social_uid_hover_color'); ?>; background-color:<?php echo get_theme_mod('social_uid_bg_hover_color'); ?>;} 
            input[data-customize-setting-link="nav_position_scrolltop_val"] {
                 font-weight: bold;
            }
            li#customize-control-nav_position_scrolltop_val label span.customize-control-title {
                font-weight: bold;
            }
            li#customize-control-nav_position_scrolltop {
                margin-bottom: 20px !important;
            }
            li#customize-control-nav_position_scrolltop_val {
                margin-top: -22px !important;
            }
            input[data-customize-setting-link="nav_position_scrolltop_val"] {
                background: none !important;
                   
            }
        </style>
            
        <?php
    }

/**
*adds sticky menu on header
*@package Sleeky
*@Description: It hooks the following js to head section
*/
add_action('wp_head', 'sleeky_add_customizer_js');
function sleeky_add_customizer_js () { ?>
    <script type="text/javascript">
    (function ( $ ) {
        $(document).ready(function() {
            var active = <?php  echo get_theme_mod('nav_position_scrolltop', 0); ?>;
            if (active == 1 ) {
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 180) {
                        $( "header#sleeky_header" ).css ({
                            "background-color":"rgb(138,197,141)",
    						"position":"fixed",	
    						"z-index":"9999",
    						"width":"100%",
    						"top":"0"
                        });

                    } else {
                        $( "header#sleeky_header" ).css ({
                            "position":"relative",  
                            "width":"100%"
                        });
                    }

                });
            }
        });
    })(jQuery);;        

    </script> 
<?php }