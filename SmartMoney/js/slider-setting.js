/*
Template: Go Finance Business & Finance  Modern Multipurpose Services Template
Author: GlixenTechnologies
Version: 1.0
Designed and Development by: GlixenTechnologies
*/

(function($) {
    "use strict";

  
   /* ======= Slider Type 1 ======= */
   revapi = "";
    if ($('.rev_slider_wrapper .rev_slider').length) {
    var revapi = $(".rev_slider").revolution({
             sliderType:"standard",
             jsFileLocation: "js/revolution-slider/js/",
             sliderLayout: "auto",
             dottedOverlay: "none",
             delay: 5000,
             navigation: {
                 keyboardNavigation: "off",
                 keyboard_direction: "horizontal",
                 mouseScrollNavigation: "off",
                 onHoverStop: "off",
                 touch: {
                     touchenabled: "on",
                     swipe_threshold: 75,
                     swipe_min_touches: 1,
                     swipe_direction: "horizontal",
                     drag_block_vertical: false
                 },
                 arrows: {
                     style: "gyges",
                     enable: true,
                     hide_onmobile: false,
                     hide_onleave: true,
                     hide_delay: 200,
                     hide_delay_mobile: 1200,
                     tmp: '',
                     left: {
                         h_align: "left",
                         v_align: "center",
                         h_offset: 0,
                         v_offset: 0
                     },
                     right: {
                         h_align: "right",
                         v_align: "center",
                         h_offset: 0,
                         v_offset: 0
                     }
                 },
                 
                   bullets: {
                   enable: true,
                   hide_onmobile: true,
                   hide_under: 800,
                   style: "hebe",
                   hide_onleave: false,
                   direction: "horizontal",
                   h_align: "center",
                   v_align: "bottom",
                   h_offset: 0,
                   v_offset: 30,
                   space: 5,
                   tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
               }
             },
             responsiveLevels: [1240, 1024, 778],
             visibilityLevels: [1240, 1024, 778],
             gridwidth: [1170, 1024, 778, 480],
             gridheight: [620, 768, 960, 720],
             lazyType: "none",
             parallax: {
         type: "scroll",
         origo: "slidercenter",
         speed: 1000,
         levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
         type: "scroll",
             },
             shadow: 0,
             spinner: "off",
             stopLoop: "on",
             stopAfterLoops: 0,
             stopAtSlide: -1,
             shuffle: "off",
             autoHeight: "off",
             fullScreenAutoWidth: "off",
             fullScreenAlignForce: "off",
             fullScreenOffsetContainer: "",
             fullScreenOffset: "0",
             hideThumbsOnMobile: "off",
             hideSliderAtLimit: 0,
             hideCaptionAtLimit: 0,
             hideAllCaptionAtLilmit: 0,
             debugMode: false,
             fallbacks: {
                 simplifyAll: "off",
                 nextSlideOnWindowFocus: "off",
                 disableFocusListener: false,
             }
           });
		   }
		   

})(jQuery);