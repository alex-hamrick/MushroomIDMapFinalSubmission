<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$mushroom = Mushroom::find_by_id_mshm($id);
$results = Mushroom::getImage($id);
$cnt = count($results);

//var_dump($image);

?>

<?php $page_title = 'Show Mushrooms: ' . h($mushroom->common_name_mshm); ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/mushroom-members/views/mushroomindex.php'); ?>">&laquo; Back to List</a>

  <div class="mushroom show">

    <h1>Mushroom: <?php echo h($mushroom->latin_name_mshm); ?></h1>

    <div class="attributes">
      <dl>
        <dt class="show-heading">Common Name</dt>
				<dd><a href="<?php echo h($mushroom->wiki_link_mshm); ?>"><?php echo h($mushroom->common_name_mshm); ?></a></dd>
      </dl>
      <dl>
        <dt class="show-heading">Description</dt>
        <dd id="description-show"><?php echo h($mushroom->description_mshm); ?></dd>
      </dl>
      <dl>
        <dt class="show-heading">Edibility</dt>
        <dd><?php echo h($mushroom->edibility()); ?></dd>
      </dl>
<!--
      <dl>
        <dt>Edibility Description</dt>
        <dd><?php echo h($mushroom->edible_description_mshm); ?></dd>
      </dl>
-->
<!--
      <dl>
        <?php
        for ($idx=0;$idx<$cnt;$idx++) 
        {
            $fileName = $results[$idx]['image_name_img'];
            echo "<div><img src='../../images/$fileName' alt='Mushroom image $idx'/></div>";
        }
        ?>
      </dl>
      
-->
        <dl>
          <button class="left-arrow" onclick="plusDivs(-1)">&#10094;</button>
          <button class="right-arrow" onclick="plusDivs(+1)">&#10095;</button>
        <?php
        for ($idx=0;$idx<$cnt;$idx++) 
        {
            $fileName = $results[$idx]['image_name_img'];
            echo "<img class='mySlides' src='../../images/$fileName'/>";
        }
        ?>
          
      </dl>

    </div>

  </div>

</div>
