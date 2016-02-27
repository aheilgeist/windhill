<?php
/*
=================================================
ENQUEUE ALL THE SCRIPTS
=================================================
*/

include_once('inc/sleeky_scripts.php');

/*
=================================================
INCLUDE THE THEME CUSTOMIZER
=================================================
*/

include_once('inc/sleeky_customizer.php');

/*
=================================================
INCLUDE THE MENU FOR THE THEME
=================================================
*/

include_once('inc/sleeky_menus.php');

/*
=================================================
CUSTOM HEADER OPTIONS
=================================================
*/

include_once('inc/sleeky_header.php');

/*
=================================================
INCLUDE THE WIDGETS FOR THE THEME
=================================================
*/

include_once('inc/sleeky_widgets.php');

function sleeky_numeric_posts_nav() {
    if( is_singular() )
        return;
    global $wp_query;
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="dp-pagination dsp-clearfix"><ul class="pagination pull-left">' . "\n";
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li>...</li>';
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>...</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
    echo '</ul></div>' . "\n";
}

add_action('after_setup_theme', 'sleeky_theme_setup');

if (!function_exists('sleeky_theme_setup')){

    function sleeky_theme_setup() {
        global $content_width;
        if (!isset($content_width)) $content_width = 650;
        load_theme_textdomain('sleeky', get_template_directory() . '/languages');

        add_editor_style();

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        add_image_size('sleely-thumbnail-bw', 600, 0, false); // generate black and white thumbnail

        add_image_size( $name = 'sleeky_image21', $width = 600, $height = 300, $crop = true ); // 2:1

        add_image_size( $name = 'sleeky_image43', $width = 320, $height = 240, $crop = true ); // 4:3

        add_image_size( $name = 'sleeky_image169', $width = 320, $height = 180, $crop = true ); // 16:9

        add_theme_support( 'custom-background', array(

            'default-color' => '',

        ) );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
         
        add_theme_support( "title-tag" );

        add_theme_support( 'custom-header', array(
            'default-text-color'     => 'FE6E41',   // text color 
            'default-image'          => '',         // and image (empty to use none).
            'height'                 => 152,        // Set height and
            'width'                  => 960,        // set width,
            'max-width'              => 2000,       //  with a maximum value for the width.
            'flex-height'            => true,       // Support flexible height 
            'flex-width'             => true        // and width.
        ) ); 
        
        /*add_theme_support( 'post-formats', array(
          'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ) );
        */
        /* Enable search form, comment form, and comments to output valid HTML5 */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list',
        ) );
}
}
if ( ! function_exists( 'sleeky_post_meta' ) ) :

function sleeky_post_meta() {
    global $post;
    $author_id      = $post->post_author;
    $author         = get_userdata( $author_id );
    $author_url     = get_author_posts_url( $author_id );
    $author_name    = $author->display_name;
    $comment_count = get_comments_number( $post->ID );
    $comment_number= $comment_count ? sprintf( _n( '1 comment', '%s comments', $comment_count, 'sleeky' ), $comment_count ) : __( 'No comments', 'sleeky' );
    $date = '<span class="icon-text icon-calendar"><i class="fa fa-clock-o"></i><time class="entry-date" datetime="' . get_the_date( 'c' ) . '" pubdate>' . esc_html( get_the_date() ) . '</time></span>';
    $author = '<span class="icon-text icon-agent"><i class="fa fa-user"></i><a href="' . esc_url( $author_url ) . '" rel="author">' . esc_html( $author_name ) . '</a></span>';
    $comments = '<span class="icon-text icon-comment"><i class="fa fa-comment"></i><a href="' . esc_url( get_permalink() ) . '#comments">' . esc_html( $comment_number ) . '</a></span>';
    $categories ='';
    if(!is_page()){
    $categories = '<span class="icon-text icon-category"><i class="fa fa-th-large"></i>&nbsp;';
    $cats = get_the_category();
    $i = 0;
    foreach ( $cats as $cat ) {
      $out = '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">';
      $out .= esc_html( $cat->name );
      $out .= '</a>';
      if ( $i > 0 )
        $out .= ', ';
      $i++;
      $categories .= $out;
    }
    $categories .= '</span>';
  }

    

    $out = '<div class="sleeky_single_post_meta">';

    $out .= sprintf( __( '%1$s %2$s %3$s %4$s', 'sleeky' ), $date, $author, $categories, $comments );

    $out .= '</div>';

    

    echo $out;

}

endif; // sleeky_post_meta

function sleeky_not_wanted() {
    paginate_comments_links();
    next_comments_link();
    previous_comments_link();
    wp_link_pages();
}

function sleeky_excerpt_fnc() {
    $excon = get_theme_mod( 'excerpt_content', 'content' );
            $excerpt = get_theme_mod( 'excerpt_limit', '50' );
                 switch ($excon) {
                    case "content" :
                        the_content(__('Continue Reading...', 'sleeky'));
                    break;
                    case "excerpt" : 
                        echo '<p>' . sleeky_excerpt($excerpt) . '</p>' ;
                        echo '<p class="more-link"><a class="btn btn-info blog_continue_more" href="' . get_permalink() . '">' . __('Continue Reading...', 'sleeky') . '</a>';
                    break;
            }
}
function sleeky_excerpt( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'sleeky_excerpt', 999 );

function sleeky_multi_pages($args = '') {
$defaults = array(
'before' => '<div class="pagination-wrapper clearfix"><label>' . __( 'Pages: ', 'sleeky' ) . '</label><ul class="pagination">',
'after'             => '</ul></div>',
'link_before'       => '<li>', 
'link_after'        => '</li>',
'next_or_number'    => 'number', 
'nextpagelink'      => __('Next page', 'sleeky'),
'previouspagelink'  => __('Previous page', 'sleeky'), 
'pagelink'          => '%',
'echo'              => 1
);
 
$r = wp_parse_args( $args, $defaults );
$r = apply_filters( 'sleeky-pro_multi_pages_args', $r );
extract( $r, EXTR_SKIP );
 
global $page, $numpages, $multipage, $more, $pagenow;
 
$output = '';
if ( $multipage ) {
if ( 'number' == $next_or_number ) {
    $output .= $before;
    for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
        $j = str_replace('%',$i,$pagelink);
        if ( ($i != $page) || ((!$more) && ($page==1)) ) {
            $output .= ' ' . str_replace('%','normal',$link_before);
            $output .= _wp_link_page($i);
            $output .= $j;
            $output .= '</a>';
        }
        else {
            $output .= ' ' . str_replace('%','disabled',$link_before);
            $output .= '<span class="active">' . $j . '</span>';
        }
        $output .=  $link_after;
    }
    $output .= $after;
} else {
    if ( $more ) {
        $output .= $before;
        $i = $page - 1;
        if ( $i && $more ) {
            $output .= $link_before;
            $output .= _wp_link_page($i);
            $output .= $previouspagelink . '</a>';
            $output .= $link_after;
        }
        $i = $page + 1;
        if ( $i <= $numpages && $more ) {
            $output .= $link_before;
            $output .= _wp_link_page($i);
            $output .= $nextpagelink . '</a>';
            $output .= $link_after;
        }
        $output .= $after;
    }
}
}
 
if ( $echo )
echo $output;
 
return $output;
}

add_action('lr_blog_header','lr_blog_header_fnc');

function lr_blog_header_fnc() {
    
    $check_styling_of_blog_icons = get_theme_mod('blog_style');
    if (!($check_styling_of_blog_icons == 'manosaryleft') && !($check_styling_of_blog_icons == 'manosaryright') && !($check_styling_of_blog_icons == 'manosarywide') && !($check_styling_of_blog_icons == 'boxedright') && !($check_styling_of_blog_icons == 'boxedleft') && !($check_styling_of_blog_icons == 'boxedwide') ) {
    ?> 
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'sleeky'); ?> </a>
        </h2>
        <h5>
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                            <span class="featured-post">
                                <?php _e( '<span class="lr_blog_entry_head_featured">Featured</span>', 'sleeky' ); ?>
                            </span>
                        <?php endif; ?> 

                        <?php
                            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
                            if ( get_the_time( 'U' ) ) ;
                                $time_string = sprintf( $time_string,
                                esc_attr( get_the_date( 'c' ) ),
                                esc_html( get_the_date() )
                            );
                            printf( __( '<span class="posted-on"><span class="lr_blog_entry_head">Posted On:&nbsp;</span> %1$s</span><span class="byline"><span class="lr_blog_entry_head">By:&nbsp;</span>  %2$s</span>', 'sleeky' ),
                                sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string),
                                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" rel="author"> %2$s</a></span>',
                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                esc_html( get_the_author() )
                                )
                            );
    
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                <span class="comments-link">
                                    <?php 
                                        echo '<span class="entry-comments">';
                                        _e( '<span class="lr_blog_entry_head">Comments:&nbsp;</span>', 'sleeky' );
                                        comments_popup_link( __( 'Comment', 'sleeky' ), __( '1 Comment', 'sleeky' ), __( '% Comments', 'sleeky' ) ); 
                                    endif; ?> 
                                </span>
                            
                            <?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
                                <?php edit_post_link( __( 'Edit', 'sleeky' ), '<span class="edit-link">', '</span>' ); ?>
                            <?php } ?> 
                    </div><!-- .entry-meta -->
                <?php endif; ?>
        </h5>
    </header><!-- .entry-header -->
    <?php 
    }
    else {
        ?> 
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else _e('Untitled', 'sleeky'); ?> </a>
        </h2>
        <h5>
                <?php if ( 'post' == get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php
                            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
                            if ( get_the_time( 'U' ) ) ;
                                $time_string = sprintf( $time_string,
                                esc_attr( get_the_date( 'c' ) ),
                                esc_html( get_the_date() )
                            );
                            printf( __( '<span class="posted-on"><span class="lr_blog_entry_head"><i class="fa fa-clock-o"></i>&nbsp;</span> %1$s</span><span class="byline"><span class="lr_blog_entry_head"><i class="fa fa-user"></i>&nbsp;</span>  %2$s</span>', 'sleeky' ),
                                sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string),
                                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" rel="author"> %2$s</a></span>',
                                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                                esc_html( get_the_author() )
                                )
                            );
    
                            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                <span class="comments-link">
                                    <?php 
                                        echo '<span class="entry-comments">';
                                        _e( '<span class="lr_blog_entry_head"><i class="fa fa-comment"></i>&nbsp;</span>', 'sleeky' );
                                        comments_popup_link( __( 'Comment', 'sleeky' ), __( '1 Comment', 'sleeky' ), __( '% Comments', 'sleeky' ) ); 
                                    endif; ?> 
                                </span>
                            
                            <?php if( get_theme_mod( 'hide_edit' ) == '') { ?>
                                <?php edit_post_link( __( 'Edit', 'sleeky' ), '<span class="edit-link">', '</span>' ); ?>
                            <?php } ?> 
                    </div><!-- .entry-meta -->
                <?php endif; ?>
        </h5>
    </header><!-- .entry-header -->
    <?php
    }
}

/*
=================================================
Sleeky Pro Paging Navs
=================================================
*/
if ( ! function_exists( 'sleeky_paging_nav' ) ) :

function sleeky_paging_nav($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='page_pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}
endif;
/**
*The "wp_nav_menu_args" filter is applied to the arguments of 
*the wp_nav_menu() function before they are processed.
*@package sleeky
*/

function modify_nav_menu_args( $args )
{
    if( 'primary' == $args['theme_location'] )
    {
        $args['show_home'] = true;
        $args['depth'] = 1;
        $args['menu_class']  = 'navmenu mobile_menu';
    }
    
    return $args;
}
add_filter( 'wp_page_menu_args', 'modify_nav_menu_args' );