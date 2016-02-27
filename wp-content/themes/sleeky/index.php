<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sleeky
 * @since 1.0.0
 */
get_header(); ?>

<section id="sleeky_content_area" class="sleeky_content_frame" role="main">
    <div class="container"><div class="row"><div class="col-md-8 la-blog-content" role="main">';
        <?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();				
					// get the article layout
					get_template_part( 'content' );

					//check_blog_style_clearing($count);					
				endwhile;
					//get the pagination
					sleeky_paging_nav();
				else :
					// if no posts
					get_template_part( 'content', 'none' );					
				endif; 
			echo '</div><div class="col-md-4 right_sidebar"><aside id="la-right" role="complementary">';
				get_sidebar( 'right' );
			echo '</aside></div></div></div>';
?>
</section>
<?php get_footer(); ?>