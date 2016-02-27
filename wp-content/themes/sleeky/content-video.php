<?php
/**
 * Video content 
 * @package Sleeky Pro
 * @since 1.0.1
 */
?>
<article id="post-<?php the_ID(); ?>" <?php sleeky_pro_post_class(); ?>>

    <div class="entry-content clearfix">
    		<?php the_content(); ?>
	</div>

	<?php
		//Load the Header
        do_action('lr_blog_header', 'sleeky-pro');
        sleeky_pro_blog_seperator();
	?>

</article><!-- #post-## -->

