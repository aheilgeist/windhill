<?php

/***** Theme Info Page with Premium Features *****/

if (!function_exists('GL_info_page')) {
	function GL_info_page() {
	$page1=add_theme_page(__('Welcome to Green-Lantern', 'weblizar'), __('Upgrade To Pro', 'weblizar'), 'edit_theme_options', 'enigma', 'GLdisplay_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'weblizar_admin_info');
	}
}
add_action('admin_menu', 'GL_info_page');

function weblizar_admin_info(){
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-4.5.0/css/font-awesome.css');
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/css/bootstrap.css');

}
if (!function_exists('GLdisplay_theme_info_page')) {
	function GLdisplay_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
<div class="theme-info-wrap">
  <!-- Theme Premium Features  -->
	<div class="container-fluid">
	<div class="col-md-12">
        <h1 class="section-title"> GREEN LANTERN PREMIUM THEMES FEATURES </h1>	
		<div class="line"></div>
	    <p class="section-description"> We create awesome themes which are the perfect solution for your website project. </p>
	</div>
	   <div class="col-md-12">
        <div class="container services">
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-tablet"></i>
				<h3> RESPONSIVE DESIGN </h3>
				 <p class="desc">Weblizar Pro adapts to different screen sizes so that your website will work (and be optimized for) iPhones, iPads and other mobile devices.</p>
		    </div>
			</div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-eye"></i>
				<h3> RATINA READY </h3>
				 <p class="desc">Ratina ready - iOS Competible. </p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-css3"></i>
				<h3> CSS3 </h3>
				 <p class="desc">Modern CSS3 Elements.</p>
				 </div>
		    </div>
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-html5"></i>
				<h3> HTML5 </h3>
				 <p class="desc">Modern HTML5 Elements.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-copy"></i>
				<h3> ISOTOPE EFFECTS </h3>
				 <p class="desc">Most Popular ISOTOPE Effects for Portfolio and Blog.</p>
		    </div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-globe"></i>
				<h3> MULTI PURPOSE </h3>
				 <p class="desc">Theme can be used for various purpose like : Corporate - Healthcare - Hotels - RealEstate - Pharma etc. </p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-th"></i>
				<h3> UNLIMITED COLOR SCHEME </h3>
				 <p class="desc">!0 Predifined color schemes including Custom Color picker so that you can create your own color layout .</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-file-text-o"></i>
				<h3> WELL DOCUMENTED </h3>
				 <p class="desc">Our all themes have well docementation so that you could use our themes easily.</p>
			</div>
		    </div>
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-copy"></i>
				<h3> MULTIPLE THEME TEMPLATES </h3>
				 <p class="desc">Theme have many different design page template.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-copy"></i>
				<h3> ULTIMATE PORTFOLIO DESIGN  </h3>
				 <p class="desc">Portfolio section have different design.</p>
				 </div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-calendar"></i>
				<h3> COMING SOON MODE </h3>
				 <p class="desc">You can HIDE your website untill the site is Complete, Using COMING SOON MODE.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-gears"></i>
				<h3> THEME OPTION PANEL </h3>
				 <p class="desc">Easily customizable settings through Theme-Options.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-plus-square-o"></i>
				<h3> CUSTOM SHOTCODES </h3>
				 <p class="desc">Variety of Shortcodes.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-thumbs-up"></i>
				<h3> BROWSER COMPATIBILITY </h3>
				 <p class="desc">Theme supports all leading web browsers.</p>
			</div>
		    </div>
			
			<div class="col-md-4 detail">
			<div class="icon">
				<i class="fa fa-check-square-o"></i>
				<h3> FAST & FRIENDLY SUPPORT </h3>
				 <p class="desc">Dedicated Support via email / forum / skype / teamviewer .</p>
			</div>
		    </div>
	    </div>
	   </div>
	</div>
	
	<div class="container-fluid">
	<div class="col-md-12">
        <h1 class="section-title">PRICING </h1>	
		<div class="line1"></div>
	    <p class="section-description"> Our price really cost to your need </p>
	</div>
	
	<div class="container">
	<div class=" pricing-table pricing-three-column">
	    <div class="col-md-4">
            <div class="plan">  
			    <div class="plan-name"> 
				    <h2> Green-Lantern Premium </h2>
					<p><span> Feature Sets </span></p>
				</div>
				<ul> 
				<li class="plan-feature"> Front Page</li>
				<li class="plan-feature"> Theme Option Panel</li>
				<li class="plan-feature"> Unlimited Color Skins</li>
				<li class="plan-feature"> Multiple Bakground Patterns</li>
				<li class="plan-feature"> Multiple Theme Templates</li>
				<li class="plan-feature"> 3 Portfolio Layout</li>
				<li class="plan-feature"> 3 Page Layout</li>
				<li class="plan-feature"> 3 Blog Layout</li>
				<li class="plan-feature"> Multilingual</li>
				<li class="plan-feature"> Complete Doceumentation</li>
				<li class="plan-feature"> Service Page Template</li>
				<li class="plan-feature"> About Us Page Template</li>
				<li class="plan-feature"> Contact Us Page Template</li>
				<li class="plan-feature"> Custom Shortcodes</li>
				</ul>	
			</div>
        </div>		
		
		 <div class="col-md-4">
            <div class="plan">  
			    <div class="plan-name"> 
				    <h2> Premium </h2>
					<p><span> Get this in just @$29 </span></p>
				</div>
				<ul> 
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"> 
				<a href="https://weblizar.com/themes/green-lantern-premium/" target="_new" class="demo_button"><i class="fa fa-check-circle"></i> Demo</a>
				<a href="https://weblizar.com/amember/signup/green-lantern" target="_new" class="purchase_button"><i class="fa fa-shopping-cart"></i> Buy</a>
				</li>
				</ul>	
			</div>
        </div>	
		
		 <div class="col-md-4">
            <div class="plan">  
			    <div class="plan-name"> 
				    <h2> Free </h2>
					<p><span> $0 </span></p>
				</div>
				<ul> 
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-check fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"><i class="fa fa-times fa-1x"></i></li>
				<li class="plan-feature"> 
				<a href="https://wordpress.org/themes/green-lantern/" target="_new" class="demo_button"><i class="fa fa-download"></i> Download</a>
				</li>
				</ul>	
			</div>
        </div>	
	</div>
	</div>
	</div>
			
			<div id="theme-author">
				<p><?php printf(__('%1s is proudly brought to you by %2s. If you like this WordPress theme, %3s.', 'weblizar'),
					$theme_data->Name,
					'<a target="_blank" href="https://weblizar.com/" title="weblizar">Weblizar</a>',
					'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/green-lantern" title="Green Lantern Review">' . __('rate it', 'weblizar') . '</a>'); ?>
				</p>
			</div>
 </div>
<?php
	}
}
?>