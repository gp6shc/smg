<div class="wrap vqb_wrap">

<div id="vqzb-icon" class="icon32"><br/></div>
<h2>Result page</h2>

<?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
<?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

<a href="http://fast.wistia.net/embed/iframe/s94ko0kkdd?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
   class="wistia-popover[height=450,playerColor=278de6,width=800]">
    <div class="help_icon"></div></a><h3>Result Page Options</h3>

<!-- result content -->
<div id="result_content" class="vqb_section">

    <h3 style="margin-top:40px; font-style:italic">Result Page Content <a class="add-new-h2"
                               href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_rescontent&quiz_id=' . $quiz_id . '&noheader=true'); ?>">Add
            result content</a></h3>
    <?php if (isset($result_contents) && $result_contents != null): ?>
        <table class="widefat" style="width: 400px">
            <tbody>
            <?php foreach ($result_contents as $result_content): ?>
                <tr class="alternate">
                    <?php if ($result_content['is_default']): ?>
                        <td>Default result content</td>
                    <?php else: ?>
                        <td>Result content for
                            <code><?php echo $result_content['abc_type_answer_id'] == NULL ? $result_content['points_from'] . '-' . $result_content['points_to'] : $result_content['abc_type_answer_name']; ?></code>
                        </td>
                    <?php endif; ?>
                    <td><a class="edit-btn"
                           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_rescontent&id=' . $result_content['id']); ?>">Edit</a>
                    </td>
                    <td><a class="delete-btn"
                           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_rescontent&id=' . $result_content['id']) . '&noheader=true'; ?>"
                           onclick="if ( confirm( 'You are about to delete this result content \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- no result page content set yet -->
        <table class="widefat" style="width: 400px">
            <tbody>
            <tr>
                <td>You haven't added any content for your results page yet.</td>
            </tr>
            </tbody>
        </table>
    <?php endif; ?>

</div>
<p></p>

<!-- result badge -->
<div id="result_badge" class="vqb_section">

    <h3 style="font-style:italic">Result Page Badge & Viral Sharing <a class="add-new-h2"
                                             href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_resbadge&quiz_id=' . $quiz_id . '&noheader=true'); ?>">Add
            result badge</a></h3>
    <table class="widefat" style="width: 400px">
        <?php if (isset($result_badges) && $result_badges != null): ?>
            <tbody>
            <?php foreach ($result_badges as $result_badge): ?>

                <tr>
                    <?php if ($result_badge['is_default']): ?>
                        <td>Default result badge</td>
                    <?php else: ?>
                        <td>Result badge for
                            <code><?php echo $result_badge['abc_type_answer_id'] == NULL ? $result_badge['points_from'] . '-' . $result_badge['points_to'] : $result_badge['abc_type_answer_name']; ?></code>
                        </td>
                    <?php endif; ?>
                    <td><a class="edit-btn"
                           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_resbadge&id=' . $result_badge['id']); ?>">Edit</a>
                    </td>
                    <td><a class="delete-btn"
                           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_resbadge&id=' . $result_badge['id']) . '&noheader=true'; ?>"
                           onclick="if ( confirm( 'You are about to delete this result badge \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        <?php else: ?>
            <tbody>
            <tr>
                <td>
                    You haven't added any result badges yet.
                </td>
            </tr>
            </tbody>
        <?php endif; ?>
    </table>

</div>
<p></p>


<!-- result opt-in gate -->
<div id="result_optin" class="vqb_section">
    <h3 style="font-style:italic">Opt-in Gate Settings
        <a class="add-new-h2"
           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_optin_form&quiz_id='.$quiz_id.'&optin_sett=' . $optin_setting['id'] . '&noheader=true'); ?>">
            Add Opt-in form
        </a>
    </h3>

    <form id="result_optin_form" method="post"
          action="?page=vqzb_quiz_grid&action=result_page&quiz_id=<?php echo $quiz_id; ?>&noheader=true">

        <!-- the all created optin forms for quiz -->

        <table id="optin-forms<?php echo isset($optin_setting) ? '-' . $optin_setting['optin_system_id'] : ''; ?>"
               class="form-table optin-forms" style="width: 400px">


            <table class="widefat" style="width:400px;">
                <?php if (isset($optin_forms) && $optin_forms != null) : ?>
                    <tbody>

                    <?php foreach ($optin_forms as $optin_form): ?>

                        <?php if ($optin_form['is_default'] == 1): ?>

                            <tr>

                                <!-- edit default result optin form link -->

                                <td>Default result opt-in form</td>

                                <td><a class="edit-btn"
                                       href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_optin_form&id=' . $optin_form['id']); ?>">Edit</a>
                                </td>

                                <td><a class="delete-btn"
                                       href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_optin_form&id=' . $optin_form['id']) . '&noheader=true'; ?>"
                                       onclick="if ( confirm( 'You are about to delete this opt-in form \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a>
                                </td>

                            </tr>

                        <?php else: ?>

                            <!-- edit others result optin forms links -->

                            <tr>

                                <td>Result opt-in form for
                                    <code><?php echo $optin_form['abc_type_answer_id'] == NULL ? $optin_form['points_from'] . '-' . $optin_form['points_to'] : $optin_form['abc_type_answer_name']; ?></code>
                                </td>

                                <td><a class="edit-btn"
                                       href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_optin_form&id=' . $optin_form['id']); ?>">Edit</a>
                                </td>

                                <td><a class="delete-btn"
                                       href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_optin_form&id=' . $optin_form['id']) . '&noheader=true'; ?>"
                                       onclick="if ( confirm( 'You are about to delete this opt-in form \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a>
                                </td>

                            </tr>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    </tbody>
                <?php else: ?>
                    <tbody>
                    <tr>
                        <td>
                            You haven't added any opt-in gate settings yet.
                        </td>
                    </tr>
                    </tbody>
                <?php endif; ?>
            </table>


        </table>


</div>


<p><input type="submit" class="button-primary" value="Save"/></p>

</form>


<?php /* <div id="result_optin">

<h3>Result Page Opt-in Gate Settings


    <!-- add form button -->

    <?php if (NULL !== $optin_setting): ?>

        <a class="add-new-h2"
           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_optin_form&optin_sett=' . $optin_setting['id'] . '&noheader=true'); ?>">

            Add Opt-in form

        </a>

    <?php endif; ?>

</h3>



<form id="result_optin_form" method="post"
      action="?page=vqzb_quiz_grid&action=result_page&quiz_id=<?php echo $quiz_id; ?>&noheader=true">


    <!-- choose optin system radios -->

    <div id="choose_optin_system" style="margin:25px 0">

        <p class="description">Choose the Optin Gate System</p>

        <?php foreach ($optin_systems as $optin_system): ?>

            <label class="horizontal_radio">

                <input type="radio" name="optin_system_id"
                       value="<?php echo $optin_system['id']; ?>" <?php echo vqzb_set_radio('optin_system_id', $optin_system['id'], isset($optin_setting) ? $optin_setting['optin_system_id'] : ''); ?>/>

                <?php echo $optin_system['name']; ?>

            </label>

        <?php endforeach; ?>

        <label>

            <input type="radio" name="optin_system_id"
                   value="" <?php echo vqzb_set_radio('optin_system_id', '', isset($optin_setting) ? $optin_setting['optin_system_id'] : ''); ?>/>

            No Email System

        </label>

    </div>


    <!-- the aweber system options -->

    <div id="aweber" class="email_system_wrap">

        <?php if (isset($optin_setting) && $optin_setting['optin_system_id'] == 1): ?>

            <p class="description"><b>The plugin is authorized in your Aweber account</b></p>

        <?php endif; ?>

        <p class="description">

            In order to allow the plugin to access your Aweber information, you need to grant it access. <br/>

            Once you have logged in and granted Aweber access, Aweber will give you an authorization token. <br/>

            Copy the authorization token into the field below and click the "Save" button. <br/>

        </p>

        <p>

            <a onclick="window.open( this.href, '', 'resizable=yes,location=no,width=750,height=525,top=0,left=0' ); return false;"
               href="https://auth.aweber.com/1.0/oauth/authorize_app/<?php echo VQZB_AWEBER_APP_ID; ?>"
               class="button-secondary">Click Here to Get Your Authorization Token</a>

        </p>

        <label>

            Authorization Token*:

            <input type="text" name="aweber_auth_token" id="aweber_auth_token"
                   value="<?php echo vqzb_set_value('aweber_auth_token'); ?>" style="width:500px"/>

        </label>


    </div>


    <!-- the mailchimp system options -->

    <div id="mailchimp" class="email_system_wrap">

        <p class="description">

            In order to allow the plugin to access your MailChimp information, you need to grant it access. <br/>

            Please enter your MailChimp API Key below and click the "Save" button. <br/>

            If you don't have MailChimp API Key press the "Click Here to Get Api Key" button. <br/>

        </p>

        <p>

            <a onclick="window.open( this.href, '', 'resizable=yes,location=no,width=750,height=525,top=0,left=0' ); return false;"
               href="https://admin.mailchimp.com/account/api-key-popup" class="button-secondary">Click Here to Get Api
                Key</a>

        </p>


        <label>

            Api Key*:

            <input type="text" name="mailchimp_api_key" id="mailchimp_api_key"
                   value="<?php echo vqzb_set_value('mailchimp_api_key', isset($optin_setting) && ($optin_setting['optin_system_id'] == 3) ? $optin_setting['credentials'] : FALSE); ?>"
                   style="width:500px"/>

        </label>


    </div>


    <!-- the iContact system options -->

    <div id="icontact" class="email_system_wrap">

        <p class="description">

            In order to allow the plugin to access your iContact information, you need to grant it access. <br/>

            Please click the "Authorize APP" button, enter the following Application Id and create Password: <br/>

        </p>

        <code><?php echo VQZB_ICONTACT_APP_ID; ?></code><br/>

        <p>

            <a onclick="window.open( this.href, '', 'resizable=yes,location=no,width=750,height=525,top=0,left=0' ); return false;"
               href="https://app.icontact.com/icp/core/externallogin" class="button-secondary">Click Here to Authorize
                the Application</a>

        </p>


        <table>

            <tr>

                <td><label>Your iContact Username*:</label></td>

                <td>

                    <?php if (isset($optin_setting['optin_system_id']) && $optin_setting['optin_system_id'] == 2) list($icontact_username, $icontact_account_id, $icontact_folder_id) = explode('|', $optin_setting['credentials']); ?>

                    <input type="text" name="icontact_username" id="icontact_username"
                           value="<?php echo vqzb_set_value('icontact_username', isset($optin_setting) && ($optin_setting['optin_system_id'] == 2) ? $icontact_username : FALSE); ?>"
                           style="width:500px"/>

                </td>

            </tr>

            <tr>

                <td><label>Api Password*:</label></td>

                <td>

                    <input type="password" name="icontact_password" id="icontact_password"
                           value="<?php echo vqzb_set_value('icontact_password', isset($optin_setting) && ($optin_setting['optin_system_id'] == 2) ? $optin_setting['icontact_password'] : FALSE); ?>"
                           style="width:500px"/>

                </td>

            </tr>

        </table>


    </div>


    <p>

        <input type="submit" class="button-primary" value="Save"/>

    </p>


</form>

*/
?>


</div>


<!-- back links -->
<p><a class="back_link"
      href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz_id); ?>">Back to
        Edit Quiz Page</a></p>

</div>
<?php vqzb_include_admin_footer(); ?>