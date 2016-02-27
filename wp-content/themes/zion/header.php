<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
	<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta charset="<?php bloginfo('charset'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(''); ?> id="bgpattern-p5" >
<div class="boxed" id="wrapper">
<div id="top_wrapper">	
	
		<header id="header">
			<div class="row">
				<nav class="navbar-default" role="navigation">
					<div class="container-fluid">						
						<div class="col-md-3">
							<div class="navbar-header">						  
							  <div class="logo pull-left">
								<?php $wl_theme_options = weblizar_get_options(); ?>
								<a title="Weblizar" href="<?php echo esc_url(home_url( '/' )); ?>">
								<?php if($wl_theme_options['text_title'] =="on")
								{ echo get_bloginfo( ); }
								else if($wl_theme_options['upload_image_logo']!='') 
								{ ?>
								<img src="<?php echo $wl_theme_options['upload_image_logo']; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "55"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "150"; } ?>px;" />
								<?php } else { echo "Zion";   } ?>
								</a>						
							  </div>
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							</div>
						</div>
						<div class="col-md-9">
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							  <?php
								wp_nav_menu( array(  
										'theme_location' => 'primary',
										'container'  => 'nav-collapse collapse navbar-inverse-collapse',
										'menu_class' => 'nav navbar-nav navbar-left',
										'fallback_cb' => 'weblizar_fallback_page_menu',
										'walker' => new weblizar_nav_walker()
										)
									);	
								?>
							</div>
						</div>
					</div>
				</nav>		
			</div>
		</header>	
</div>