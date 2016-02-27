<?php
/*
=================================================
sleeky FOOTER
=================================================
*/
?>
<?php get_sidebar( 'bottom' ); ?>
<div class="sleeky_footer">
    <div class="container">
        <div class="row">
            

            <div class="col-md-6">
            <?php
                get_template_part('partials/social_bar');
            ?>
            </div>
            <div class="col-md-6">
                <div class="copyright" style="clear:both;">
                    <p>
                        <?php esc_attr_e('Copyright &copy; &nbsp;', 'sleeky'); ?><strong><?php echo bloginfo('title'); ?></strong> <?php echo date('Y'); ?> . <?php esc_attr_e('All rights reserved.', 'sleeky'); ?>&nbsp; <a href="<?php echo esc_url('http://styledthemes.com'); ?>"><?php echo wp_get_theme(); ?> <?php echo __('Theme by StyledThemes.', 'sleeky'); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>