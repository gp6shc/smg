jQuery(document).ready(function(){
    disable_radio_background();
    
    // then check if any of them checked & set it abled
    jQuery("[name=background_selected]:checked").closest("tr").find(".select_background").removeAttr('disabled');
    
    // set background ields abled/disabled depends on radio button change
    jQuery("[name=background_selected]").change(function(){
        disable_radio_background();
        jQuery(this).closest("tr").find(".select_background").removeAttr('disabled');
    });
    
    // initialize colorpicker
    set_colorpicker('text_color');
    set_colorpicker('background_color');
    
    // form validation
    // add validation method
    jQuery.validator.addMethod(
        'regexp',
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Not valid color: 6 a-z, 0-9 symbols are required."
        );
    //validate
    jQuery("#result_badge_form").validate({
        errorElement: "span",
        rules : {
            text_color : {
	regexp : '^[a-fA-F0-9]{6}$'
            },
            background_color : {
	regexp : '^[a-fA-F0-9]{6}$'
            },
            background_image : {
	accept: "jpg|jpeg|gif|png"
            },
            points_from : {
	required : true,
	digits: true
            },
            points_to: {
	required : true,
	digits: true
            },
            abc_type_answer_id: {
	required : true
            }
        }
    });
    vqzb_ajax_form();
});
function disable_radio_background(){
    jQuery(".select_background").attr('disabled', 'disabled');
}

function set_colorpicker(field_id){
    jQuery('#' + field_id).ColorPicker({
        livePreview: false,
        onChange: function(hsb, hex, rgb) {
            jQuery('#' + field_id).val(hex);
        },
        onBeforeShow: function () {
            jQuery(this).ColorPickerSetColor(this.value);
        }
    })
    .bind('keyup', function(){
        jQuery(this).ColorPickerSetColor(this.value);
    });
}

function vqzb_ajax_form()
{
    // jquery form initializing
    var ajax_options = {
        url: ajaxurl,
        dataType:  'json',
        data: {
            action : 'vqzb_generate_example'
        },
        success: function(data){
            //if IE7 browser is used then image previewing is not available
            if (document.all && !document.querySelector) {
	jQuery('#image_example').text("Image previewing is not available in your browser");
            }else{
	if (data.result == 'success'){
	    jQuery('#image_example img').attr('src', 'data:image/'+ data.mime_type +';base64,' + data.base_64).show();
	}else if (data == -1){
	    alert("Too large file size. Not more then 1Mb is allowed");
	}else{
	    alert(data.msg);
	}
            }
        },
        error: function(){
            alert("Generating preview error");
        }
    };
    
    jQuery("#result_badge_form").ajaxSubmit(ajax_options);
    return false;
}