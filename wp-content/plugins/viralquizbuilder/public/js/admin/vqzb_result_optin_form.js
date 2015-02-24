jQuery(document).ready(function(){
    
    // form validation
    jQuery("#result_optin_form").validate({
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
	required : true,
	digits: true
            },
            email_list: {
	required : true
            }
        }
    });
    
    // tiny_mce initialization
    tinyMCE.init({
        mode : "exact",
        elements : "content"
    });
    
})
