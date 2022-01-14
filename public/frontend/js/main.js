/*
Author       : Belal Hossain.
Template Name: Bumper - Material Design Agency Template
Version      : 1.0
*/

(function($) {
	'use strict';
	
	jQuery(document).ready(function(){
	
		/*PRELOADER JS*/
			$(window).load(function() { 
				$('.status').fadeOut();
				$('.preloader').delay(350).fadeOut('slow'); 
			}); 
		/*END PRELOADER JS*/

		/* START MENU JS */
			$('a').on('click', function(e){
				var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 50
				}, 1500);
				e.preventDefault();
			});		

	
			$(window).scroll(function() {
			  if ($(this).scrollTop() >0) {
				$('.menu-top').addClass('menu-shrink');
			  } else {
				$('.menu-top').removeClass('menu-shrink');
			  }
			});
			
			$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
			});				
		/* END MENU JS */
		
		/* START ABOUT US */
			$('.about_slider').owlCarousel({
				loop:true,
				navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
				smartSpeed:450,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut',
				autoplay:true,  
				autoplayTimeout:7000,
				mouseDrag:true,
				nav:true,
				responsive:{
				 0:{
				  items:1
				 },
				 600:{
				  items:1
				 },
				 1000:{
				  items:1
				 }
				}
			})
		/* END ABOUT US */
		
		/*START MIXITUP JS*/
		
			$('.portfolio_item_area').mixItUp();
				
		/*END MIXITUP JS*/
		
		/* START LIGHTBOX */
		
			lightbox.option({
			  'resizeDuration': 200,
			  'wrapAround': true
			});
		
		/* END LIGHTBOX JS */
		
		/*START COUNDOWN JS*/
		$('#counterup').on('inview', function(event, visible, visiblePartX, visiblePartY) {
			if (visible) {
				$(this).find('.counter').each(function () {
					var $this = $(this);
					$({ Counter: 0 }).animate({ Counter: $this.text() }, {
						duration: 2000,
						easing: 'swing',
						step: function () {
							$this.text(Math.ceil(this.Counter));
						}
					});
				});
				$(this).unbind('inview');
			}
		});
		/*END COUNDOWN JS */
		
		/* START TESTIMONIAL JS */
			$(".testmonial_slider_area").owlCarousel({
				autoPlay: true,
				slideSpeed:1000,
				items : 3,
				loop: true,
				nav:true,
				navText:['<i class="ti-arrow-left"></i>','<i class="ti-arrow-right"></i>'],
				margin: 30,
				dots: true,
				responsive:{
					320:{
						items:1
					},
					767:{
						items:2
					},
					600:{
						items:2
					},
					1000:{
						items:3
					}
				}
				
			});
		/* END TESTIMONIAL JS */
		
		/* START SCROLL TO */
			$(window).on('scroll',function(){
		    if($(this).scrollup() > 100){
		        $('.scrollup').removeClass('not-visible');
		    }
		    else{
		        $('.scrollup').addClass('not-visible');
		    }
			});
			$('.scrollup').on('click',function (event){
				$('html,body').animate({
					scrollTop:0
				},1000);
			});
		/* END SCROLL TO */
		
	});	
	
	/*  Stellar for background scrolling  */
		(function () {

			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			 
			} else {
				$(window).stellar({
					horizontalScrolling: false,
					responsive: true
				});
			}

		}());
	/* End Stellar for background scrolling  */
		
	/*START WOW ANIMATION JS*/
	  new WOW().init();	
	/*END WOW ANIMATION JS*/
		
})(jQuery);	