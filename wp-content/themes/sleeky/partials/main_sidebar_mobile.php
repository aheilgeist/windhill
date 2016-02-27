<div class="sleeky_mobile_toggle">
    <div class="nav_mobilemenu">
        <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'mobile_menu'
                ));
            }
        ?>
    </div>
</div>    