<div id="vqzb_wrapper" class="<?php echo $quiz['display_in_box'] == 1 ? 'display_in_box' : ''; ?>">

    <?php if ($quiz === NULL): ?>
        <!-- no quiz found -->
        <p class="vqzb_no_item_found"><?php echo vqzb_i18n('no-quiz'); ?></p>

    <?php else: ?>
        <!-- quiz name -->

        <div id="vqzb_content">
            <form action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" id="vqzb_shortcode_form">
                <input type="hidden" name="quiz_id" id="quiz_id" value="<?php echo $quiz['id']; ?>" />
                <table id="vqzb_table">

                    <?php if (empty($questions)): ?>
                        <!-- no questions found -->
                        <tr>
                            <td class="vqzb_no_item_found"><?php echo vqzb_i18n('no-questions'); ?></td>
                        </tr>

                    <?php else: ?>
                        <?php foreach ($questions as $key => $question): ?>
                            <tr>
                                <td>
                                    <?php echo wpautop($question['content']); ?>
                                    <h3><?php echo $question['question'] ?></h3>

                                    <?php if (empty($question['answers'])): ?>
                                        <!-- no answers found -->
                                        <p class="vqzb_no_item_found"><?php echo vqzb_i18n('no-answers'); ?></p>

                                    <?php else: ?>
                                        <ul class="answer_list">
                                            <?php foreach ($question['answers'] as $answer): ?>
                                                <li>

                                                    <?php if ($quiz['quiz_type'] == 'abc-quiz'): ?>
                                                        <input type="radio" id="vqzb_answer_<?php echo $answer['id']; ?>" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $answer['id'] ?>" />
                                                    <?php else: ?>
                                                        <input type="radio" id="vqzb_answer_<?php echo $answer['id']; ?>" name="answers[<?php echo $question['id']; ?>]" value="<?php echo $answer['id'] ?>" />
                                                    <?php endif; ?>

                                                    <label for="vqzb_answer_<?php echo $answer['id']; ?>"><?php echo $answer['answer'] ?></label>

                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </form>

            <p id="vqzb_question_remain"></p>
        </div>
    <?php endif; ?>

</div>