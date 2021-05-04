<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($mushroom)) {
  redirect_to(url_for('/mushroom-members/views/mushroomindex.php'));
}
?>

<dl>
  <dt>Latin Name</dt>
  <dd><input type="text" name="mushroom[latin_name_mshm]" value="<?= $mushroom->latin_name_mshm; ?>" /></dd>
</dl>

<dl>
  <dt>Common Name</dt>
  <dd><input type="text" name="mushroom[common_name_mshm]" value="<?= $mushroom->common_name_mshm; ?>" /></dd>
</dl>

<dl>
  <dt>Wikipedia Link</dt>
  <dd><input type="text" name="mushroom[wiki_link_mshm]" value="<?= $mushroom->wiki_link_mshm; ?>" /></dd>
</dl>

<dl>
  <dt>Edibility Level</dt>
  <dd>
    <select name="mushroom[edible_mshm]">
			<option value=""></option>
    <?php foreach(Mushroom::EDIBLE_OPTIONS as $con_id => $con_name) { ?>
      <option value="<?php echo $con_id; ?>" <?php if ($mushroom->edible_mshm == $con_id) {echo 'selected';} ?>> <?php echo $con_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>


<dl>
  <dt>Mushroom Description</dt>
  <dd><textarea name="mushroom[description_mshm]" rows="5" cols="50"><?= $mushroom->description_mshm; ?></textarea></dd>
</dl>

<dl>
  <dt>Image File</dt>
  <dd><input type="file" name="mushroom_file_name1" /></dd>
   <dd><input type="file" name="mushroom_file_name2" /></dd>
</dl>