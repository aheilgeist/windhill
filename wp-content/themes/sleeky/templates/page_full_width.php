<?php
/*
=================================================
	sleeky PAGE TEMPLATES
	Template Name: Page Full Width
	@for Front Page
=================================================
*/
get_header(); ?>
    <div class="sleeky_content_frame">
        <div class="container">    
            <div class="row">
                <div class="content-wrapper col-md-12">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <h1 class="sleeky_page_title"><?php the_title(); ?></h1>
                        <div class="sleeky_content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
?>