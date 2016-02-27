<?php
/**
 * Main content 
 * @package lavish
 * @since 1.0.1
 */
?>
<article id="post-<?php the_ID(); ?>">
<?php 
    do_action('lr_blog_header', 'sleeky');
?>
    <div class="entry-content clearfix">
        <div class="post-thumbnail">
            <?php the_post_thumbnail('big'); ?>
        </div> 
 		<?php 
 		     sleeky_excerpt_fnc();
        ?>   
	</div>
		<footer class="summary-entry-meta">
			<?php sleeky_multi_pages(); ?>
    	</footer><!-- .entry-meta -->
        <hr/>
</article><!-- #post-## -->

