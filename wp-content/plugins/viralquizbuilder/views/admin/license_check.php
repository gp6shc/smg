<div class="wrap vqb_license">
    <div class="wrap_vqb_license_header">
        <div id="vqzb-icon" class="icon32"><br/></div>
        <h2>Viral Quiz Builder - License Activation</h2>
    </div>
    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php if (!$licensedetails['val']): ?>
    <!-- license not activated-->
    <form method="post" action="?page=vqzb_quiz_grid&action=la&noheader=true" name="add_quiz" id="quiz_form">
        <table class="widefat" style="margin-top:20px;">
            <tbody>
            <tr>
                <th scope="row">Purchase Email Address</th>
                <td><input type="text" name="email" size="50"
                           value="<?php echo vqzb_set_value('email', isset($licensedetails['email']) ? $licensedetails['email'] : FALSE); ?>"/>
                </td>
            </tr>
            <tr>
                <th>License Key</th>
                <td><input type="text" name="license_key" size="50"
                           value="<?php echo vqzb_set_value('license_key', isset($licensedetails['license']) ? $licensedetails['license'] : FALSE); ?>"/>
                </td>
            </tr>
            </tbody>
        </table>
        <p></p>

        <div class="vqb_license_submit">
            <input class="button-primary" type="submit" name="Save" value="Validate License" id="submitbutton"/>
        </div>
    </form>
    <?php else: ?>
    <!-- license activated -->
    <div class="vqb_license_submit">
        <p></p>
        <form method="post" action="?page=vqzb_quiz_grid">
            <input class="button-primary" type="submit" name="Proceed" value="License Activated - Click here to get started!" id="proceed"/>
        </form>
    </div>
    <?php endif; ?>
</div>
