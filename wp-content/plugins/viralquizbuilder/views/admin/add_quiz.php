<div class="wrap vqb_wrap">

    <div id="vqzb-icon" class="icon32"><br /></div>
    <h2>Add quiz</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : '' ); ?>

    <form method="post" action="?page=vqzb_add_quiz&noheader=true" name="add_quiz" id="quiz_form">

        <table class="widefat">

            <!-- quiz name -->
            <tr valign="top">
	<th scope="row"><label for="name">Quiz Name:*</label></th>
	<td><input name="name" type="text" id="name" value="<?php echo vqzb_set_value('name'); ?>" class="regular-text" /></td>
            </tr>

            <!-- quiz type -->
            <tr valign="top">
	<th scope="row"><a href="http://fast.wistia.net/embed/iframe/l77xrkr5dh?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
                       class="wistia-popover[height=450,playerColor=278de6,width=800]">
            <div class="help_icon"></div></a><label for="quiz_type_id">Quiz Type:*<br /><span class="description">(cannot be changed later)</span></label></th>
	<td>
	    <select name="quiz_type_id" id="quiz_type_id">
	        <?php foreach ($quiz_types as $quiz_type): ?>
    	        <option value='<?php echo $quiz_type['id'] ?>' <?php echo vqzb_set_select('quiz_type_id', $quiz_type['id'], FALSE, 1); ?>><?php echo $quiz_type['name']; ?></option>
	        <?php endforeach; ?>
	    </select>
	</td>
            </tr>

            <!-- select measurement -->
            <tr valign="top" id="measure">
	<th scope="row"><label for="measurement_id">measurement:*</label></th>
	<td>
	    <select name="measurement_id" id="measurement_id">
	        <?php foreach ($measurements as $measurement): ?>
    	        <option value='<?php echo $measurement['id'] ?>' <?php echo vqzb_set_select('measurement_id', $measurement['id'], FALSE, 1); ?>><?php echo $measurement['name_sing']; ?></option>
	        <?php endforeach; ?>
	    </select>
	</td>
            </tr>

            <!-- custom measurement -->
            <tr valign="top" class="custom_measurement_row">
	<th scope="row" colspan="2"><label>(if selected own) measurement name:*</label></th>
            </tr>

            <tr valign="top" class="custom_measurement_row">
	<th style="text-align: right">(sing.)</th>
	<td>
	    <input name="custom_measurement_sing" type="text" class="custom_measurement" value="<?php echo vqzb_set_value('custom_measurement_sing'); ?>" class="regular-text" /><br />
	</td>
            </tr>

            <tr valign="top" class="custom_measurement_row">
	<th style="text-align: right">(pl.)</th>
	<td>
	    <input name="custom_measurement_pl" type="text" class="custom_measurement" value="<?php echo vqzb_set_value('custom_measurement_pl'); ?>" class="regular-text" />
	</td>
            </tr>

            <!-- a/b/c quiz type answer variants -->
            <tr class="abc_type_answer">
	<td colspan="2">Answer Variants for Type A/B/C Quiz* <a href="" class="add-new-h2" onclick="return addAbcAnswerRow()">Add Variant</a></td>
            </tr>

            <!-- diplay in box? -->
            <tr valign="top">
	<th scope="row"><label for="display_in_box">Display Quiz in a Box</label></th>
	<td>
	    <fieldset>
	        <label><input name="display_in_box" type="radio" id="name" value="0" <?php echo vqzb_set_radio('display_in_box', 0, FALSE, 0) ?>/>No</label>
	        <br />
	        <label><input name="display_in_box" type="radio" id="name" value="1" <?php echo vqzb_set_radio('display_in_box', 1, FALSE, 0) ?>/>Yes</label>
	    </fieldset>
	</td>
            </tr>

        </table>

        <p class="submit"><input type="submit" id="submit" class="button-primary" value="Save Quiz"  /></p>
    </form>
    <p><a class="back_link" href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid'); ?>">back to Quiz Grid</a></p>

</div>