<?php 
include 'locations_model.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo url_for('/js/main.js'); ?>" defer></script> 
<link rel="stylesheet" href="../stylesheets/guest-map.css"/>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCkzm6q-9Ny7No2DqIQULKLCGU-majaJXw"> </script>
<div id="map"></div>
<script>var locations = <?php get_confirmed_locations() ?></script>
<script src='../js/guest-map.js?v=8' defer></script>

<?php
include_once 'footer.php';
?>
