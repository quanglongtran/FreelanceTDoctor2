


// Slider -----
var msl = $('.main-slider');
msl.owlCarousel({
    nav:true,
    margin:0,
	loop:true,
	autoplay:true,
	autoplayTimeout:8000,
    autoplayHoverPause:true,
	dots:false,
	animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1
});

// Products ---------
var owl = $('.dr-slider');
owl.owlCarousel({
    nav:false,
    margin:20,
	dots:true,
    responsive:{
        0:{
            items:2
        },
        812:{
            items:2
        },            
        1200:{
            items:3
        },
        1400:{
            items:4
        }
    }
});
// Services ---------
var svl = $('.sv-slider');
svl.owlCarousel({
    nav:true,
    margin:20,
	dots:true,
    responsive:{
        0:{
            items:1
        },
        812:{
            items:2
        },            
        1200:{
            items:3
        },
        1400:{
            items:3
        }
    }
});
//home-news
var col = $('.home-news-slider');
col.owlCarousel({
    // nav:true,
    margin:30,
    // stagePadding:50,
    // center:true,
    autoplay:true,
    loop:true,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        812:{
            items:3
        },
        1200:{
            items:4
        },
        1400:{
            items:4
        }
    }
});

//home-news
var col = $('.home-recruitment-slider');
col.owlCarousel({
    // nav:true,
    margin:30,
    // stagePadding:50,
    // center:true,
    autoplay:true,
    loop:true,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        812:{
            items:3
        },
        1200:{
            items:4
        },
        1400:{
            items:4
        }
    }
});

// Com ---------
var col = $('.com-slider');
col.owlCarousel({
    nav:true,
    margin:0,
	center:true,
	autoplay:true,
	loop:true,
	dots:true,
    responsive:{
        0:{
            items:1
        },
        812:{
            items:3
        },            
        1200:{
            items:3
        },
        1400:{
            items:3
        }
    }
});

// Products ---------
var los = $('.customers-slider');
los.owlCarousel({
    margin:20,
	nav:true,
	dots:false,
    responsive:{
        0:{
            items:1
        },
        812:{
            items:2
        }
    }
});

//-------------

$(document).ready(function() {
		$('a[href*="#"]').bind('click', function(e) {
				e.preventDefault(); // prevent hard jump, the default behavior
				
				var target = $(this).attr("href"); // Set the target as variable
				
				// perform animated scrolling by getting top-position of target-element and set it as scroll target
				$('html, body').stop().animate({
						scrollTop: $(target).offset().top
				}, 600, function() {
						location.hash = target; //attach the hash (#jumptarget) to the pageurl
				});
			
				return false;
		});
});

$(window).scroll(function() {
	var scrollDistance = $(window).scrollTop(),
		offsetTop = $('.main-slider').height();
	// Show/hide menu on scroll
	//if (scrollDistance >= 850) {
	//		$('nav').fadeIn("fast");
	//} else {
	//		$('nav').fadeOut("fast");
	//}

	// Assign active class to nav links while scolling
	$('.cat-section').each(function(i) {
			if ($(this).position().top <= scrollDistance - offsetTop) {
					$('.nav-list a.active').removeClass('active');
					$('.nav-list a').eq(i).addClass('active');
			}
	});
}).scroll();

//-----------------
$(window).scroll(function () {
	var a = $(window).scrollTop(),
		b = 85;
	if (a > b) {
		$('.top-nav').addClass('fixed');
	} else {
		$('.top-nav').removeClass('fixed');
	}
});

//----------------------

$('.open-lb').click(function() {
	$(this).removeClass('show');
	$('.close-lb').addClass('show');
	$('nav').addClass('show');
});
$('.close-lb').click(function() {
	$(this).removeClass('show');
	$('.open-lb').addClass('show');
	$('nav').removeClass('show');
});

//--------------------------

$('.picking-one > .span').each(function() {
	$(this).click(function() {
		$('.picking-one > .span label').removeClass('active');
		$(this).find('label').addClass('active');
	});
});

//---------------------------

$('.block-register .group-labels label').each(function(){
	$(this).click(function() {
		$('.block-register .group-labels label').removeClass('active');
		$(this).addClass('active');
	});
});
$('.register-tab').click(function() {
	$('.tab-register').addClass('active');
	$('.tab-login').removeClass('active');
});
$('.login-tab').click(function() {
	$('.tab-register').removeClass('active');
	$('.tab-login').addClass('active');
});

//---------------------------

// $('body').attr('onkeypress', 'return disableCtrlKeyCombination(event);').attr('onkeydown', 'return disableCtrlKeyCombination(event);');
$(".gotop").on("click", function(e) {
	e.preventDefault();
	$("html,body").animate({"scrollTop": 0});
    return false;
});
