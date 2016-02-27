<?php
/*
=================================================
Single Blog Post Pages For sleeky Date Theme
=================================================
*/
get_header(); ?>

<?php
/*
=================================================
Main Index Page For sleeky Date
=================================================
*/
get_header(); ?>
<div class="sleeky_content_frame">
    <div class="container">    
        <div class="content-wrapper">
            <div class="col-md-8">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'group' ); ?> role="article">
                        <header>
                            <h1><?php the_title(); ?></h1>
                            <?php sleeky_post_meta(); ?>
                            <hr/>
                        </header>

                        <div class="post-image">
                        <?php the_post_thumbnail('sleeky-image21'); ?>
                        </div>

                        <div class="post-content group">
                            <?php the_content(); ?>
                        </div>
                        <hr/>
                        <?php if(is_user_logged_in())  edit_post_link( __( '<span class="btn btn-sm">Edit</span>', 'sleeky' ) ); ?>

                        <section class="comment-section">
                        <?php       
                            if ( comments_open() || get_comments_number() ) {
                                echo '<div class="sleeky_blog_comment">';
                                comments_template();
                                echo '</div>';
                            }
                        ?>
                        </section>
                    </article>
                <?php endwhile; endif; ?>
            </div>
            <div class="col-md-4 right_sidebar">
                <?php get_sidebar('right'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();