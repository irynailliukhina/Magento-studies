jQuery(document).ready(function(t){var s=location.href.replace(/\/$/,"");if(location.hash){var a=s.split("#");t('#seasonsTab a[href="#'+a[1]+'"]').tab("show"),s=location.href.replace(/\/#/,"#"),history.replaceState(null,null,s)}if(t('a[data-toggle="tab"]').on("click",function(){var a,e=t(this).attr("href");a="#home"==e?s.split("#")[0]:s.split("#")[0]+e,a+="/",history.replaceState(null,null,a)}),0<t(".nav-seasontabs").length&&t(".nav-seasontabs .prev-next").on("click",function(a){a.preventDefault();t(".nav-seasontabs .nav-item").length;var e=t(".nav-link.page-link.active").parent();t(this).hasClass("next")?e.next().hasClass("nav-item")&&e.next().find("a").click():t(this).hasClass("prev")&&e.prev().hasClass("nav-item")&&e.prev().find("a").click()}),0<t("body.home").length){var e=t(".dgb-cta").clone();t(".dgb-cta").addClass("d-none d-md-block"),t(".wp-bootstrap-blocks-container > .wp-bootstrap-blocks-row:nth-child(2) > .col-12:last-child").before(e),t(".wp-bootstrap-blocks-container > .wp-bootstrap-blocks-row:nth-child(2) > .dgb-cta").removeClass("d-none d-md-block").addClass("mobile").wrapAll('<div class="col-12 d-block d-md-none"></div>')}t("#masthead > .navbar").waypoint({handler:function(a){"down"==a?767<t(window).width()&&(t(this.element).addClass("sticky"),t("#masthead .header-banner").addClass("stuck")):"up"==a&&767<t(window).width()&&(t(this.element).removeClass("sticky"),t("#masthead .header-banner").removeClass("stuck"))}});t(".sticky-search .form-toggle").on("click",function(){t(".sticky-search .searchform").toggleClass("show"),"inline"==t(".sticky-search .searchform input.search-field").css("display")&&t(".sticky-search .searchform input.search-field").focus()}),0<t(".wp-bootstrap-blocks-row.grey-bg").length&&t(".wp-bootstrap-blocks-row.grey-bg").each(function(){t(this).removeClass("grey-bg").wrapAll('<div class="grey-bg full-width"><div class="container"></div></div>')}),t(window).width()<768&&(t("#masthead > .navbar").addClass("sticky"),t("#masthead .header-banner").addClass("stuck")),0<t(".ad.top-banner").length&&p();var n,i={slidesToShow:2,slidesToScroll:2,autoplay:!1,mobileFirst:!0,dots:!0,adaptiveHeight:!1,infinite:!0,responsive:[{breakpoint:767,settings:"unslick"}]};t(".slick-responsive").slick(i),t(".slick-all-wrapper").slick({slidesToShow:1,slidesToScroll:1,autoplay:!1,dots:!0,adaptiveHeight:!1,infinite:!0});function o(){if(t(".slick-all-wrapper .slick-next").css("right","15px"),"rgb(0, 0, 0)"!=t(".navbar").css("background-color")){var a=t(".slick-all-wrapper").width(),e=t(".slick-all-wrapper .slick-dots").outerWidth(!0);if(e+15<a){var s=a-e+15;t(".slick-all-wrapper .slick-next").css("right",s)}}}function r(){t(".deals-wrapper .deal-details-wrapper .shop-wrapper").css("margin-top","");var a=t(".deals-wrapper .banner").height(),e=t(".deals-wrapper .deal-title").outerHeight(!0)+t(".deals-wrapper .deal-details-wrapper").outerHeight();if(e<a){var s=a-e+15;t(".deals-wrapper .deal-details-wrapper .shop-wrapper").css("margin-top",s)}}0<t(".slick-all-wrapper").length&&o(),0<t(".deals-wrapper").length&&r(),0<t(".btn.btn-secondary.dropdown-toggle").length&&h();var l=!1,c=200;function d(){new Date-n<c?setTimeout(d,c):(l=!1,0<t(".ad.top-banner").length&&p(),0<t(".btn.btn-secondary.dropdown-toggle").length&&h(),0<t(".deals-wrapper").length&&r(),0<t(".slick-all-wrapper").length&&o(),0<t(".slick-responsive").length&&(t(".slick-responsive").slick("destroy"),t(".slick-slider").each(function(){t(this).find(".slick-slide").css("height","")})),"rgb(0, 0, 0)"==t(".navbar").css("background-color")?(t("#masthead > .navbar").addClass("sticky"),t("#masthead .header-banner").addClass("stuck"),0<t(".slick-responsive").length&&(t(".slick-responsive").slick(i),t(".slick-slider").each(function(){var a=0;t(this).find(".slick-slide").each(function(){t(this).height()>a&&(a=t(this).height())})}))):(t("#masthead > .navbar").removeClass("sticky"),t("#masthead .header-banner").removeClass("stuck"))),0<t(".single-seasons").length&&w(),b(),g()}function h(){var a="window";"rgb(0, 0, 0)"==t(".navbar").css("background-color")&&(a="scrollParent"),t(".btn.btn-secondary.dropdown-toggle").each(function(){t(this).data("boundary",a)})}function p(){t("body").css("margin-top",""),"rgb(0, 0, 0)"==t(".navbar").css("background-color")&&t("body").css("margin-top","155px")}function b(){1200<=t(window).width()&&t(".dgb-slide-row").length&&t(".dgb-slide-row>div").matchHeight({target:t(".dgb-slide-row .banner-img")})}function g(){if(1200<=t(window).width()&&t(".dgb-slide-row").length){var a=t(".dgb-slide-row .image").first().height();t(".dgb-cta").css("height",a-12+"px")}}function w(){if(t(window).width()<768)t(".side-wrapper").css("margin-top","");else{var a=t("#seasonsTabContent #ep-1").offset().top,e=t("#seasonsTabContent  #ep-1 .meta-data").offset().top-a+t("#seasonsTabContent  #ep-1 .meta-data").outerHeight()+45;t(".side-wrapper").css("margin-top",e+"px")}}t(window).on("resize",function(){n=new Date,!1===l&&(l=!0,setTimeout(d,c))}),b(),g(),t("#main-navbar-collapse-1").on("show.bs.collapse",function(){t(".hamburger").addClass("is-active"),t("body").css("overflow","hidden")}),t("#main-navbar-collapse-1").on("hide.bs.collapse",function(){t(".hamburger").removeClass("is-active"),t("body").css("overflow","")}),t('iframe[src^="https://www.youtube.com"]').each(function(){"none"!=t(this).css("display")&&t(this).wrapAll('<div class="videoWrapperContainer"><div class="videoWrapper"></div></div>')}),0<t(".single-seasons").length&&w(),t(".ad.top-banner a.ad-link").on("click",function(a){var e=t(this).closest(".ad.top-banner").data("ad_title");"function"==typeof ga&&ga("send","event","Ad Click","Top Bar",e)})});