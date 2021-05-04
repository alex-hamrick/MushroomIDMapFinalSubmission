<?php

require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {

  
  // Create record using post parameters
  $args = $_POST['mushroom'];
   $mushroom = new Mushroom($args);

 
  
  $result = $mushroom->save_mshm();
  
  if ($result == true) {
    $new_id = $mushroom->id_mshm;
    
    for ($idx=1;$idx<3;$idx++)
    {
      $file = $_FILES["mushroom_file_name$idx"];
    //  var_dump($file);
      if ($file['name']!="")
      {
      //  echo "file exists";
        $fileName = "id_$new_id"."_".Date('now')."_".$file['name'];
      
        $tempName = $file['tmp_name'];
        move_uploaded_file ($tempName, "../../images/".$fileName);
        $mushroom->insert_image($new_id, $fileName);
        //  die( "File Name: ../../images/".$fileName);
      }else{
//        var_dump($_FILES);
        die("new id: $new_id");
      }
    }
    $_SESSION['message'] = 'The mushroom was created successfully.';
    redirect_to(url_for('/mushroom-members/views/show_mshm.php?id=' . $new_id));
  }   else {
    // show errorss
  }

} else {
  // display the form
  $mushroom = new Mushroom();

}

?>

<?php $page_title = 'Create Mushroom'; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/mushroom-members/views/mushroomindex.php'); ?>">&laquo; Back to List</a>

  <div class="musrhoom new">
    <h1>Create Mushroom</h1>

    <?php echo display_errors($mushroom->errors); ?>

    <form action="<?php echo url_for('/mushroom-members/views/new_mshm.php'); ?>" method="post" enctype="multipart/form-data">

      <?php include('form_fields_mshm.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Mushroom" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
