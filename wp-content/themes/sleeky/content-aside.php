<?php
/**
 * Post Format Aside
 * @package Sleeky Pro
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php sleeky_pro_post_class(); ?>>
	
    <div class="entry-content clearfix aside_post_type">
		<?php the_content(); ?>
	</div>
	
    <?php sleeky_pro_blog_seperator(); ?>
	
</article><!-- #post-## -->