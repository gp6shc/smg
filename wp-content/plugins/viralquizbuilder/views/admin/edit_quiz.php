<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2>Edit quiz</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <form method="post" action="<?php echo $vqzb_form_action; ?>" name="edit_quiz" id="quiz_form">
        <input id="questions_sort_order" type="hidden" name="questions_sort_order" value=""/>

        <h3>Quiz Settings</h3>
        <table class="widefat" style="border-collapse:separate">
            <tbody>
            <tr>
                <th scope="row"><label for="name">Quiz Name:*</label></th>
                <td><input name="name" type="text" id="name"
                           value="<?php echo vqzb_set_value('name', isset($quiz) ? $quiz['name'] : FALSE); ?>"
                           class="regular-text"/></td>
            </tr>

            <tr>
                <th scope="row"><label for="name">Quiz Type:</label></th>
                <td><?php echo $quiz['quiz_type']; ?></td>
            </tr>

            <?php if ($quiz['quiz_type_id'] == 1): ?>
                <tr>
                    <th scope="row"><label for="measurement_id">Quiz Measurement:</label></th>
                    <td>
                        <?php echo $quiz['measurement_id'] != NULL ? $quiz['measurement'] : $quiz['custom_measurement_sing']; ?>
                    </td>
                </tr>
            <?php else: ?>
                <!-- a/b/c quiz type answer variants -->
                <tr>
                    <td>Answer Variants for Type A/B/C Quiz:</td>
                    <td>

                        <ul>
                            <?php foreach ($abc_type_answers as $abc_type_answer): ?>
                                <li><?php echo $abc_type_answer['answer']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>

            <?php endif; ?>

            <tr>
                <th scope="row"><label for="display_in_box">Display Quiz in a Box</label></th>
                <td>
                    <fieldset>
                        <label><input name="display_in_box" type="radio" id="name"
                                      value="0" <?php echo vqzb_set_radio('display_in_box', 0, isset($quiz) ? $quiz['display_in_box'] : FALSE, 0) ?>/>No</label>
                        <br/>
                        <label><input name="display_in_box" type="radio" id="name"
                                      value="1" <?php echo vqzb_set_radio('display_in_box', 1, isset($quiz) ? $quiz['display_in_box'] : FALSE, 0) ?>/>Yes</label>
                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>

        <!-- questions grid -->
<br/><br/>
        <h3>Questions<a
                href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_question&quiz_id=') . $quiz['id']; ?>"
                class="add-new-h2">Add question</a></h3>
        <table class="questions-grid widefat" cellspacing="0">
            <?php if (!empty($questions)): ?>
                <p class="description">To save questions sort order press "Save Quiz"</p>
                <?php foreach ($questions as $question): ?>
                    <tr valign="top" id="row_<?php echo $question['id']; ?>">
                        <td class="drag_handle"></td>
                        <td>
                            <?php echo esc_html($question['question']); ?>
                            <span class="answer_num"><?php echo $question['answer_num']; ?> answers</span>
        	    <span class="row-actions">
        	        <span class='edit'><a
                            href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_question&question_id=') . $question['id']; ?>">Edit</a> | </span>
        	        <span class='delete'><a class='submitdelete'
                                            href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_question&question_id=') . $question['id'] . '&noheader=true'; ?>"
                                            onclick="if ( confirm( 'You are about to delete this question \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a></span>
        	    </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr valign="top">
                    <td><span class="question">No questions found.</span></td>
                </tr>
            <?php endif; ?>

        </table>


        <p class="submit">
            <input type="submit" id="submit" class="button-primary" value="Save Quiz"/>
            <a style="margin-left:20px" class="button-secondary"
               href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz['id']); ?>">Edit
                Quiz Results Page</a>
        </p>
    </form>

    <p>
        <a class="back_link" href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid'); ?>">Back to Quiz Menu</a>
        <a style="margin-left: 30px" class="next_link"
           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=quiz_statistic&quiz_id=' . $quiz['id']); ?>">View Quiz Statistics</a>
    </p>
<?php vqzb_include_admin_footer(); ?>