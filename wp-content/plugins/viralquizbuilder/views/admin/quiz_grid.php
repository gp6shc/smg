<?php $table_head = "
    <tr>
	<th scope='col' class='manage-column'>Quiz Name</th>
	<th scope='col' class='manage-column'>Passed Test</th>
	<th scope='col' class='manage-column'>Questions QTY</th>
	<th scope='col' class='manage-column'>Quiz Shortcode</th>
    </tr>
"; ?>
<div class="wrap vqb_wrap">
    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2>Viral Quiz Builder</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <table class="widefat helpvideos">
        <thead>
        <tr>
            <th>Help Videos to Get you Started with Viral Quiz Builder</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="helpvideos">
                    <a href="http://fast.wistia.net/embed/iframe/5hfl3g9nuy?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
                       class="wistia-popover[height=450,playerColor=278de6,width=800]"><img
                            src="http://embed.wistia.com/deliveries/0b5f07416f86298083b97f4b6cb930611cbc35f8.jpg?image_play_button=true&image_play_button_color=278de6e0&image_crop_resized=150x84"
                            alt=""/><br/>Viral Quiz Builder - Quick Start Guide</a>
                </div>
                <div class="helpvideos">
                    <a href="http://fast.wistia.net/embed/iframe/7j92d7p29v?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
                       class="wistia-popover[height=450,playerColor=278de6,width=800]"><img
                            src="http://embed.wistia.com/deliveries/a1abe6a0706f49264039effa03da4ce0bcb3095d.jpg?image_play_button=true&image_play_button_color=278de6e0&image_crop_resized=150x84"
                            alt=""/><br/>3 Ways to Build Your List with Viral Quiz Builder</a>
                </div>
                <div class="helpvideos">
                    <a href="http://fast.wistia.net/embed/iframe/2fyn6lg302?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
                       class="wistia-popover[height=450,playerColor=278de6,width=800]"><img
                            src="http://embed.wistia.com/deliveries/9cde9f793b605e681dca9d344c195e4937bdddba.jpg?image_play_button=true&image_play_button_color=278de6e0&image_crop_resized=150x84"
                            alt=""/><br/>Facebook App Setup</a>
                </div>
        </tr>
        </tbody>
    </table>

    <h2 style="margin-top:30px; margin-bottom:10px">Your Quizzes<a
            href="<?php echo self_admin_url('admin.php?page=vqzb_add_quiz') ?>"
            class="add-new-h2">Add Quiz</a></h2>
    <table class="wp-list-table widefat fixed bookmarks" cellspacing="0">

        <thead>
        <?php echo $table_head; ?>
        </thead>

        <tfoot>
        <?php echo $table_head; ?>
        </tfoot>

        <tbody id="the-list">
        <?php if (!empty($quizes)): ?>
            <?php foreach ($quizes as $quiz): ?>
                <tr id="link-1" valign="middle" class="alternate">
                    <td>
                        <strong><?php echo esc_html($quiz['name']) ?></strong>

                        <div class="row-actions">
                            <span class='edit'><a
                                    href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=quiz_statistic&quiz_id=') . $quiz['id']; ?>">Quiz
                                    Statistics</a> | </span>
                            <span class='edit'><a
                                    href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=') . $quiz['id']; ?>">Edit</a> | </span>
                            <span class='delete'><a class='submitdelete'
                                                    href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=del_quiz&quiz_id=') . $quiz['id'] . '&noheader=true'; ?>"
                                                    onclick="if ( confirm( 'You are about to delete this quiz \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a></span>
                        </div>
                    </td>
                    <td><?php echo $quiz['passed_test']; ?></td>
                    <td><?php echo $quiz['questions_qty']; ?></td>
                    <td>[<?php echo VQZB_SHORTCODE_NAME . $quiz['id']; ?>]</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr class="no-items">
                <td class="colspanchange" colspan="4">No quizes found.</td>
            </tr>
        <?php endif; ?>
        </tbody>

    </table>

    <p><i>* Please note you can only have one quiz displayed on a page at any given time. If more than one quiz is set to display on the same page then the second quiz will not be shown.</i></p>
    <div style="margin-top:50px">
        <div id="icon-options-general" class="icon32"></div>
        <h2>Global Settings</h2>

        <form method="post" action="?page=vqzb_quiz_grid" id="vqzb_settings">
            <table class="widefat">
                <thead>
                <tr>
                    <th colspan="2">
                        Facebook Settings <a
                            href="http://fast.wistia.net/embed/iframe/2fyn6lg302?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
                            class="wistia-popover[height=450,playerColor=278de6,width=800]">
                            <div class="help_icon"></div>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2">
                        <p>
                            To enable your quiz results to be posted to Facebook, you'll need to set up a Facebook app
                            and enter your App ID below. <a href="http://developers.facebook.com/apps" target="_blank">Visit
                                here</a> to create your app.
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="fb_app_id">Facebook Application ID:</label>

                    </th>
                    <td>
                        <input type="text" name="fb_app_id" id="fb_app_id" size="60"
                               value="<?php echo $fb_app_id; ?>"/>&nbsp;
                        <input type="submit" value="Save" class="button-primary"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>