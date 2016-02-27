<?php
/**
 * The Top Sidebar
 * @package sleeky
 * @since 1.0.0
 */
$default_content = get_theme_mod('hide_default_content', '0');
if (   ! is_active_sidebar( 'top1'  )
	&& ! is_active_sidebar( 'top2' )
	&& ! is_active_sidebar( 'top3'  )
	&& ! is_active_sidebar( 'top4'  )		
	&& (!$default_content)):	
	?>
        <div class="sleeky_widget_top">
            <div class="container">
                <div class="row">              
                    <div id="bottom1" class="col-md-3" role="complementary">
                        <i class="sleeky_icons fa fa-bars"></i>
                        <h3><?php echo __('Top1 Widget', 'sleeky'); ?></h3>
                        <p><?php echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sleeky'); ?></p>
                    </div><!-- #top1 -->

                    <div id="bottom2" class="col-md-3" role="complementary">
                        <i class="sleeky_icons fa fa-facebook"></i>
                        <h3><?php echo __('Top Widget 2', 'sleeky'); ?></h3>
                        <p><?php echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sleeky'); ?></p>
                    </div><!-- #top2 -->          

                    <div id="bottom3" class="col-md-3" role="complementary">
                        <i class="sleeky_icons fa fa-check"></i>
                        <h3><?php echo __('Top Widget 3', 'sleeky'); ?></h3>
                        <p><?php echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sleeky'); ?></p>
                    </div><!-- #top3 -->

                    <div id="bottom4" class="col-md-3" role="complementary">
                        <i class="sleeky_icons fa fa-headphones"></i>
                        <h3><?php echo __('Top Widget 4', 'sleeky'); ?></h3>
                        <p><?php echo __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'sleeky'); ?></p>
                    </div><!-- #top4 -->

                </div>
            </div>
        </div>
<?php
else : ?>
<div class="sleeky_widget_top">
    <div class="container">
            <div class="row">
                <div id="top1" class="<?php sleeky_topgroup(); ?>" role="complementary">
                    <?php dynamic_sidebar( 'top1' ); ?>
                </div><!-- #top1 -->
          
                <div id="top2" class="<?php sleeky_topgroup(); ?>" role="complementary">
                    <?php dynamic_sidebar( 'top2' ); ?>
                </div><!-- #top2 -->          
            
                <div id="top3" class="<?php sleeky_topgroup(); ?>"  role="complementary">
                    <?php dynamic_sidebar( 'top3' ); ?>
                </div><!-- #top3 -->

                <div id="top4" class="<?php sleeky_topgroup(); ?>"  role="complementary">
                    <?php dynamic_sidebar( 'top4' ); ?>
                </div><!-- #top3 -->

            </div>
    </div>
</div>
<?php
endif;
?>