<?php
/**
 * Post Format audio
 * @package lavish
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php sleeky_pro_post_class(); ?>>
	<?php do_action('lr_blog_header', 'sleeky-pro'); ?>
	
	<div class="entry-content clearfix">
      		<?php the_content(); ?>
	</div>
  
	<footer class="summary-entry-meta">
		<?php sleeky_pro_multi_pages(); ?>
	</footer>

	<?php sleeky_pro_blog_seperator(); ?>
	
</article><!-- #post-## -->