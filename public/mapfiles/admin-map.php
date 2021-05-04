<?php require_once('../../private/initialize.php'); 
include_once 'header.php';
include_once 'locations_model.php';
?>

<a class="back-link" href="<?php echo url_for('/mushroom-members/views/submissionindex.php'); ?>">&laquo; Back to Submissions</a>
<div id="map"></div>
<script>var locations = <?php get_all_locations() ?>;</script>
<script src='../js/admin-map.js?v=8' defer></script>
<div class="adminForm" id="form">
    <div class="map1" id="admin-IW">
      <div id="item-1-admin">
        <button class="left-arrow" onclick="plusDivs(-1)">&#10094;</button>
        <button class="right-arrow" onclick="plusDivs(+1)">&#10095;</button>
      </div>
      <div id="item-2-admin">
        <img class='mySlides confirmInfoWindow' id='image1' alt='first image of mushroom' />
        <img class='mySlides confirmInfoWindow' id='image2' alt='second image of mushroom' />
      </div>
      <div id="item-3-admin">
        <h4 class="mush-head">Date Found: </h4><span id='dateFoundSub' class="mush-body"></span>
      </div>
      <div id="item-4-admin">
        <input name="id" type='hidden' id='id' />
        <h4 class="mush-head">Description: </h4><span id='description' class="mush-body"></span>
      </div>
      <div id="item-5-admin">
        <h4 class="mush-head">Confirm Mushroom: </h4>
          <input type='hidden' id='confirmed' />
          <select id='mushroomList'>
            <?php
                $rows=getMushroomList();
                foreach ($rows as $row)
                {
                  $id = $row['id_mshm'];
                  $text = $row['latin_name_mshm'];
                  echo "<option value='$id'>$text</option>";
                }
                ?>
          </select>
      </div>
      <div id="item-6-admin">    
          <input type='button' value='Save Mushroom' onclick='saveData()' />
      </div>
    </div>
  </div>
<script async defer src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyCkzm6q-9Ny7No2DqIQULKLCGU-majaJXw&callback=initMap"></script>
<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
