<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Mushroom ID Map'; ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>


<div id="main">

  <div id="page">
    
    <div class="intro" >
      <h2>Mushroom Map</h2>
      <h3 style="display:<?php if($session->is_logged_in()){echo 'none';}else {echo 'inline-block';}?>"; class="signup">To add a submission, please sign up!</h3>
    </div>

			 <div id="map">
				  <iframe class="mapFrame" src="mapfiles/guest-map.php" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
  </div>
 

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
