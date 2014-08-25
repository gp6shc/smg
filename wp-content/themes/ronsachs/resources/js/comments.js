$(function(){
	$('.respond_link').click(function(){
		$(this).next('div').find('div#respond').slideToggle();
		if( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$(this).html('Click to Leave Reply');
		} else {
			$(this).addClass('active');
			$(this).html('Close Reply');
		}
		return false;
	});
});