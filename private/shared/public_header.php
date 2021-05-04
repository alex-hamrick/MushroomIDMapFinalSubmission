<!DOCTYPE html>
<html lang="en">

  <head>
    <title>MushroomID Map<?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>

  <body>

    <header>
      <h1><a href="<?php echo url_for('mshrm-home.php'); ?>"><img class="mushroom" src="<?php echo url_for('/images/header-icon.png') ?>" alt="mushroom question logo"/>MushroomID Map</a>
      </h1>
      <ul class="head">
        <li class="head-li" ><a href="<?php echo url_for('mshrm-home.php'); ?>">Mushroom Map</a></li>
        <li style="display:<?php if($session->is_logged_in()){echo 'none';}else {echo 'inline-block';}?>" ;><a href="<?php echo url_for('/mushroom-members/login.php'); ?>">Login</a></li>
        <li style="display: <?php if($session->is_logged_in()){echo 'none';}else {echo 'inline-block';}?>"><a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a></li>
        <?php if($session->is_logged_in()) { ?>
        <li class="head-li"><a href="<?php echo url_for('/mushroom-members/index.php'); ?>">Members Area</a></li>
        <li class="head-li"><a href="<?php echo url_for('/mushroom-members/logout.php'); ?>">Logout:<?php echo $session->username_usr ?></a></li>
        <?php } ?>
      </ul>
    </header>
