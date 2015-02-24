var max_answer_num = 0;
jQuery(document).ready(function(){
    
    //get max answer number if there are any of them on the page
    max_answer_num = jQuery(".answers-grid tbody").children().length;
    if (1==1){
        //set answers sort order
        var new_order = "";
        for (var i = 0; i < max_answer_num; i++) {
            new_order += "row_" + i +" ";
        }
        jQuery("#answers_sort_order").val(new_order);
    }
    
    // form validation
    jQuery("#question_form").validate({
        errorElement: "span",
        rules: {
            question : {required: true}
        }
        
    });
    
    dragndrop_answers();
    
    // tiny_mce initialization
   // tinyMCE.init({
   //     mode : "exact",
   //     elements : "content",
   //     theme : "advanced",
   //     plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
   //      // Theme options
   //     theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,indent,blockquote,|,formatselect,fontselect,fontsizeselect",
   //     theme_advanced_buttons2 : "undo,redo,|,link,unlink,anchor,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,styleprops,cite,abbr,acronym,del,ins,|,visualchars,nonbreaking,blockquote,insertfile,insertimage",
   //     theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,image,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
   //     theme_advanced_toolbar_location : "top",
   //     theme_advanced_toolbar_align : "left",
   //     theme_advanced_statusbar_location : "bottom",
   //     theme_advanced_resizing : true,

        // Skin options
   //     skin : "o2k7",
   //     skin_variant : "silver"
   // });
    
});

function delete_answer(obj){
    if (confirm ("You are about to delete this answer \n  \'Cancel\' to stop, \'OK\' to delete.")){
        jQuery(obj).closest(".answer").remove();
    }
    return false;
}

function add_answer(quiz_type){
    if (jQuery("#no_answers_found").length) {
        jQuery("#no_answers_found").remove();
    }
    add_html  = '<tr id="row_';
    add_html += max_answer_num;
    add_html += '" valign="top" class="answer" style="cursor: move; "><td class="drag_handle"></td><td><input style="width:400px" name="answers[';
    add_html += max_answer_num;
    add_html += '][answer]" type="text" value="" class="regular-text answer_text required" /></td><td>';
    if(quiz_type == 'abc'){
        add_html += 'Type';
    }
    else{
        add_html += 'Value';
    }
    add_html += '</td><td>';
    if(quiz_type == 'abc'){
        add_html += '<select style="width:150px" name="answers[';
        add_html += max_answer_num;
        add_html += '][abc_type_answer_id]" class="regular-text required digits">';
        add_html += abc_type_answer_options;
        add_html += '</select>';
    }
    else{
        add_html += '<input style="width:150px" name="answers[';
        add_html += max_answer_num;
        add_html += '][value]" type="text" value="" class="regular-text required digits" />';
    }
    add_html += '</td>';
    add_html += '<td><a class="submitdelete" href="" onclick="return delete_answer(this);">Delete</a></td></tr>';
    
    //add row into table
    jQuery(".answers-grid").append(add_html);
    
    //add new answer number to answers sort order
    old_sort_order = jQuery("#answers_sort_order").val();
    jQuery("#answers_sort_order").val(old_sort_order + "row_" + max_answer_num + " ");
    dragndrop_answers();
    max_answer_num ++;
    return false;
}

function dragndrop_answers(){
    //drag & drop answers
    jQuery(".answers-grid").tableDnD({
        onDragClass: "drag_row",
        onDrop: function(table, row){
            var rows = table.tBodies[0].rows;
            var new_order = "";
            for (var i=0; i<rows.length; i++) {
	new_order += rows[i].id + " ";
            }
            jQuery("#answers_sort_order").val(new_order);
        }
    });
}