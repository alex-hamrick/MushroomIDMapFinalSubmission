<?php require_once('../../../private/initialize.php'); ?>

<?php 
require_login();
require_admin();
?>
  
<?php
  
// Find all admins
$admins = Admin::find_all();
  
?>
<?php $page_title = 'Members'; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">
  <div class="admins listing">
    <h1>Members</h1>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/mushroom-members/admins/new.php'); ?>">Add Admin</a>
    </div>

  	<table class="list">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
				<th>User Level</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($admins as $admin) { ?>
        <tr>
          <td><?php echo h($admin->id_usr); ?></td>
          <td><?php echo h($admin->first_name_usr); ?></td>
          <td><?php echo h($admin->last_name_usr); ?></td>
          <td><?php echo h($admin->email_usr); ?></td>
          <td><?php echo h($admin->username_usr); ?></td>
          <td>
            <?php
              if($admin->user_level_usr == 'm'){
                echo 'Member';
              }else{
                echo 'Admin';
              }
            ?>
          </td>
          <td><a class="action" href="<?php echo url_for('/mushroom-members/admins/show.php?id=' . h(u($admin->id_usr))); ?>">View</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>

</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
