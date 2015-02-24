<div class="wrap">

    <div id="vqzb-icon" class="icon32"><br /></div>
    <h2>Export/Import Quiz Data</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : '' ); ?>


    <p style="margin-top: 40px">
        <a class="button-primary" style="margin-right: 50px" href="<?php echo self_admin_url('admin.php?page=vqzb_transfer_data&action=export&noheader=true'); ?>" >
            Export quiz data
        </a>
    </p>

    
    <form style="margin-top: 40px" method="post" action="admin.php?page=vqzb_transfer_data&action=import&noheader=true" enctype="multipart/form-data">
        <input type="file" name="import_file" />
        <input type="submit" class="button-primary" style="margin-right: 50px" value="Import quiz data" />
    </form>

</div>