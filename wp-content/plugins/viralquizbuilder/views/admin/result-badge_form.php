<div class="wrap vqb_wrap" style="width:670px">

    <!-- result image example -->
    <div id="image_example"><p style="text-align: center; color: #AAA">Example image</p><img src="" style="display:none"/></div>

    <div id="vqzb-icon" class="icon32"><br /></div>
    <h2><?php echo $vqzb_page_title; ?></h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : '' ); ?>

    <a href="http://fast.wistia.net/embed/iframe/rw0oqeymrr?autoPlay=true&playerColor=278de6&popover=true&version=v1&videoHeight=450&videoWidth=800&volumeControl=true"
       class="wistia-popover[height=450,playerColor=278de6,width=800]">
        <div class="help_icon"></div>Help with this</a>
    <div style="clear:both; margin-bottom:20px;"></div>

    <form id="result_badge_form" method="post" action="<?php echo $vqzb_form_action; ?>" enctype="multipart/form-data">
        <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
        <table class="form-table widefat">

            <?php if (!VQzBuilder_ResultBadgeModel::getInstance()->default_exists($quiz_id) OR (isset($badge) && $badge['is_default'])): ?>
                <!-- maybe default? -->
                <label for="is_default">
                    <input type="checkbox" name="is_default" id="is_default" <?php echo vqzb_set_checkbox('is_default', isset($badge) ? $badge['is_default'] : FALSE); ?> />
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
                                <option value="<?php echo $abc_type_answer['id']; ?>" <?php echo vqzb_set_select('abc_type_answer_id', $abc_type_answer['id'], isset($badge) ? $badge['abc_type_answer_id'] : FALSE); ?>><?php echo $abc_type_answer['answer']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php else: ?>
                <tr class="answer_val">
                    <td><label>From point*:</label></td>
                    <td><input type="text" name="points_from" value="<?php echo vqzb_set_value('points_from', isset($badge) ? $badge['points_from'] : FALSE); ?>"/></td>
                </tr>
                <tr class="answer_val">
                    <td><label>To point*:</label></td>
                    <td><input type="text" name="points_to" value="<?php echo vqzb_set_value('points_to', isset($badge) ? $badge['points_to'] : FALSE); ?>"/></td>
                </tr>
            <?php endif; ?>
                    
                    

            <tr valign="top">
                <th>
                    <label for="text">Text:</label><br />
                    <span class="description">You can use the next tokens:<br /> <?php echo VQZB_RESULT_VALUE_PLHDR; ?></span>
                </th>
                <td>
                    <textarea name="text" id="content" class="code" cols="50" rows="10">
                        <?php echo vqzb_set_value('text', isset($badge) ? $badge['text'] : FALSE, VQZB_DEFAULT_TXT); ?>
                    </textarea>

                </td>
            </tr>

            <tr valign="top">
                <th><label for="text_color">Text color:</label></th>
                <td><input type="text" name="text_color" id="text_color" value="<?php echo vqzb_set_value('text_color', isset($badge) ? $badge['text_color'] : FALSE); ?>" class="regular-text" /></td>
            </tr>

            <tr valign="top">
                <th><label for="text_font_id">Text font:</label></th>
                <td>
                    <select name="text_font_id" id="text_font_id">
                        <?php foreach ($fonts as $font): ?>
                            <option value='<?php echo $font['id'] ?>' <?php echo vqzb_set_select('text_font_id', $font['id'], isset($badge) ? $badge['text_font_id'] : FALSE); ?>><?php echo $font['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th><label for="text_fontsize_id">Font size:</label></th>
                <td>
                    <select name="text_fontsize_id" id="result_text_fontsize_id">
                        <?php foreach ($fontsizes as $fontsize): ?>
                            <option value='<?php echo $fontsize['id'] ?>' <?php echo vqzb_set_select('text_fontsize_id', $fontsize['id'], isset($badge) ? $badge['text_fontsize_id'] : FALSE); ?>><?php echo $fontsize['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>

            <tr valign="top">
                <th colspan="2">Background</th>
            </tr>
            <tr>
                <!-- background color -->
                <td>
                    <input type='radio' name="background_selected" value='color' id="background_color_selected" <?php echo vqzb_set_radio('background_selected', 'color', isset($badge) && $badge['background_color'] != NULL ? 'color' : FALSE) ?> />
                    <label for='background_color_selected'>background color</label>
                </td>
                <td>
                    <input type="text" name="background_color" id="background_color" class="select_background" value="<?php echo vqzb_set_value('background_color', isset($badge) ? $badge['background_color'] : FALSE); ?>" class="regular-text select_background" />
                </td>
            </tr>
            <tr>
                <!-- background image -->
                <td>
                    <input type="radio" name="background_selected" value='image' id="background_image_selected" <?php echo vqzb_set_radio('background_selected', 'image', isset($badge) && $badge['background_image'] != NULL ? 'image' : FALSE) ?> />
                    <label for='background_image_selected'>background image<br /><span class="description"><?php echo VQZB_IMG_TYPES; ?> are allowed<br />max image size <?php echo round((VQZB_MAX_FILE_SIZE / 1024 / 1024), 2); ?>Mb</span></label>
                </td>
                <td>
                    <input type="file" name="background_image" id="background_image" value="" class="select_background"/>
                    <input type="hidden" name="previous_background_image" id="previous_background_image" value="<?php echo isset($badge) ? esc_html($badge['background_image']) : ''; ?>"/>
                    <span class="description"><?php echo isset($badge) ? $badge['background_image'] : ''; ?></span>
                </td>
            </tr>

            <!-- generate example -->
            <tr>
                <td colspan="2"><p class="submit"><input type="button" id="generate_example" class="button-primary" value="Generate Example Badge" onClick="return vqzb_ajax_form();" /></p></td>
            </tr>
            </tbody>
            </table>
        <br/>
        <h3>Social Share Options</h3>
        <table class="widefat" >
            <tbody>
            <tr>
                <td colspan="2">
                    <span class="description">
                        You can use the following tokens: <?php echo VQZB_RESULT_VALUE_PLHDR; ?> <?php echo VQZB_QUIZ_LINK_PLHDR; ?> <?php echo VQZB_QUIZ_NAME_PLHDR; ?> <?php echo VQZB_RES_IMG_URL_PLHDR; ?>
                    </span>
                </td>
            </tr>

            <tr>
                <th><label for="share_text_twitter">Social network share twitter</label></th>
                <td><textarea name="share_text_twitter" id="share_text_twitter" value="" class="code" cols="50" rows="5"><?php echo vqzb_set_value('share_text_twitter', isset($badge) ? $badge['share_text_twitter'] : FALSE); ?></textarea></td>
            </tr>

            <tr>
                <th><label for="share_text_fb">Social network share facebook</label></th>
                <td><textarea name="share_text_fb" id="share_text_fb" value="" class="code" cols="50" rows="5"><?php echo vqzb_set_value('share_text_fb', isset($badge) ? $badge['share_text_fb'] : FALSE); ?></textarea></td>
            </tr>

            <tr>
                <th><label for="share_text_pin">Social network share pinterest</label></th>
                <td><textarea name="share_text_pin" id="share_text_pin" value="" class="code" cols="50" rows="5"><?php echo vqzb_set_value('share_text_pin', isset($badge) ? $badge['share_text_pin'] : FALSE); ?></textarea></td>
            </tr>

        </table>
        <p class="submit"><input type="submit" class="button-primary" value="Save"  /></p>

    </form>

    <!-- back links -->
    <p><a class="back_link" href="<?php echo self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id); ?>">Back to Edit Results Page</a></p>
</div>
<?php vqzb_include_admin_footer(); ?>