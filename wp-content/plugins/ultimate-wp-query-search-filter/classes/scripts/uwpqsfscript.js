jQuery(document).ready(function($) {
	
		$('body').on('click','.usearchbtn', function(e) {
			process_data($(this));
			return false;
		});
	
		$('body').on('click','.upagievent', function(e) {
			var pagenumber =  $(this).attr('id');
			var formid = $('#curuform').val();
			upagi_ajax(pagenumber, formid);
			return false;
		});

		$('body').on('keypress','.uwpqsftext',function(e) {
		  if(e.keyCode == 13){
		    e.preventDefault();
		    this.blur();
		    process_data($(this));
		    
		  }
		});
		
		window.process_data = function ($obj) {
			
			var ajaxURL = "/smg/wp-admin/admin-ajax.php";
			var ajxdiv = $("#works");
			var res = $('.loader-contain');
			var getdata = $obj.closest("form").serialize();
			var pagenum = '1';
						
			jQuery.ajax({
				type: 'POST',	 
				url: ajaxURL,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					ajxdiv.addClass("opacity-0");
					res.removeClass("scale-0");				 
				},
				success: function(html) {
					setTimeout(function() {
						res.addClass("scale-0");
						setTimeout( function() {
							ajxdiv.html(html);
							ajxdiv.removeClass("opacity-0");
						}, 250);
						
					}, 750);
				}
			});
		};	
		
		window.upagi_ajax = function (pagenum, formid) {
			
			var ajaxURL = "/smg/wp-admin/admin-ajax.php";
			var ajxdiv = $("#works");
			var res = $('.loader-contain');
			var getdata = $(''+formid+'').serialize();
		
			jQuery.ajax({
				type: 'POST',	 
				url: ajaxURL,
				data: ({action : 'uwpqsf_ajax',getdata:getdata, pagenum:pagenum }),
				beforeSend:function() {
					ajxdiv.addClass("opacity-0");
					res.removeClass("scale-0");				 
					res.addClass("bottom-0");				 
				},
					
				success:function(html) {
					res.addClass("scale-0");
					
					$('html, body').animate({
						scrollTop: ($('#works').offset().top - 200)
					}, 700);
					
					setTimeout(function() {
						res.removeClass("bottom-0");
						setTimeout( function() {
							ajxdiv.html(html);
							ajxdiv.removeClass("opacity-0");
						}, 150);
					}, 710);
				}
			});
		};
		
	$('body').on('click', '.chktaxoall,.chkcmfall',function () {
		$(this).closest('.togglecheck').find('input:checkbox').prop('checked', this.checked);	
	});
	
	
	$('form[id*="uwpqsffrom_"]').change(function(){ process_data($(this)); });

	process_data($('form[id*="uwpqsffrom_"]'));

});//end of script