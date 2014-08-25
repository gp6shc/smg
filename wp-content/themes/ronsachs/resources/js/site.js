setTimeout(function(){
	(function($){ // Functions go before onReady
		jQuery(function(){ // onReady code goes in here:
			jQuery("#new-work-slider").royalSlider({
				controlNavEnabled: false,
				arrowsNavAutoHide: false,
				loop: true
			});
			jQuery("#slideshow").royalSlider({
				controlNavigation:'none',
				autoScaleSliderWidth:1010,
				autoScaleSliderHeight:422,
				arrowsNavAutoHide: false,
				slidesSpacing:0,
				loop: true,
				transitionType: 'fade',
				transitionSpeed: '400',
				autoPlay: {
    				// autoplay options go gere
    				enabled: true,
    				pauseOnHover: false,
    				delay: 3000
    			}
			});
			jQuery('footer input, footer textarea').focusin(function(){
				jQuery(this).parent('div').prev('label').fadeOut('fast');
			});
			jQuery('footer input, footer textarea').focusout(function(){
				if (jQuery(this).val() == ''){
					jQuery(this).parent('div').prev('label').fadeIn('fast');
				}
			});
			jQuery('#side li.dropdown a').click(function(){
				jQuery(this).next('ul').slideToggle();
			});
			$.getScript('http://connect.facebook.net/en_US/all.js#xfbml=1&appId=131635040234309', function() {FB.init({status: true, cookie: true, xfbml:true});});
		})
	})(jQuery);
},500);