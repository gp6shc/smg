(function($) { // Functions go before onReady
	function dev() {
		if ( window.location.origin.search('dev') > 0 ) return true;
		else return false;
	}
	function exists ( item ) {
		if ( jQuery(item).length ) return true; else return false;
	}
	function load_plugin_resources() {
		var sources = ['scripts','styles'];
		for( var source in sources ) {
			var items = '';
			switch(sources[source]){
				case "scripts":
					items = 'script[type="text/javascript"]';
					find = 'src';
					break;
				case "styles":
					items = 'link[rel="stylesheet"]';
					find = 'href'
					break;
			}
			$(items).each(function(){
			    var item = this;
				if ( item[find] ) {
					var src = item[find].toLowerCase();
					if ( src.search('dropbox') > 0 ) {
						var path = src.split('/plugins/'),
							url = window.location.origin+'/wp-content/plugins/'+path[2];
						if ( sources[source] == 'scripts' ) $.getScript(url);
						else $('head').append('<link rel="stylesheet" href="'+url+'" type="text/css" />');
					};
				};
			})
		}
	}
	$(function() { // onReady code goes in here:
		if ( exists('input[filter=\"time_field\"]') ) $('input[filter=\"time_field\"]').ptTimeSelect();
		if ( exists('input[filter=\"date_field\"]') ) $('input[filter=\"date_field\"]').simpleDatepicker();
		if ( exists('.users_page_roles') && window.location.search.search("action=edit") > 0 ) {
			$('.form-table').find('tr:nth-child(2n)').find('th').append('<br><br>[ <a href="#" class="selectAll">Select All</a> | <a href="#" class="unselectAll">Unselect All</a> ]');
			$('.selectAll').live('click',function(e) {
				e.preventDefault;
				var checkboxes = $('input[type="checkbox"]');
				checkboxes.each(function() { $(this).attr('checked','checked'); })
				return false;
			})
			$('.unselectAll').live('click',function(e) {
				e.preventDefault;
				var checkboxes = $('input[type="checkbox"]');
				checkboxes.each(function() { $(this).attr('checked',false); })
				return false;
			})
		}
		if ( exists('.add_list_item')) {
			$('.add_list_item').click(function(e){ // Allows you to add more items to a custom field list.
				e.preventDefault();
				var item = $(this).siblings('input').last(),
					count = $(this).siblings('input').length,
					clone = item.clone(),
					id = $(this).attr('id'),
					name = $(this).attr('name');
				clone.attr('id',id+"_"+count);
				clone.attr('name',name+"["+count+"]");
				clone.attr('value','');
				item.after(clone);
				return false;
			})
		};
		if ( dev() ) load_plugin_resources();
	})
})(jQuery);