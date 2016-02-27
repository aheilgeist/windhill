<?php
/**
 * The Header for our theme
 * @package sleeky
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
        <?php get_template_part('partials/main_sidebar_mobile'); ?>
        
<div class="main-wrapper"> <!--start of main wrapper, It will end in footer.php file-->
    <header id="sleeky_header">
        <div id="header-container">
            <div class="container">
                <div class="row">
                    <div class="sleeky-top-header">
                        <div class="sleeky-logo-placeholder">
                            <?php
                            if (get_theme_mod('sleeky_logo','0')) {
                                $logo = get_theme_mod('sleeky_logo');
                            ?>
                            <a href="<?php echo esc_url(home_url('/ ')) ?>">
                                                            <img src="<?php echo $logo; ?>" alt="<?php esc_attr(bloginfo('description')); ?>">
                            <?php
                            } else {
                            ?>
                            <h1 id="sleeky_site_title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" 
                                                       rel="home" style="color: <?php echo esc_attr(get_theme_mod('sitetitle')); ?>;"><?php bloginfo('name'); ?></a></h1>
                                <?php
                                }
                            ?>
                             </a>
                        </div>
                        <a href="#" class="toggle_menu_bar"><i class="fa fa-bars"></i></a>
                        
                        <div class="sleeky_menu">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'navmenu', 'fallback_cb'     => 'wp_page_menu')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!--Header Ends Here -->
    <?php
        get_sidebar('banner'); 
        do_action('sleeky_breadcrumb'); 
        get_sidebar( 'cta' ); 
        get_sidebar( 'top' ); 
    