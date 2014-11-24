// @codekit-prepend 'vendor/modernizr-2.8.2.min.js'
// @codekit-prepend 'plugins/fastclick.js'
// @codekit-prepend 'plugins/retina.js'
// @codekit-prepend 'plugins/simpleAnchors.js'
// @codekit-prepend 'plugins/jquery.easing.min.js'
// @codekit-prepend 'plugins/jquery.lazyload.min.js'
// @codekit-prepend "plugins/jquery.validate.min.js"
// @codekit-prepend 'plugins/responsive-nav/responsive-nav.min.js'

(function($){

	/* jshint devel:true */
	'use strict';

	window.THEMENAME = {};

	var SHORTNAME = window.THEMENAME;

	var $window = $(window);

	SHORTNAME.init = function(){
		SHORTNAME.setElements();
		SHORTNAME.basics();
		SHORTNAME.vertAlign();
		SHORTNAME.forms();
		SHORTNAME.infinitescroll();
		SHORTNAME.ajax();
	};

	SHORTNAME.setElements = function(){
		SHORTNAME.elems				= {};
	};

	SHORTNAME.basics = function(){

		if( window.back_to_top ) {
			$window.scroll(function(){
				if ( $(this).scrollTop() > 300 ) {
					$('a[data-scroll-to="top"]').addClass('fadeIn');
				} else {
					$('a[data-scroll-to="top"]').removeClass('fadeIn');
				}
			});
		}

		// override reply link and smooth scroll to form
		$('.comment-reply-link').on('click', function(e){
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $('#respond').offset().top
			});
		});

		// jQuery Lazyload
		$('img.lazy').lazyload({
			threshold   : 200,
			effect      : 'fadeIn',
		});
		// usage: <img class="lazy" data-original="" src="gray.png" alt="" />

		// Fastclick.js - Polyfill to remove click delays on browsers with touch UIs
		$(function() {
			window.FastClick.attach(document.body);
		});

		// SimpleAnchors
		$.simpleAnchors({
			offset: -1, // 80-1, header height on scroll
			easing: 'easeInOutCubic'
		});



		// testing json wp
		$.ajax({
		    type: 'GET',
		    url: rootURL + '/posts?type=news',
		    dataType: 'json',
		    success: function(data){
		    // do something with the data here
		    }
		});
		alert('foo');


	};

	SHORTNAME.infinitescroll = function() {

		if ( !$.fn.infinitescroll ) return;

		if ( !window.is_singular && window.infinite_scroll == '1' ) {

			SHORTNAME.elems.mixItUp.infinitescroll({

				loading: {
					// finished: undefined, // undefined or function
					finishedMsg: '<em>Congratulations, you\'ve reached the end of the internet.</em>',
					// img: window.framework_url + 'assets/images/loader.gif',
					// img: '',
					msgText: '<em>Loading the next set of posts...</em>',
				},
				// debug: true,
				behavior: 'twitter', // default: undefined; comment out for on scroll, set to twitter for on click
				navSelector: '.pagination',
				nextSelector: '.pagination a:first',
				itemSelector: '.post',
				// animate: true,

			}, function ( newElements ){

				// if ( SHORTNAME.elems.mixItUp.length ) {
				// 	SHORTNAME.elems.mixItUp.mixItUp( 'append', $(newElements), '', function(){

				// 		// console.log('new items appended');
				// 		$('img.lazy').lazyload({
				// 			threshold   : 200,
				// 			effect      : 'fadeIn',
				// 		});
				// 	});
				// }

			});

		}

	};

	SHORTNAME.forms = function(){

		// Form Validation
		if ( $().validate ) {
			$('#commentform').validate();
			$('#commentform').removeAttr('novalidate');

			$('#contactForm').validate({
				validClass: 'success',
				errors: {
					contactName: {
						required: '',
						contactName: ''
					},
					email: {
						required: '',
						email: ''
					},
					mailSubject: {
						required: '',
						mailSubject: ''
					},
					comments: {
						required: '',
						comments: ''
					},
				}
			});
		}

	};

	SHORTNAME.vertAlign = function() {
		// Vertical Align
		var vertAlign = function() {
			$('.valign').each(function() {
				var newHeight = $(this).parent().height();
				$(this).parent().height(newHeight);
			});
		};
		vertAlign();
	};

	SHORTNAME.ajax = function(){
        // We'll pass this variable to the PHP function example_ajax_request
        var fruit = 'Banana';

        // This does the ajax request
        $.ajax({
            url: adminAjax.ajaxurl,
            data: {
                'action':'example_ajax_request',
                'fruit' : fruit
            },
            success:function(data) {
                // This outputs the result of the ajax request
                console.log(data);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    }

	$window.load(function(){

	});

	$(document).ready(function(){

		SHORTNAME.init();

	});//close document ready

})(window.jQuery);