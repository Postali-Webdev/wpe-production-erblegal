/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	var width = $(document).outerWidth()

    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#header-top_menu .menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#header-top_menu .menu').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#header-top_menu .menu').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#header-top_menu .menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-icon-chevron-right"></span></span></div>');

	  $('#header-top_menu .menu .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(400);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	  });

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });

	//keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	$(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				console.log('blur!');
				subMenu.css('display', 'none');
			})
		})
	});

	$(document).ready(function() {
		if( width < 1201 ) {
			$('.menu-item-has-children').on('click', function() {
				console.log('click');
				$(this).find('.sub-menu').slideToggle('medium');
			});
		}
	})

	// Toggle search function in nav
	$( document ).ready( function() {
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-magnifying-glass').addClass('icon-close-x');
						$('#header-top_menu .menu li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#header-top_menu .menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-close-x').addClass('icon-magnifying-glass');
						$('#header-top_menu .menu li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});

});