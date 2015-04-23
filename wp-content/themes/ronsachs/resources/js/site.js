(function($){ // Functions go before onReady
	$(function(){ // onReady code goes in here:
		$("#new-work-slider").royalSlider({
			controlNavEnabled: false,
			arrowsNavAutoHide: false,
			loop: true
		});
		$("#slideshow").royalSlider({
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
		$('footer input, footer textarea').focusin(function(){
			$(this).parent('div').prev('label').fadeOut('fast');
		});
		$('footer input, footer textarea').focusout(function(){
			if ($(this).val() == ''){
				$(this).parent('div').prev('label').fadeIn('fast');
			}
		});
		$('#side li.dropdown a').click(function(){
			$(this).next('ul').slideToggle();
		});
		$.getScript('http://connect.facebook.net/en_US/all.js#xfbml=1&appId=131635040234309', function() {FB.init({status: true, cookie: true, xfbml:true});});
	})
})();