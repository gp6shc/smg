jQuery(document).ready(function(){
// enable/disable answer type/points accordint to id_default value
    ifshowAnswerFields();
    
    jQuery("#is_default").change(function(){
        ifshowAnswerFields();
    });
})

function ifshowAnswerFields()
{
    if(jQuery("#is_default").prop("checked")){
        jQuery(".answer_val").hide();
        jQuery(".answer_val :input").attr('disabled', 'disabled');
    }
    else{
        jQuery(".answer_val").show();
        jQuery(".answer_val :input").removeAttr('disabled');
    }
}