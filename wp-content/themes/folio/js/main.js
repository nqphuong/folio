	$(document).ready(function() {

	// Supersized Background Images
	$.supersized({
		// Functionality
		slide_interval          :   6000,			// Length between transitions
		transition              :   1, 				// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	300,			// Speed of transition
		navigation              :   1,     			// Slideshow controls on/off
							   
		// Components							
		slide_links				:	'blank',		// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		slides 					:  	[				// Slideshow Images
										
		{image : 'images/background/bg2.jpg'},
		{image : 'images/background/bg.jpg'},
		{image : 'images/background/bg3.jpg'}																					
			]
	});


	// Navigation Hover
	if($(window).width() > 991) {

		$('.nav-main > li.dropdown').mouseenter(function() {
			$(this).addClass('open');
		});
		
		$('.nav-main > li.dropdown').mouseleave(function() {
			$(this).removeClass('open');
		});

	}

	// Initiat Fitvid Video item
	$('.video-item').fitVids();

	// Portfolio Single Slider
	$('.portfolio-slider').owlCarousel({
		singleItem: true,
		autoHeight : true,
		itemsDesktop: [1000, 1],
		itemsDesktopSmall: [900, 1],
		itemsTablet: [600, 1],
		itemsMobile: false,
		pagination: false,
		navigation:true,
		navigationText: [
			"<i class='fa fa-angle-left btn-slide'></i>",
			"<i class='fa fa-angle-right btn-slide'></i>"
		]
	});

	// Screenshot lightbox
	$('.lightbox').nivoLightbox({
	    effect: 'fadeScale'
	});

	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if($(window).width() > 1024) {
			if ($(this).scrollTop() > 100) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	// Fixed navigation
	$(window).scroll(function() {
	    if ($(window).scrollTop() > 17) {
	        $('.navbar-sticky').addClass('fixednav');
	        $('body.sticky-header').css("padding-top","122px");
	    } else {
	    	$('.navbar-sticky').removeClass('fixednav');
	    	$('body.sticky-header').css("padding-top","0px");
	    }
	});

	// Check if div.videobg exist then append video to background
	$.fn.exists = function(callback) {
	  var args = [].slice.call(arguments, 1);

	  if (this.length) {
	    callback.call(this, args);
	  }

	  return this;
	};

	// Usage
	$('.videobg').exists(function() {
	  this.append(
			$('.videobg').tubular({
				wrapperZIndex: 0
			})
	  );
	});

	$(document).ready(function() {
		$(".image-show").owlCarousel({
		  autoPlay : 3000,
		  stopOnHover : true,
		  navigation:true,
		  paginationSpeed : 1000,
		  goToFirstSpeed : 2000,
		  singleItem : true,
		  autoHeight : true,
		  transitionStyle:"fade",
		  pagination: false,
		  navigationText: [
			"<i class='fa fa-angle-left btn-slide'></i>",
			"<i class='fa fa-angle-right btn-slide'></i>"
			]
		});
	});
	
});