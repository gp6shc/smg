$(document).ready(function() {
	
	if ($('.home').length) {
		$("#slideshow").owlCarousel({
			navigation: true,
			navigationText: true,
			singleItem: true,
			autoPlay: 5000,
			transitionStyle: "fadeUp"
		});
	
		$("#new-work-slider").owlCarousel({
			navigation: true,
			navigationText: false,
			items: 3,
			responsive: false,
			autoPlay: 6000,
			scrollPerPage: true
		});
		
		$("#logos").owlCarousel({
			navigation: true,
			navigationText: true,
			singleItem: true,
			autoPlay: false
		});
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