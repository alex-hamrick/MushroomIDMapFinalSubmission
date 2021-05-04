
<?php require_once('../../private/initialize.php'); 
include_once 'header.php';
include 'locations_model.php';
?>
<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCkzm6q-9Ny7No2DqIQULKLCGU-majaJXw"></script>
<a class="back-link" href="<?php echo url_for('/mushroom-members/views/submissionindex.php'); ?>">&laquo; Back to Submissions</a>

<div id="map"></div>
<script>var locations = <?php get_confirmed_locations() ?>;</script>
<script src='../js/user-map.js' defer></script>

<?php
include_once 'footer.php';
?>
