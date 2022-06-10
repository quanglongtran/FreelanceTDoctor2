(function ($) {
    $(document).ready(function () {

        //Preloader JS
     //   $("#element").introLoader();

        //active nav
        var pgurl = window.location.href.substr(window.location.href
            .lastIndexOf("/") + 1);
        $(".navbar-default .navbar-nav>li>a").each(function () {
            if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
                $(this).addClass("active");
        });


        // fixed header
        $(window).scroll(function () {

            var scroll_nav = $(window).scrollTop();

            if (scroll_nav >= 20) {
                $("#logo a img").css({
                    "padding": "0px"
                });
                $(".navbar-nav>li>a").css({
                    "padding-top": "10px",
                    "padding-bottom": "10px"
                });
                $(".navbar-toggle").css({
                    "margin-top": "10px"
                });
            } else {
                $("#logo a img").css({
                    "padding": "10px 0"
                });
                $(".navbar-nav>li>a").css({
                    "padding-top": "15px",
                    "padding-bottom": "15px"
                });
                $(".navbar-toggle").css({
                    "margin-top": "10px"
                });
            }
        });

        //service section
        $(".single-service").mouseover(function () {
            $(this).find("h3").css({
                "color": "#fff"
            });
            $(".single-service p").css({
                "color": "#000"
            });
            $(this).find("span").stop().addClass("span-hover");
        });
        $(".single-service").mouseout(function () {
            $(this).find("h3").css({
                "color": "#2B96CC"
            });
            $(".single-service p").css({
                "color": "#707070"
            });
            $(this).find("span").stop().removeClass("span-hover");
        });

        //owl carousel for team section
        var owl = $("#team-slide");

        owl.owlCarousel({
            navigation: true,
            pagination: false,
            items: 3,
            // slideSpeed : 500,
            // autoPlay: 4000,
            loop:true,
            margin:10,
            slideSpeed: 10,
            autoPlay:true,
            autoPlayTimeout:1000,
            autoPlayHoverPause:true


        });
	$("#question-content").owlCarousel({
		navigation: true,
		pagination: false,
		items:4,
        // slideSpeed : 500,
        // autoPlay: 4000,
        loop:true,
        margin:10,
        slideSpeed: 10,
        autoPlay:true,
        autoPlayTimeout:1000,
        autoPlayHoverPause:true
	});
	$("#deal-content").owlCarousel({
		navigation: true,
		pagination: false,
		items:4,
        // slideSpeed : 500,
        // autoPlay: 4000,
        loop:true,
        margin:10,
        slideSpeed: 10,
        autoPlay:2000,
        autoPlayTimeout:1000,
        autoPlayHoverPause:true

	});
	$("#clinic-content").owlCarousel({
		navigation: true,
		pagination: false,
		items:4,
        // slideSpeed : 500,
        // autoPlay: 4000,
        loop:true,
        margin:10,
        slideSpeed: 10,
        autoPlay:true,
        autoPlayTimeout:1000,
        autoPlayHoverPause:true
	});
	$("#doctor-content").owlCarousel({
		navigation: true,
		pagination: false,
		items:4
	});
        //owl carousel for about section
        $("#about-content").owlCarousel({

            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            items: 1,

        });


        //panel
        function toggleChevron(e) {
            $(e.target)
                .prev('.faq-heading')
                .find("i.indicator")
                .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleChevron);
        $('.panel-group').on('shown.bs.collapse', toggleChevron);

        //back top animantion
        $('#back-top a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });



        // Date picker
        $("#datepicker").datepicker();


    }); //ready

    $(".tab-content-triggers a").on("click", function(e) {
        if (e.preventDefault(), !$(this).hasClass("active")) {
            var n = $($(this).attr("href"));
            n.show().siblings().hide(), $(this).closest(".tab-content-triggers").find("a").removeClass("active"), $(this).addClass("active"), $(this).attr("data-track-path") && t.page($(this).attr("data-track-path"), $(this).attr("title"))
        }
    });
    $("a.tab-content-link").on("click", function(t) {
        $('.tab-content-triggers a[href="' + $(this).attr("href") + '"]', e).click(), t.preventDefault()
    });
    var e = ".collapsible-container",
    t = ".collapsible-target",
    n = ".collapse-trigger",
    i = ".collapsible-block",
    o = ($(i).first(), 40);
$(e).each(function() {
    function i() {
        return 1 == $(this).parent(e).hasClass("collapsed") ? $(this).parent(e).removeClass("collapsed").addClass("expanded") : $(this).parent(e).removeClass("expanded").addClass("collapsed"), !1
    }
    return $(this).each(function() {
        var e = $(this).find("dt").length;
        if ($(this).hasClass("collapsible-list")) 10 >= e && $(this).find(n).hide();
        else if ($(this).hasClass("collapsible-text")) {
            var r = $(this).find(t).height();
            $(this).addClass("collapsed"), r - $(this).find(t).innerHeight() < o && ($(this).find(n).hide(), $(this).find(t).css("max-height", "none"))
        }
        $(this).unbind("click"), $(this).on("click", n, i)
    })
})
})(jQuery);
