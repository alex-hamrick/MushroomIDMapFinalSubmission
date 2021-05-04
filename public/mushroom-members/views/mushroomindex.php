<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $page_title = 'Mushroom Index'; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">

			<div id="page">
    <div class="intro">
      <h2>Mushrooms</h2>
    </div>
				<?php if($session->user_level_usr == 'a') {?>
         <div class="actions">
      <a class="action" href="<?php echo url_for('/mushroom-members/views/new_mshm.php'); ?>">Add Mushroom</a>
      
    </div>
      <?php } ?>
   <div>
     <form action='mushroomindex.php' method='get'>
     Search: <input type='text' name='searchString'/>
     <input type='submit'/>
     </form>
     <br/>
   </div>
				
    <table class="list">
      <tr>
        <th>Latin Name</th>
        <th>Common Name</th>
        <th>Wikipedia Link</th>
        <th>Edibility</th>
        <th>&nbsp;</th>
			  	<?php if($session->user_level_usr == 'a') {?>
        <th>&nbsp;</th>
      <?php } ?>
        
      </tr>


<?php
if (isset($_GET['searchString']))
{
  $mushrooms = Mushroom::find_by_search($_GET['searchString']);
}else{
  $mushrooms = Mushroom::find_all_mshm();
}
?>
      <?php foreach($mushrooms as $mushroom) { ?>
      <tr>
        <td><?php echo $mushroom->latin_name_mshm; ?></td>
        <td><?= $mushroom->common_name_mshm; ?></td>
				    <td><a href="<?= $mushroom->wiki_link_mshm; ?>">Wiki Link</a></td>
        <td><?php echo $mushroom->edibility(); ?></td>
        <td><a class="action" href="<?php echo url_for('/mushroom-members/views/show_mshm.php?id=' . h(u($mushroom->id_mshm))); ?>">View</a></td>
				    <?php if($session->user_level_usr == 'a') {?>
        <td><a class="action" href="<?php echo url_for('/mushroom-members/views/delete_mshm.php?id=' . h(u($mushroom->id_mshm))); ?>">Delete</a></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </table>

  </div>

</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
