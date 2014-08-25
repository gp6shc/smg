/*
 * Carousel - jQuery Plugin
 * Simple and fancy slider with controls
 *
 * Examples and documentation at: http://inkdevs.com/javascript/carousel
 * 
 * Copyright (c) 2011 Inkdevs
 * That said, it is hardly a one-person project. Many people have submitted bugs, code, and offered their advice freely. Their support is greatly appreciated.
 * 
 * Version: 1.0 (05/16/2011)
 * Requires:
 * - jQuery v1.6.1+
 * - jQuery UI v1.8.12+ (only needed if you want to use the directional effect)
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function( $ ){
	function bind_events(){
		$('.'+methods.settings['slides']).each(function(index, element){ 
			jQuery(element).bind({
				'mouseover.Carousel': function(e){ if( methods.settings['slideshow_start'] == true ) slideshow(false); },
				'mouseout.Carousel': function(e){ if( methods.settings['slideshow_start'] == true ) slideshow(true); }
			});
		});
		$(document).bind({
			'keydown.Carousel': function(e){
				if( $('.'+methods.settings['slides']).length > 1 ){
					var code = (e.keyCode ? e.keyCode : e.which);
					if( code == 37 ) slide_position("prev");
					else if( code == 39 ) slide_position("next");
					if( methods.settings['slideshow_start'] == true ) slideshow('reset');
				}
			}
		});
	}
	function controls(){
		$('*[slider="yes"] *[slider="controls"] a').live('click',function(){
			var current = $(this).siblings('.active').attr('rel'),
				direction = $(this).attr('direction');
			if( direction == undefined ) if( $(this).attr('rel') < current ) direction = "backward"; else direction = "forward";
			if( !($(this).hasClass('active')) ) slide_position(direction,$(this).attr('rel'));
			return false;
		})
	}
	function find_opposite(direction){
		switch(direction){
			case "up": return "down"; break;
			case "down": return "up"; break;
			case "left": return "right"; break;
			case "right": return "left"; break;
		}
	}
	function slide_position(direction,id){
		current_pos = parseFloat($('.slide.active').attr('rel'));
		if( direction == "prev" || direction == "next") position = slide_increment(direction); else position = id;
		var slide_current = $('*[slider="yes"] .slide.active'),
			slide_next    = $('*[slider="yes"] .slide[rel="'+position+'"]'),
			ctrl_current  = $('*[slider="yes"] *[slider="controls"] a.active'),
			ctrl_next	  = $('*[slider="yes"] *[slider="controls"] a[rel="'+position+'"]'),
			effect_to_use = '';
		if( (direction == "prev" || direction == "backward") && (methods.settings['effect'] == "up" || methods.settings['effect'] == "down" || methods.settings['effect'] == "left" || methods.settings['effect'] == "right") ) effect_to_use = find_opposite(methods.settings['effect']); else effect_to_use = methods.settings['effect'];
		
		switch(effect_to_use){
			case 'up': case 'down': case 'left': case 'right':
				slide_current.removeClass('active');
				slide_next.stop(true,true).show( 'slide', { direction: find_opposite(effect_to_use), easing: methods.settings['easing'] }, methods.settings['delay'],function(){ slide_next.addClass('active'); });
				slide_current.stop(true,true).hide( 'slide', { direction: effect_to_use, easing: methods.settings['easing'] }, methods.settings['delay'] );
				break;
			case 'photo':
				slide_current.stop(true,true).fadeOut(methods.settings['delay']/30, 'linear' , function(){ slide_next.addClass('active'); slide_current.removeClass('active'); });
				slide_next.stop(true,true).fadeIn(methods.settings['delay'], 'easeOutQuart');
				break;
			case 'parapxl':
				slide_current.find('div.info').fadeOut(500);
				slide_current.find('img').hide( 'slide', { direction: 'down', easing: 'easeOutBounce' }, 1000 );
				slide_current.stop(true,true).delay(1000).fadeOut(methods.settings['delay']);
				slide_next.stop(true,true).delay(1000).fadeIn(methods.settings['delay'],function(){ slide_current.removeClass('active'); slide_next.addClass('active'); });
				slide_next.find('img').delay(1000).show( 'slide', { direction: 'down', easing: '' }, 500 );
				slide_next.find('div.info').delay(1000).fadeIn(500);
				break;
			default:
				slide_current.stop(true,true).fadeOut(methods.settings['delay']);
				slide_next.stop(true,true).addClass('transition').stop(true,true).fadeIn(methods.settings['delay'],function(){ slide_next.siblings('.active').removeClass('active'); slide_next.addClass('active').removeClass('transition'); });
				break;
		}
		ctrl_current.removeClass('active'); ctrl_next.addClass('active');
	}
	function slide_increment(direction){
		if( direction == "prev" ) var position = current_pos-1;
		else var position = current_pos+1;
		if( position == 0 ) position = $('.'+methods.settings['slides']).length;
		else if( position > $('.'+methods.settings['slides']).length ) position = 1;
		return position;
	}
	function slideshow(action){
		switch(action){
			case true: case 'reset':
				clearInterval(methods.settings['slideshow_id']);
				methods.settings['slideshow_id'] = setInterval(function() { slide_position("next"); }, methods.settings['time']);
				break;
			default: clearInterval(methods.settings['slideshow_id']); break;
		}
	}
	var methods = {
		settings: {
			delay: 1500,
			effect: 'default',
			slides: 'slide',
			slideshow_start: false,
			slideshow_id : '',
			time: 7000
		},
		init : function( options ) {
			return this.each(function(){
				$.extend(methods.settings, options);
				if( methods.settings['slideshow_start'] == true ) slideshow(true);
				controls();
				bind_events();
			})
		},
		pause : function( ) {
			return this.each(function(){
				if( methods.settings['slideshow_start'] == true ) slideshow(false);
				$('.'+methods.settings['slides']).each(function(index, element){ jQuery(element).unbind('.Carousel'); })
				$(document).unbind('.Carousel');
			})
		},
		play : function() {
			return this.each(function(){
				if( methods.settings['slideshow_start'] == true ) slideshow(true);
				bind_events();
			})
		}
	};
	$.fn.carousel = function(method){
		// Method calling logic
			if ( methods[method] ) return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
			else if ( typeof method === 'object' || ! method ) return methods.init.apply( this, arguments );
			else $.error( 'Method ' +  method + ' does not exist on jQuery.carousel' );
	};
})( jQuery );