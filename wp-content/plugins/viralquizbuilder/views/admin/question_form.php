<script>
    var abc_type_answer_options = '<?php foreach ($abc_type_answers as $abc_type_answer):?><option value="<?php echo $abc_type_answer['id']; ?>"><?php echo addslashes($abc_type_answer['answer']); ?></option><?php endforeach;?>';
</script>
<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2><?php echo $vqzb_page_title; ?></h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <form method="post" action="<?php echo $vqzb_form_action; ?>" id="question_form">
        <table class="widefat">
            <tbody>
            <tr>
                <td>
                    <!-- quiz name -->
                    <p>Quiz:</p>
                </td>
                <td>
                    <code><?php echo esc_html($quiz['name']); ?></code>
                </td>
            </tr>
            <tr>
                <?php if ($quiz['quiz_type_id'] == 1): ?>
                    <td>
                        <p>Measurement:</p>
                    </td>
                    <td>
                        <code><?php echo $quiz['measurement_id'] == NULL ? esc_html($quiz['custom_measurement_sing']) : esc_html($quiz['measurement']); ?></code>
                    </td>
                <?php else: ?>
                    <td><p>Answer Variants for Type A/B/C Quiz:</p></td>
                    <td>
                        <?php foreach ($abc_type_answers as $abc_type_answer): ?>
                            <code><?php echo $abc_type_answer['answer']; ?></code>
                        <?php endforeach; ?>
                    </td>
                <?php endif; ?>
            </tr>
            <input id="answers_sort_order" type="hidden" name="answers_sort_order" value=""/>

            <tr>
                <td>
                    <!-- question -->
                    <p><label for="question">Question:</label></p></td>
                <td>

                    <p><input name="question" type="text" id="question"
                              value="<?php echo vqzb_set_value('question', isset($question) ? $question['question'] : FALSE); ?>"
                              class="regular-text required"/></td>
            </tr>
        </table>
        <p></p>

        <div style="margin-top: 40px"><h3>Answers<a href="" class="add-new-h2"
                                                    onclick="return add_answer('<?php echo $quiz['quiz_type_id'] == 1 ? 'points' : 'abc'; ?>')">Add
                    answer</a></h3></div>

        <!-- answers grid -->
        <table class="answers-grid widefat" style="width: 800px">

            <?php if (isset($answers) &&!empty($answers)): ?>
                <?php foreach ($answers as $key => $answer): ?>
                    <tr id="row_<?php echo $key; ?>" valign="top" class="answer">
                        <td class="drag_handle"></td>
                        <td>
                            <input style="width:400px" name="answers[<?php echo $key; ?>][answer]" type="text"
                                   value="<?php echo esc_html($answer['answer']) ?>"
                                   class="regular-text answer_text required"/>
                            <input type="hidden" name="answers[<?php echo $key; ?>][selected_qty]"
                                   value="<?php echo esc_html($answer['selected_qty']) ?>"/>
                        </td>
                        <?php if ($quiz['quiz_type_id'] == 1): ?>
                            <td>Value</td>
                            <td>
                                <input style="width:150px" name="answers[<?php echo $key; ?>][value]" type="text"
                                       value="<?php echo esc_html($answer['value']); ?>"
                                       class="regular-text required digits"/>
                            </td>
                        <?php else: ?>
                            <td>Type</td>
                            <td>
                                <select style="width:150px" name="answers[<?php echo $key; ?>][abc_type_answer_id]"
                                        class="regular-text required digits">
                                    <?php foreach ($abc_type_answers as $abc_type_answer): ?>
                                        <option
                                            value="<?php echo $abc_type_answer['id']; ?>" <?php echo $answer['abc_type_answer_id'] == $abc_type_answer['id'] ? 'selected' : ''; ?>><?php echo $abc_type_answer['answer']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        <?php endif; ?>
                        <td>
                            <a class='submitdelete' href="" onclick="return delete_answer(this);">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr valign="top" id="no_answers_found">
                    <td>You haven't added any answers yet.</td>
                </tr>
            <?php endif; ?>

        </table>

        <!-- question content -->
        <h3 style="margin-top:40px;">Question Content:</h3>
        <?php //<textarea style="width:800px; height: 500px" id="content" name="content"><?php echo vqzb_set_value('content', isset($question) ? $question['content'] : FALSE); </textarea> ?>
        <?php wp_editor(isset($question) ? $question['content'] : FALSE, "content", array('wpautop' => true)); ?>

        <p class="submit"><input type="submit" id="submit" class="button-primary" value="Save Question"/></p>
    </form>

    <!-- back links -->
    <p><a class="back_link"
          href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz['id']); ?>">Back
            to Edit Quiz Page</a></p>

</div>
<?php vqzb_include_admin_footer(); ?>