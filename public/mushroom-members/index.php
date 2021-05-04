<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Mushroom Map Members Menu'; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/mushroom-members/views/mushroomindex.php'); ?>">Mushrooms</a></li>
      <li><a href="<?php echo url_for('/mushroom-members/views/submissionindex.php'); ?>">Submissions</a></li>
      <?php if($session->user_level_usr == 'a') {?>
      <li><a href="<?php echo url_for('/mushroom-members/admins/index.php'); ?>">Members</a></li>
      <?php } ?>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
