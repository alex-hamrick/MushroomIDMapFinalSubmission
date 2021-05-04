<?php require_once('../private/initialize.php'); ?>
<?php $page_title = 'Detail'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

	
	<?php

  // Get requested ID
  $id = $_GET['id_mshm'] ?? false;
  if(!$id) {
    redirect_to('mushrooms.php');
  }
  
  $mushroom = Mushroom::find_by_id_mshm($id_mshm);
?>
	  <a href="mushrooms.php">Back to Inventory</a>

  <div id="page">

    <div class="detail">
      <dl>
        <dt>Name</dt>
        <dd><?php echo h($mushroom->latin_name_mshm); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($mushroom->common_name_mshm); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($mushroom->description_mshm); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Level</dt>
        <dd><?php echo h($mushroom->wiki_link_mshm) ;?> </dd> 
      </dl>
			   <dl>
        <dt>Conservation Level</dt>
        <dd><?php echo h($mushroom->edibility) ;?> </dd> 
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($edible_description_mshm); ?></dd>
      </dl>
     
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
