<div class="wrap vqb_wrap">

    <div id="vqzb-icon" class="icon32"><br/></div>
    <h2>Static Text Translate</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : ''); ?>

    <form method="post" action="?page=vqzb_translate&noheader=true" id="translate_form">

        <table class="widefat">

            <thead>
            <tr>
                <th>Original Text</th>
                <th>Enter Translation</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($i18n as $text): ?>
                <!-- original text -->
                <tr>
                    <th scope="row"><p><?php echo esc_html($text['original']); ?></p></th>
                    <td><input type="text" name="text[<?php echo $text['id']; ?>][translate]"
                               value="<?php echo esc_html($text['translate']); ?>"
                               id="translate_<?php echo $text['id']; ?>" class="regular-text"
                               style="margin-top:15px;"/></td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>

        <p class="submit"><input type="submit" id="submit" class="button-primary" value="Save"/></p>
    </form>

</div>