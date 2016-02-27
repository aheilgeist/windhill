<?php
/**
 * Post Format Link
 * @package Sleeky Pro
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php sleeky_pro_post_class(); ?>>

    <a target="_blank" href="<?php the_title(); ?>">

	<div class="entry-content clearfix link_post_type">
	    <?php the_content(); ?>
	    <div style="border-bottom:1px solid #EAEAEA;"></div>
	    <h5><i class="fa fa-external-link"></i> &nbsp;<?php the_title(); ?></h5>
	</div>
	</a>
	<?php sleeky_pro_blog_seperator(); ?>
	
</article><!-- #post-## -->
