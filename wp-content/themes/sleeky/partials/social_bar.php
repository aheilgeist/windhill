<?php
/**
 * Social bar group
 * @package Sleeky
 * @since 1.0.0
 */
?>
	<?php $options = get_theme_mods();
		echo '<div id="social-icons"><ul>';										
		if (!empty($options['twitter_uid'])) {
			echo '<li><a title="Twitter" href="' . $options['twitter_uid'] . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		}
		if (!empty($options['facebook_uid'])) echo '<li><a title="Facebook" href="' . $options['facebook_uid'] . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
			if (!empty($options['google_uid'])) echo '<li><a title="Google+" href="' . $options['google_uid'] . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';			
		echo '</ul></div>';		
?>