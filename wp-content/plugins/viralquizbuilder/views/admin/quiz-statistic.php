<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2>Quiz Statistic</h2>

    <h3>Quiz Name: <code><?php echo $quiz['name']; ?></code></h3>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <!-- clear all statistic button -->
    <p class="submit">
        <a class="button-primary" style="margin-right: 50px"
           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=quiz_statistic&clear=true&quiz_id=' . $quiz['id'] . '&noheader=true'); ?>"
           onclick="if ( confirm( 'You are about to delete all statistics related to this quiz \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">
            Clear Statistics
        </a>

        <a class="button-primary"
           href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=quiz_statistic&clear=true&del_img=true&quiz_id=' . $quiz['id'] . '&noheader=true'); ?>"
           onclick="if ( confirm( 'You are about to delete all statistics and images related to this quiz \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">
            Clear Statistics & Images
        </a>

    </p>
    <table class="widefat">
        <tbody>
        <tr>
            <td>
                <p>Quiz passed:</td>
            <td><code><?php echo $quiz['passed_qty']; ?></code></p></td>

        </tr>

        </tbody>
    </table>

    <div>

        <?php foreach ($questions as $question): ?>
        <h3 style="margin-top:30px;"><?php echo $question['question']; ?></h3>
        <table class="widefat">
            <thead>
            <tr>
                <th>Answer</th>
                <th>Popularity</th>
            </tr>
            </thead>
            <tbody>
                <?php if (count($question['answers']) > 0): ?>

                    <?php foreach ($question['answers'] as $answer): ?>
                        <tr>
                            <td>
                               <?php echo $answer['answer']; ?></td>
                            <td>
                                <code><?php echo vqzb_get_percent($answer['selected_qty'], $quiz['passed_qty']); ?>&percnt;</code>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td>
                            <li class="description">No answers found</li>
                        </td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>
            <?php endforeach; ?>


    </div>


    <p><a class="back_link"
          href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz['id']); ?>">Back
            to Edit Quiz Page</a></p>

</div>
<?php vqzb_include_admin_footer(); ?>