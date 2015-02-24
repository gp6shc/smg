<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br /></div>
    <h2><?php echo $vqzb_page_title; ?></h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : '' ); ?>

    <form id="result_content_form" method="post" action="<?php echo $vqzb_form_action; ?>">

        <table class="widefat">

            <?php if (!VQzBuilder_ResultContentModel::getInstance()->default_exists($quiz_id) OR (isset($content) && $content['is_default'])): ?>
                <!-- maybe default? -->
                <label for="is_default">
                    <input type="checkbox" name="is_default" id="is_default" <?php echo vqzb_set_checkbox('is_default', isset($content) ? $content['is_default'] : FALSE); ?> />
                    Is Default?
                </label>
            <?php endif; ?>

            <!-- answer type/points -->
            <?php if (!empty($abc_type_answers)): ?>
                <tr class="answer_val">
                    <td><label>For*:</label></td>
                    <td>
                        <select name="abc_type_answer_id">
                            <?php foreach ($abc_type_answers as $abc_type_answer): ?>
                                <option value="<?php echo $abc_type_answer['id']; ?>" <?php echo vqzb_set_select('abc_type_answer_id', $abc_type_answer['id'], isset($content) ? $content['abc_type_answer_id'] : FALSE); ?>><?php echo $abc_type_answer['answer']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php else: ?>
                <tr class="answer_val">
                    <td><label>From point*:</label></td>
                    <td><input type="text" name="points_from" value="<?php echo vqzb_set_value('points_from', isset($content) ? $content['points_from'] : FALSE); ?>"/></td>
                </tr>
                <tr class="answer_val">
                    <td><label>To point*:</label></td>
                    <td><input type="text" name="points_to" value="<?php echo vqzb_set_value('points_to', isset($content) ? $content['points_to'] : FALSE); ?>"/></td>
                </tr>
            <?php endif; ?>
                
            <tr>
                <td valign="top">
                    Content:
                    <br />
                    <span class="description">You can use the next tokens:<br /> <?php echo VQZB_RESULT_VALUE_PLHDR; ?></span>
                </td>
                <td>
                  <!--  <textarea style="width:800px; height: 500px" id="content" name="text"><?php // echo vqzb_set_value('text', isset($content) ? $content['text'] : FALSE); ?></textarea>  -->
                    <?php wp_editor( isset($content) ? $content['text'] : FALSE, "text", array('wpautop' => true) ); ?>
                    <p>*Unfortunately we can't currently support shortcodes - all other content will work fine, though.</p>
                </td>
            </tr>
        </table>
        <p class="submit"><input type="submit" class="button-primary" value="Save"  /></p>
    </form>

    <!-- back links -->
    <p><a class="back_link" href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id); ?>">Back to Edit Results Page</a></p>
</div>
<?php vqzb_include_admin_footer(); ?>