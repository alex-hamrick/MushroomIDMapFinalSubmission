<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Mushroom ID Map'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
		
		<div id="page">
    <div class="intro">
      <h2>Mushroom Map</h2>
    </div>

    <table id="inventory">
      <tr>
        <th>Latin Name</th>
        <th>Common Name</th>
        <th>Description</th>
        <th>Wikipedia Link</th>
        <th>Edibility</th>
        <th>Edibility Description</th>
        <th>&nbsp;</th>
      </tr>


<?php

$mushrooms = Mushroom::find_all();

?>
      <?php foreach($mushrooms as $mushroom) { ?>
      <tr>
        <td><?php echo $mushroom->latin_name_mshm; ?></td>
        <td><?= $mushroom->common_name_mshm; ?></td>
        <td><?= $mushroom->description_mshm; ?></td>
        <td><?= $mushroom->wiki_link_mshm; ?></td>
        <td><?php echo $mushroom->edibility(); ?></td>
        <td><?= $mushroom->edible_description_mshm; ?></td>
        <td><a href="detail_mshm.php".php?id=<?= $mushroom->id_mshm; ?>">View</a></td>
      </tr>
<?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>