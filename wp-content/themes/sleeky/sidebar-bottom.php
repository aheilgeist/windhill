<?php
/**
 * The Bottom Sidebar
 * @package sleeky
 * @since 1.0.0
 */
$default_content = get_theme_mod('hide_default_content', '0');
if (   ! is_active_sidebar( 'bottom1'  )
    && ! is_active_sidebar( 'bottom2' )
    && ! is_active_sidebar( 'bottom3'  )
    && ! is_active_sidebar( 'bottom4'  )        
    && (!$default_content)  
    ): ?>
            <div class="sleeky_widget_bottom">
                <div class="container">
                    <div class="row">              
                        <div id="bottom1" class="col-md-3" role="complementary">
                            <h3><?php echo __('Bottom 1', 'sleeky'); ?></h3>
                            <p><?php echo __('Add the bottom Content here Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sleeky');?></p>
                        </div><!-- #top1 -->

                        <div id="bottom2" class="col-md-3" role="complementary">
                            <h3><?php echo __('Bottom 2', 'sleeky'); ?></h3>
                            <p><?php echo __('Add the bottom Content here Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sleeky');?></p>
                        </div><!-- #top2 -->          

                        <div id="bottom3" class="col-md-3" role="complementary">
                            <h3><?php echo __('Bottom 3', 'sleeky'); ?></h3>
                            <p><?php echo __('Add the bottom Content here Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sleeky');?></p>
                        </div><!-- #top3 -->

                        <div id="bottom4" class="col-md-3" role="complementary">
                            <h3><?php echo __('Bottom 4', 'sleeky'); ?></h3>
                            <p><?php echo __('Add the bottom Content here Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'sleeky');?></p>
                        </div><!-- #top4 -->

                    </div>
                </div>
            </div>
        <?php elseif(is_active_sidebar( 'bottom1' )  ||  is_active_sidebar( 'bottom2' ) || is_active_sidebar( 'bottom3' ) ||  is_active_sidebar( 'bottom4' )):

    // If we get this far, we have widgets. Let do this.
?>
<div class="sleeky_widget_bottom">
    <div class="container">
        <div class="row">              
            <div id="bottom1" <?php sleeky_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom1' ); ?>
            </div><!-- #top1 -->

            <div id="bottom2" <?php sleeky_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom2' ); ?>
            </div><!-- #top2 -->          

            <div id="bottom3" <?php sleeky_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom3' ); ?>
            </div><!-- #top3 -->

            <div id="bottom4" <?php sleeky_bottomgroup(); ?> role="complementary">
                <?php dynamic_sidebar( 'bottom4' ); ?>
            </div><!-- #top4 -->

        </div>
    </div>
</div>
<?php else:
    return;
endif;
 ?>