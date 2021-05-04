<?php
  if(!isset($page_title)) { $page_title = 'Mushroom Member Area'; }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Mushroom ID Map - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
    <script src="<?php echo url_for('/js/main.js'); ?>" defer></script> 
  </head>

  <body>
    <header>
      <h1><a id="title" href="<?php echo url_for('/mushroom-members/index.php'); ?>"><img class="mushroom" src="<?php echo url_for('/images/header-icon.png') ?>" alt='Mushroom logo'/>MushroomID Map <?php if($session->user_level_usr == 'a') echo "Admin"; ?><?php if($session->user_level_usr == 'm') echo "Member"; ?>  Area</a></h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('mshrm-home.php'); ?>">Mushroom Map</a></li>
        <li style="display: <?php if($session->is_logged_in()){echo 'none';}else {echo 'inline-block';}?>"><a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a></li>
        <?php if($session->is_logged_in()) { ?>
        <li><a href="<?php echo url_for('/mushroom-members/index.php'); ?>">Members Area</a></li>
        <li><a href="<?php echo url_for('/mushroom-members/logout.php'); ?>">Logout:<?php echo $session->username_usr ?></a></li>
        <?php } ?>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
