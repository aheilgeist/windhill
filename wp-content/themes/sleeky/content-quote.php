<?php
/**
 * Post Format Quote
 * @package lavish
 * @since 1.0.0
 */
/*
=================================================
This is post format quote which only dislays the 
content you need to put the link inside the content
itself for displaying it cool.
=================================================
*/
?>

<article id="post-<?php the_ID(); ?>" <?php sleeky_pro_post_class(); ?>>

    <a target="_blank" href="<?php the_title(); ?>">
		
    <div class="entry-content clearfix link_post_type">
	    <?php the_content(); ?>
	    <div style="border-bottom:1px solid #EAEAEA;"></div>
	    <h5><i class="fa fa-quote-left"></i> &nbsp;<?php the_title(); ?></h5>
	</div>
	</a>
	
	<?php sleeky_pro_blog_seperator(); ?>
	
</article><!-- #post-## -->