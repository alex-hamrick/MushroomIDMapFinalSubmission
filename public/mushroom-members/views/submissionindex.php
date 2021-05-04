<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>


<?php $page_title = 'Submission Index'; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">

			<div id="page">
    <div class="intro">
      <h2>Submissions</h2>
    </div>
	   <div class="actions">
      <a class="action" href="<?php echo url_for('/mapfiles/user-map.php'); ?>">Add Submission</a>
      <?php if($session->user_level_usr == 'a') {?>
        <a class="action" href="<?php echo url_for('/mapfiles/admin-map.php'); ?>">Confirm Submission</a>
      <?php } ?>
    </div>
   				
    <table class="list">
      <tr>        
        <th>Sub ID</th>
        <th>Date Submitted</th>
        <th>Confirmed?</th>
        <th>View</th>    
      </tr>

<?php

$subs = Submission::find_all_sub();

?>
      <?php foreach($subs as $sub) { ?>
      <tr>
        <td><?= $sub->id_sub; ?></td>
        <td><?= $sub->date_found_sub; ?></td>
        <td><?php if($sub->id_mshm > 0) echo "confimed"; if($sub->id_mshm == 0) echo "unconfirmed"; ?></td>
        <td><a class="action" href="<?php echo url_for('/mushroom-members/views/show_sub.php?id=' . h(u($sub->id_sub))); ?>">View</a></td>
      </tr>
<?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
