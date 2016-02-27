//==============================================================

// CUSTOM SCRIPTS

// 2014

// ==============================================================
jQuery(document).ready(function($) {

    /*
    =================================================
    Mobile Menus
    =================================================
    */
    function create_toggle_menu() {
        jQuery('html, body').animate({scrollTop:0}, 'fast');
        jQuery('.sleeky_mobile_toggle').show();
        jQuery('.main-wrapper').css({"left":"-250px", "position": "relative"});
    }

    function create_toggle_close(){
            jQuery('.sleeky_mobile_toggle').hide();
            jQuery('.main-wrapper').css({"left":"0px", "position": "relative"});
     }

    jQuery('.toggle_menu_bar').toggle(function() {   
        create_toggle_menu();
    },
    function() {
        create_toggle_close();
    });


    //Menu Sidebar Toggle 
    jQuery('.nav_usermobilemenu').hide();
        
        jQuery('.sleeky_mobile_toggle_Menu').click(function(){
            jQuery('.nav_usermobilemenu').hide();
            jQuery('.nav_mobilemenu').show();
        });
        jQuery('.sleeky_mobile_toggle_user').click(function(){
            jQuery('.nav_mobilemenu').hide();
            jQuery('.nav_usermobilemenu').show();
        });
    //change toggle menu on screen more than 1000
    jQuery(window).resize(function(){
        var window_width= jQuery(window).width();
        if (window_width > 1000) {
            create_toggle_close();
        }
    });


    // Primary Menu

    jQuery(".dsp-menu li a").each(function() {

        if (jQuery(this).next().length > 0) {

            jQuery(this).addClass("parent");

        };

    })



    //Primary Menu Toggle

    jQuery(".toggleMenu").click(function(e) {

        e.preventDefault();

        jQuery(this).toggleClass("active");

        jQuery(".dsp-menu").toggle();

    });

});





//Responsive menu

jQuery(window).bind('resize orientationchange', function() {

    ww = document.body.clientWidth;

    adjustMenu();

});



var adjustMenu = function() {

    if (ww < 991) {

        jQuery(".toggleMenu").css("display", "block");

        if (!jQuery(".toggleMenu").hasClass("active")) {

            jQuery(".dsp-menu").hide();

        } else {

            jQuery(".dsp-menu").show();

        }

        jQuery(".dsp-menu li").unbind('mouseenter mouseleave');

        jQuery(".dsp-menu li a.parent").unbind('click').bind('click', function(e) {

            // must be attached to anchor element to prevent bubbling

            e.preventDefault();

            jQuery(this).parent("li").toggleClass("hover");

        });

    }

    else if (ww >= 991) {

        jQuery(".toggleMenu").css("display", "none");

        jQuery(".dsp-menu").show();

        jQuery(".dsp-menu li").removeClass("hover");

        jQuery(".dsp-menu li a").unbind('click');

        jQuery(".dsp-menu li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {

            // must be attached to li so that mouseleave is not triggered when hover over submenu

            jQuery(this).toggleClass('hover');

        });

    }

}





