<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'weblizar' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
		<div class="hc_comment_section">	
			<div class="hc_comment_title">
				<h3><i class="fa fa-comments"></i><?php echo comments_number('No Comments', '1 Comment', '% Comments'); ?></h3>
			</div>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
			<?php endif; ?>
			<?php wp_list_comments( array( 'callback' => 'weblizar_comment' ) ); ?>
		</div>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'weblizar' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'weblizar' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'weblizar' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
        _e("Comments Are Closed!!!",'weblizar'); ?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be",'weblizar'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'weblizar')?></a> <?php _e("to post a comment",'weblizar'); ?>
</p>
<?php else : ?>
	<div class="row">
	 <div class="blog-span">
							
	<?php  
	 $fields=array(
		'author' => '<div class="form-group clearfix"><label class="control-label col-xs-2" id="name">Name *</label><input required class="form-control" name="author" id="author" value="" type="text"/></div>',
		'email' => '<div class="form-group clearfix"><label class="control-label col-xs-2" id="user-email"> E-mail *</label><input  required class="form-control" name="email" id="email" value=""   type="email" ></div>',
		'website' => '<div class="form-group clearfix"><label class="control-label col-xs-2" id="website_url">Website *</label><input required class="form-control" name="website" id="website" value=""   type="text" ><br/></div>',
		);
	function my_fields($fields) { 
		return $fields;
	}
	add_filter('comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form-group clearfix"><label class="control-label col-xs-2" id="message"> Message *</label>
		<div class="col-xs-8"><textarea id="comments" rows="5" class="form-control" name="comment"></textarea></div></div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'weblizar' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__(" Log out?",'weblizar').'</a>' . '</p>',
		'id_submit'=> 'wl_btn',
		'class_submit' => 'btn btn-primary',
		'label_submit'=>__( 'Send','weblizar'),
		'comment_notes_after'=> '',
		'title_reply'=> '<div class="title-block clearfix"> <h3 class="h3-body-title">leave A Comment</h3> <div class="title-seperator"></div></div>',
		'id_form'=> 'comment-form',
		'class_form'=> 'form-wrapper'
		);
		comment_form($defaults); ?>		
		</div>
</div>
<?php endif; // If registration required and not logged in ?>
<?php endif;  ?>