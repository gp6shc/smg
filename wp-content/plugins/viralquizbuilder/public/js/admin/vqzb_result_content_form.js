jQuery(document).ready(function(){
    
    // form validation
    jQuery("#result_content_form").validate({
        errorElement: "span",
        rules : {
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
    
    // tiny_mce initialization
    tinyMCE.init({
        mode : "exact",
        elements : "content",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
         // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,indent,blockquote,|,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "undo,redo,|,link,unlink,anchor,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,styleprops,cite,abbr,acronym,del,ins,|,visualchars,nonbreaking,blockquote,insertfile,insertimage",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,image,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver"
    });
    
});