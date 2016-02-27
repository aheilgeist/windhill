/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery(function() {
    jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="http://www.styledthemes.com/sleeky-pro" class="button" target="_blank">'+ sleeky_buttons.pro_version +'</a>' );
	jQuery( '.wp-full-overlay-sidebar-content' ).prepend( '<a style="width: 80%; margin: 20px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/sleeky?filter=5" class="button" target="_blank">'+ sleeky_buttons.review +'</a>' );

});