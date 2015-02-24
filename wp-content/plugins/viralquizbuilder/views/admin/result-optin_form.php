<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2><?php echo $vqzb_page_title; ?></h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <a
        href="http://fast.wistia.net/embed/iframe/g4866f8zo3?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
        class="wistia-popover[height=450,playerColor=278de6,width=800]">
        <div class="help_icon"></div>
        Help with this
    </a>

    <form id="result_optin_form" method="post" action="<?php echo $vqzb_form_action; ?>">

        <!-- add optin form settings -->
        <h3>When should we display this opt-in form?</h3>
        <table class="widefat">
            <tbody>
            <tr>
                <td colspan="2">
                    <?php if (!VQzBuilder_ResultOptInFormModel::getInstance()->default_form_exist($quiz_id) OR (isset($optin_form) && $optin_form['is_default'] == 1)): ?>
                        <!-- maybe default? -->
                        <label for="is_default">
                            <input type="checkbox" name="is_default"
                                   id="is_default" <?php echo vqzb_set_checkbox('is_default', isset($optin_form) ? $optin_form['is_default'] : FALSE); ?> />
                            This opt-in box should be displayed by default
                        </label>
                    <?php endif; ?>
                </td>
            </tr>
            <!-- answer type/points -->
            <?php if (!empty($abc_type_answers)): ?>
                <tr class="answer_val">
                    <td width="150"><label>For*:</label></td>
                    <td>
                        <select name="abc_type_answer_id">
                            <?php foreach ($abc_type_answers as $abc_type_answer): ?>
                                <option
                                    value="<?php echo $abc_type_answer['id']; ?>" <?php echo vqzb_set_select('abc_type_answer_id', $abc_type_answer['id'], isset($optin_form) ? $optin_form['abc_type_answer_id'] : FALSE); ?>><?php echo $abc_type_answer['answer']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php else: ?>
                <tr class="answer_val">
                    <td width="150"><label>From point*:</label></td>
                    <td><input type="text" name="points_from"
                               value="<?php echo vqzb_set_value('points_from', isset($optin_form) ? $optin_form['points_from'] : FALSE); ?>"/>
                    </td>
                </tr>
                <tr class="answer_val">
                    <td><label>To point*:</label></td>
                    <td><input type="text" name="points_to"
                               value="<?php echo vqzb_set_value('points_to', isset($optin_form) ? $optin_form['points_to'] : FALSE); ?>"/>
                    </td>
                </tr>
            <?php endif; ?>

            <!-- contacts list -->
            <!-- removed in favour of custom html implementation -->
            <?php /*
            <tr>
                <td><label>Contacts List*:</label>
                <td>
                    <?php if (!$email_lists): ?>
                        <span class="error">Getting contact lists failed. Check your Email System credentials.</span>

                    <?php else: ?>
                        <select name="email_list">
                            <?php foreach ($email_lists as $email_list): ?>

                                <?php if (is_object($email_list)): ?>
                                    <?php $list_id = property_exists($email_list, 'listId') ? $email_list->listId : $email_list->id; ?>
                                    <option value="<?php echo $list_id; ?>" <?php echo vqzb_set_select('email_list', $list_id, isset($optin_form) ? $optin_form['email_list'] : FALSE); ?>><?php echo $email_list->name; ?></option>

                                <?php else: ?>
                                    <option value="<?php echo $email_list['id']; ?>" <?php echo vqzb_set_select('email_list', $email_list['id'], isset($optin_form) ? $optin_form['email_list'] : FALSE); ?>><?php echo $email_list['name']; ?></option>

                                <?php endif; ?>

                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </td>
            </tr>
            */
            ?>
            </tbody>
        </table>
        <br/>

        <table>
            <tbody>
            <!-- content above the form -->
            <tr>
                <td>
                    <h3>Content to display above the opt-in form</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <?php /* <textarea style="width:800px; height: 500px" id="content"
                              name="content"><?php echo vqzb_set_value('content', isset($optin_form) ? $optin_form['content'] : FALSE); ?></textarea> */
                    ?>
                    <?php wp_editor( isset($optin_form) ? $optin_form['content'] : FALSE, "content" ); ?>
                </td>
            </tr>
            </tbody>
        </table>
        <br/>

        <h3>Opt-In Form Configuration</h3>
        <table class="widefat">
            <tbody>
            <!-- form instructions -->
            <!-- select what info is needed from user - email/email&name -->
            <tr>
                <td><label>Fields Required:</label></td>
                <td>
                    <select name="need_contact_name">
                        <?php foreach (array(0 => 'Email', 1 => 'Email & Name') as $key => $val): ?>
                            <option
                                value="<?php echo $key; ?>" <?php echo vqzb_set_select('need_contact_name', $key, isset($optin_form) ? $optin_form['need_contact_name'] : 1); ?>><?php echo $val; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Call to action:
                </td>
                <td>
                    <input type="text" id="instructions" name="instructions"
                           value="<?php echo vqzb_set_value('instructions', isset($optin_form) ? $optin_form['instructions'] : FALSE); ?>"/>
                </td>
            </tr>

            <!-- submit button text -->
            <tr>
                <td><label>Submit button text:</label></td>
                <td><input type="text" name="submit_btn_text"
                           value="<?php echo vqzb_set_value('submit_btn_text', isset($optin_form) ? $optin_form['submit_btn_text'] : FALSE); ?>"/>
                </td>
            </tr>

            <!-- custom signup code -->
            <tr>
                <td><label>Your Autoresponder Code:</label></td>
                <td><textarea name="custom_code"
                              style="width:100%; height:200px;"><?php echo isset($optin_form) ? $optin_form['custom_code'] : FALSE; ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <p class="submit"><input type="submit" class="button-primary" value="Save"/></p>

    </form>

    <!-- back links -->
    <p><a class="back_link"
          href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id); ?>">Back
            to Edit Results Page</a></p>
</div>
<?php vqzb_include_admin_footer(); ?>