<?php if ($optin_form['content']): ?>
    <div class="opt-in-content"><?php echo wpautop(do_shortcode($optin_form['content'])); ?></div><?php endif; ?>
<div style="display:none;" id="<?php echo "vqb_custom_code" . $optin_form['id']; ?>">
    <?php echo $optin_form['custom_code']; ?>
</div>
<form action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" id="vqzb_optin_form">
    <!-- instructions -->
    <div><?php echo $optin_form['instructions']; ?></div>

    <?php if ($optin_form['need_contact_name']): ?>
        <input placeholder="Name" name="name" class="required vqb_form_name<?php echo $optin_form['id']; ?>"
               type="text">
    <?php endif; ?>

    <div><input placeholder="Email" name="email" class="required email vqb_form_email<?php echo $optin_form['id']; ?>"
                type="text"></div>

    <input type="submit" id="vqb_form_submit<?php echo $optin_form['id']; ?>"
           value="<?php echo $optin_form['submit_btn_text'] != '' ? $optin_form['submit_btn_text'] : 'Get Results!'; ?>"
        />

</form>

<script type='text/javascript'>
    jQuery('input').placeholder();

    var overlay = new ItpOverlay("vqzb_wrapper");

    jQuery(document).ready(function () {

        // validate the opt-in form
        jQuery("#vqzb_optin_form").validate({
            errorElement: "div"
        });
        jQuery("#vqb_form_submit<?php echo $optin_form['id']; ?>").click(function (event) {
            event.preventDefault();
            vqzb_submit_optin();
        });

    })
    function vqzb_submit_optin() {

        jQuery.fn.exists = function () {
            return this.length > 0;
        }

        if (jQuery("#vqzb_optin_form").valid()) {
            <?php if($optin_form['custom_code'] && trim($optin_form['custom_code']!="")) { ?>
            // this is a custom code submission

            // find div that contains custom submit code
            vqb_custom_code = jQuery("#vqb_custom_code<?php echo $optin_form['id']; ?>");

            // bind custom_code autoresponder submit
            jQuery(vqb_custom_code).find("form").submit(function () {
                var formdata = jQuery(this).serialize();
                overlay.show();
                jQuery.ajax({
                    type: "POST",
                    url: jQuery(vqb_custom_code).find("form").attr("action"),
                    data: formdata,
                    async: false,
                });
                vqzb_thank_you_page();
                overlay.hide();
                return false;
            });

            <?php if ($optin_form['need_contact_name']) { ?>
            //name and email submit
            name = jQuery(".vqb_form_name<?php echo $optin_form['id']; ?>").val();
            email = jQuery(".vqb_form_email<?php echo $optin_form['id']; ?>").val();

            var findName = jQuery(vqb_custom_code).find("input[name*=name], input[name*=NAME], input[name*=Name]").not("input[type=hidden]").val(name);
            if (!(jQuery(findName).exists())) {
                jQuery(vqb_custom_code).find("input[type=text], input[type=email]").not("input[type=hidden]").first().val(name);
            }
            var findEmail = jQuery(vqb_custom_code).find("input[name*=email], input[name*=EMAIL], input[type=email], input[name=eMail]").not("input[type=hidden]").val(email);
            if (!(jQuery(findEmail).exists())) {
                jQuery(vqb_custom_code).find("input[type=text], input[type=email]").not("input[type=hidden]").last().val(email);
            }
            <?php } else { ?>
            //email only submit
            email = jQuery(".vqb_form_email<?php echo $optin_form['id']; ?>").val();
            jQuery(vqb_custom_code).find("input").not("input[type=hidden]").val(email);
            <?php
            } ?>

            // trigger submit to autoresponder
            vqb_submission = jQuery(vqb_custom_code).find("input[type=submit], button, input[name=submit]");
            if(jQuery(vqb_submission).exists()) {
                jQuery(vqb_submission).trigger('click');
            } else {
                vqzb_thank_you_page();
                console.log("can't find submission button");
            }
            <?php } else { ?>
            // else this is an API submission
            vqzb_thank_you_page();

            <?php } ?>
        }
    }

    function vqzb_thank_you_page() {
        var ajax_options = {
            //dataType:  'json',
            data: {
                action: 'vqzb_ajax',
                quiz_url: document.URL,
                save_optin_form: true,
                result_id: <?php echo $result_id; ?>,
                optin_form_id: <?php echo $optin_form['id']; ?>
            },
            beforeSend: function () {
                overlay.show();
            },
            success: function (data) {
                overlay.hide();
                jQuery("#vqzb_content").html(data);
            },
            error: function () {
                overlay.hide();
                jQuery("#vqzb_content").html("<p>Results processing error!<p>");
            }
        };
        jQuery("#vqzb_optin_form").ajaxSubmit(ajax_options);
    }
</script>