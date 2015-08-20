(function($){

	/* jshint devel:true */
	'use strict';

	window.THEMENAME = {};

	var SHORTNAME = window.THEMENAME;

	var $window      = $(window),
		$body        = $(document.body),
		$html        = $(document.documentElement);

	SHORTNAME.init = function(){

		SHORTNAME.setElements();
		SHORTNAME.colors();
		SHORTNAME.basics();
		SHORTNAME.forms();
		SHORTNAME.infinitescroll();
		SHORTNAME.ajax();

	};

	SHORTNAME.setElements = function(){
		SHORTNAME.elems               = {};

		// defaults
		SHORTNAME.elems.html          =	$('html');
		SHORTNAME.elems.body          =	$('body');
		SHORTNAME.elems.scrollToTop   =	$('a[data-scroll-to="top"]');

	};

	SHORTNAME.colors = function() {
		var colors = {
			aqua    : '#7FDBFF',
			blue    : '#0074D9',
			lime    : '#01FF70',
			navy    : '#001F3F',
			teal    : '#39CCCC',
			olive   : '#3D9970',
			green   : '#2ECC40',
			red     : '#FF4136',
			maroon  : '#85144B',
			orange  : '#FF851B',
			purple  : '#B10DC9',
			yellow  : '#FFDC00',
			fuchsia : '#F012BE',
			gray    : '#aaa',
			white   : '#fff',
			black   : '#111',
			silver  : '#ddd'
		};
		// console.log(colors);
		// console.log(colors.blue);
	};

	SHORTNAME.basics = function() {

		// override reply link and smooth scroll to form
		$('.comment-reply-link').on('click', function(e){
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $('#respond').offset().top
			});
		});

		// Fastclick.js - Polyfill to remove click delays on browsers with touch UIs
		$(function() {
			window.FastClick.attach(document.body);
		});

		// SimpleAnchors
		$.simpleAnchors({
			offset: -1, // 80-1, header height on scroll
			easing: 'easeInOutCubic'
		});

		// Target your .container, .wrapper, .post, etc.
		SHORTNAME.elems.body.fitVids();



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

	$window.load(function() {

	});

	$window.resize(function(event) {

	});

	$(document).ready(function(){

		SHORTNAME.init();

	});

})(window.jQuery);
