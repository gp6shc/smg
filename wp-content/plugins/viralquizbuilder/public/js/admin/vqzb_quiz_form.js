jQuery(document).ready(function(){

    // form validation
    jQuery("#quiz_form").validate({
        errorElement: "span",
        rules : {
            name : {
	required : true
            },
            quiz_type_id: {required : true},
            custom_measurement_sing : {required : true},
            custom_measurement_pl : {required : true}
        }
    });
    
    //drag & drop questions
    jQuery(".questions-grid").tableDnD({
        onDragClass: "drag_row",
        onDrop: function(table, row){
            var rows = table.tBodies[0].rows;
            var new_order = "";
            for (var i=0; i<rows.length; i++) {
	new_order += rows[i].id+" ";
            }
            jQuery("#questions_sort_order").val(new_order);
        }
    });
    
    // show the measure/abc answers right after page is loaded
    if (jQuery("#quiz_type_id").val() == 1){
        showMeasure();
    }
    else{
        showAbcAnswer();
    }
    
    // set custom_measurement field disabled right after page is loaded if measurement value = ''
    if (jQuery("#measurement_id").val() != ''){
        hideCustomMeasurement();
    }
    
    // show fields accordint to selected qioz type
    jQuery("#quiz_type_id").change(function(){
        if (jQuery(this).val() == 1){
            showMeasure();
        }else{
            showAbcAnswer(); 
        }
    });
    
    // show/hide custom_measurement
    jQuery("#measurement_id").change(function(){
        if (jQuery(this).val() != ''){
            hideCustomMeasurement();
        }else{
            showCustomMeasurement(); 
        }
    });
});


function showMeasure()
{
    jQuery(".abc_type_answer").hide();
    jQuery(".abc_type_answer_field").attr('disabled', 'disabled');
    jQuery("#measure").show();
    jQuery("#measurement_id").removeAttr('disabled');
}

function showAbcAnswer()
{
    hideCustomMeasurement();
    jQuery("#measure").hide();
    jQuery("#measurement_id").attr('disabled', 'disabled');
    jQuery(".abc_type_answer").show();
    jQuery(".abc_type_answer_field").removeAttr('disabled');
}

function hideCustomMeasurement()
{
    jQuery(".custom_measurement").attr('disabled', 'disabled');
    jQuery(".custom_measurement_row").hide();
}

function showCustomMeasurement()
{
    jQuery(".custom_measurement").removeAttr('disabled');
    jQuery(".custom_measurement_row").show();
}

function addAbcAnswerRow()
{
    var content = '<tr valign="top" class="abc_type_answer"><td></td><td><input style="width:400px" name="abc_type_answers[]" type="text" class="regular-text required abc_type_answer_field" /><a class=\'submitdelete\' href="" onclick="return deleteAbcAnswer(this);">Delete</a></td></tr>';
    jQuery(".abc_type_answer").last().after(content);
    return false;
}

function deleteAbcAnswer(obj)
{
    if (confirm ("You are about to delete this answer variant \n  \'Cancel\' to stop, \'OK\' to delete.")){
	jQuery(obj).closest(".abc_type_answer").remove();
    }
    return false;
}