<script>
    var graph_data = jQuery.parseJSON(<?php print json_encode(json_encode($graph_data)); ?>); 
</script>
<?php $table_head = "
    <tr>
	<th scope='col' class='manage-column'>Quiz Name</th>
	<th scope='col' class='manage-column'>IP</th>
	<th scope='col' class='manage-column'>Date</th>
	<th scope='col' class='manage-column'>Score</th>
	<th scope='col' class='manage-column'>Picture Link</th>
	<th scope='col' class='manage-column'>Action</th>
    </tr>
"; ?>
<div class="wrap">
    <div id="vqzb-icon" class="icon32"><br /></div>
    <h2>Statistics</h2>

    <?php vqzb_show_admin_errors(isset($errors) ? $errors : array()); ?>
    <?php vqzb_show_admin_success(isset($success) ? $success : '' ); ?>

    <!-- clear all statistic button -->
    <p class="submit">
        <a class="button-primary" style="margin-right: 50px" href="<?php echo self_admin_url('admin.php?page=vqzb_statistic&action=del_all&noheader=true'); ?>" onclick="if ( confirm( 'You are about to delete all statistic \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">
            Clear Statistics
        </a>

        <a class="button-primary" href="<?php echo self_admin_url('admin.php?page=vqzb_statistic&action=del_all&del_img=true&noheader=true'); ?>" onclick="if ( confirm( 'You are about to delete all statistic \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">
            Clear Statistics & Images
        </a>
        <span class="description">&nbsp;(be careful, this will delete the all pictures with results)</span>
    </p>

    <!-- statistic diagram -->
    <div id="vqzb_diagram"></div>

    <!-- filters -->
    <div style="margin-bottom: 15px">
    <form method="GET" action="">
        <input type="hidden" name="page" value="vqzb_statistic" />
        <select name="quiz_id">
            <?php foreach ($quizes as $quiz): ?>
                <option value="<?php echo $quiz['id']; ?>" <?php echo (isset($filter_quiz_id) && $filter_quiz_id == $quiz['id']) ? 'selected' : ''; ?>><?php echo $quiz['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" class="button-primary" value="Filter"  />
    </form>
</div>

<!-- results statistic table -->
<table id="vqzb_statictic_tbl" class="wp-list-table widefat fixed bookmarks" cellspacing="0">

    <thead>
        <?php echo $table_head; ?>
    </thead>

    <tfoot>
        <?php echo $table_head; ?>
    </tfoot>

    <tbody id="the-list">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $result): ?>
                <tr id="link-1" valign="middle"  class="alternate">
                    <td>
        	<strong><?php echo $result['quiz_name'] === NULL ? "<span class='deleted'>Deleted</span>" : esc_html($result['quiz_name']) ?></strong>
                    </td>
                    <td><?php echo $result['ip']; ?></td>
                    <td><?php echo $result['date']; ?></td>
                    <td><?php echo $result['abc_type_answer'] ? $result['abc_type_answer'] : $result['points'] . " " . $result['measurement']; ?></td>
                    <td>
                        <?php if($result['picture_name']): ?>
                            <a href="<?php echo VQZB_RESULT_IMG_URL . $result['picture_name']; ?>">picture link</a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
        	<span class='delete'>
        	    <a class='submitdelete' href="<?php echo self_admin_url('admin.php?page=vqzb_statistic&action=del_res&res_id=') . $result['id']; ?>&noheader=true" onclick="if ( confirm( 'You are about to delete this result \n  \'Cancel\' to stop, \'OK\' to delete.' ) ) { return true;}return false;">Delete</a>
        	</span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr class="no-items"><td class="colspanchange" colspan="4">No results found.</td></tr>
        <?php endif; ?>
    </tbody>

</table>

</div>