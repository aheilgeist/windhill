<?php $wl_theme_options = weblizar_get_options();?>
<script>
 jQuery(document).ready(function ($) {
	 //show until every thing loaded
    jQuery('.rev-slider-fixed,.rev-slider-full').css('visibility', 'visible');
	/* Full */
    jQuery('.rev-slider-banner-full').revolution({
        delay: <?php echo $wl_theme_options['side_interval'];?>,
        startwidth: 1170,
        startheight: 500,

        onHoverStop: "<?php echo $wl_theme_options['side_pause'];?>",

        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 3,

        hideThumbs: 0,

        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "bullets",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 30,
        navigationVOffset: 30,

        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        touchenabled: "on",

        stopAtSlide: -1,
        stopAfterLoops: -1,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        hideSliderAtLimit: 0,

        fullWidth: "on",
        fullScreen: "off",
        fullScreenOffsetContainer: "#topheader-to-offset",

        shadow: 0

    });
    
});	
</script>
<?php get_header(); ?>
<?php get_template_part('home','slider'); ?>
<?php get_template_part('home','service'); ?>
<?php get_template_part('home','blog'); ?>
<?php get_footer(); ?>