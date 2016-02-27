<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="section-content top-body section-services">    
    <div class="container">
        <div class="row">
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_1_title']) { ?>
					<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_1_icons']) { echo $wl_theme_options['service_1_icons']; } ?>"></i><?php echo $wl_theme_options['service_1_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_1_text']) { ?>
					<div class="content-box-text">
						<?php echo apply_filters('the_content', $wl_theme_options['service_1_text'], true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_2_title']) { ?>
					<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_2_icons']) { echo $wl_theme_options['service_2_icons']; } ?>"></i><?php echo $wl_theme_options['service_2_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_2_text']) { ?>
					<div class="content-box-text">
						<?php echo apply_filters('the_content', $wl_theme_options['service_2_text'], true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_3_title']) { ?>
					<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_3_icons']) { echo $wl_theme_options['service_3_icons']; } ?>"></i><?php echo $wl_theme_options['service_3_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_3_text']) { ?>
					<div class="content-box-text">
						<?php echo apply_filters('the_content', $wl_theme_options['service_3_text'], true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
			<div class="col-md-3 col-sm-3">
				<div data-animdelay="0.2s" data-animspeed="1s" data-animrepeat="0" data-animtype="fadeIn" class="content-box animated  fadeIn animatedVisi" style="-webkit-animation: 1s 0.2s;">
					<?php if($wl_theme_options['service_4_title']) { ?>
					<h4 class="h4-body-title"><i class="<?php if($wl_theme_options['service_4_icons']) { echo $wl_theme_options['service_4_icons']; } ?>"></i><?php echo $wl_theme_options['service_4_title'];   ?></h4>
					<?php } ?>
					<?php if($wl_theme_options['service_4_text']) { ?>
					<div class="content-box-text">
						<?php echo apply_filters('the_content', $wl_theme_options['service_4_text'], true); ?>
					</div>
					<?php } ?>
				</div>    
			</div>
		</div>
	</div> 
</div>