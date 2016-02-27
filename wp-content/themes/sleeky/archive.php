<?php

/*-------------------------------------------------

	sleeky - Default Archive Template

 --------------------------------------------------*/

get_header(); ?>

	

	<div class="dsp-md-9">

    <section class="container group archive-header" >

    <h1><?php _e('Archive for: ', 'sleeky'); ?><strong><?php single_cat_title(); ?></strong></h1>

  </section>

  </div>

	<section class="container group" role="main">

    <div class="content">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      

      <article id="post-<?php the_ID(); ?>" <?php post_class( 'group' ); ?> role="article">

				<header>

					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

          <?php if(is_user_logged_in())  edit_post_link( __( 'edit', 'sleeky' ) ); ?>

				</header>

        <?php if(has_post_thumbnail()) the_post_thumbnail('image21'); ?>

				<div class="post-content group">

          <?php the_excerpt(); ?>

          <a href='<?php the_permalink(); ?>'><?php _e('READ MORE <span>&raquo;</span>', 'sleeky'); ?></a>

        </div>

        <footer>

            <?php  sleeky_post_meta(); ?>

        </footer>

			</article>

      

      <?php endwhile; ?>

      

      <nav class="page-nav">

        <div class="alignleft"><?php next_posts_link( __('&laquo; Older Entries', 'sleeky') ) ?></div>>

        <div class="alignright"><?php previous_posts_link( __('Newer Entries &raquo;', 'sleeky') ) ?></div>

      </nav>

      

      <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>

	</section>



<?php get_footer();