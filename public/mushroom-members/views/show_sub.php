<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$sub = Submission::find_by_id_sub($id);
//var_dump($sub);//->image1;
//echo $sub->image1;
?>

<?php $page_title = 'Show Submissions: '; ?>
<?php include(SHARED_PATH . '/mushroom-members-header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/mushroom-members/views/submissionindex.php'); ?>">&laquo; Back to List</a>

  <div class="submission show">

    <h1>Submission: <?php echo h($sub->id_sub); ?></h1>

    <div class="attributes">
      
      <dl>
        <dt>Description</dt>
        <dd><?php echo h($sub->description_sub); ?></dd>
      </dl>
      <dl>
        <dt>Date Submitted</dt>
        <dd><?php echo h($sub->date_found_sub); ?></dd>
      </dl>
      <dl>
        <button class="left-arrow" onclick="plusDivs(-1)">&#10094;</button>
          <button class="right-arrow" onclick="plusDivs(+1)">&#10095;</button>
        <img class="mySlides showSub" src="../../images/<?php echo h($sub->image1); ?>"  />
        <img class="mySlides showSub" src="../../images/<?php echo h($sub->image2); ?>"  />
      </dl>
      
    </div>

  </div>

</div>
