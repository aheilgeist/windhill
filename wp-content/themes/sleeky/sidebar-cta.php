<?php
/**
 * The Call to Action Sidebar
 * @package sleeky
 * @since 1.0.0
 */
$default_content = get_theme_mod('hide_default_content', '0');
if ( ! is_active_sidebar( 'cta' ) && (!$default_content)):?>
	<div class="sleeky_widget_cta" >
		<div class="container">
	        <div class="row">
	           	<div class="dsp-md-12">
	           		<h1 class="wow bounce home_page_heading_big"><?php echo __('Creative WordPress Theme For WordPress', 'sleeky'); ?></h1>
	           		<p style="padding:0px 15%;"><?php echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr rinting and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sleeky'); ?><br/></p>
	           		<a class="btn btn1 btn-default" target="_blank" href="http://styedthemes.com/sleeky-pro"><?php echo __('Get Started', 'sleeky'); ?></a><a class="btn btn1 btn-primary" target="_blank" href="http://demo.styledthemes.com/?theme=Sleeky"><?php echo __('View Pro', 'sleeky'); ?></a>

	        	</div>
	        </div>
	    </div>
	</div>
<?php elseif(is_active_sidebar( 'cta' ) ):
?>
<div class="sleeky_widget_cta" >
	<div class="container">
        <div class="row">
           	<div class="dsp-md-12">
           		<?php dynamic_sidebar( 'cta' ); ?>
        	</div>
        </div>
    </div>
</div>
<?php else:
    return;
endif;
?>