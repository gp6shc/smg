jQuery(document).ready(function(){
    
    ifEnableOptinSettings();
    
    // enable the needed optin system settings
    jQuery("input[name='optin_system_id']").change(function(){
        ifEnableOptinSettings();
    });
})

function ifEnableOptinSettings(){
    // first disable all
    disableAllOptinSett();
    
    // then enable the needed one
    switch(jQuery("input[name='optin_system_id']:checked").val()){
        case '1':
            jQuery("#aweber").show();
            jQuery("#aweber :input").removeAttr("disabled");
            break;
        case '2':
            jQuery("#icontact").show();
            jQuery("#icontact :input").removeAttr("disabled");
            break;
        case '3':
            jQuery("#mailchimp").show();
            jQuery("#mailchimp :input").removeAttr("disabled");
            break;
        default:
            jQuery("#no_email_system").show();
            jQuery("#no_email_system :input").removeAttr("disabled");
            break;
    }
    jQuery("#optin-forms-"+jQuery("input[name='optin_system_id']:checked").val()).show();
}

function disableAllOptinSett()
{
    jQuery(".email_system_wrap").hide();
    jQuery(".email_system_wrap :input").attr('disabled', 'disabled');
   // jQuery(".optin-forms").hide();
}