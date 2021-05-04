<?php
require_once('../../private/initialize.php');

$errors = [];
$username_usr = '';
$password = '';

if(is_post_request()) {
  $username_usr = $_POST['username_usr'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username_usr)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Admin::find_by_username($username_usr);
    // test if admin found and password is correct
//    var_dump($admin->verify_password($password));
    if($admin != false && $admin->verify_password($password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirect_to(url_for('/mushroom-members/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" class="loginField" name="username_usr" value="<?php echo h($username_usr); ?>" /><br />
    Password:<br />
    <input type="password" class="loginField" name="password" value="" /><br />
    <div><?php echo display_errors($errors); ?></div>
    <input type="submit" name="submit" value="Log In"  />
    <div class="recovery">
<!--    <a href="recovery.php">Forgot Password</a>-->
    </div>
  </form>
   
</div>

<?php include(SHARED_PATH . '/mushroom-members-footer.php'); ?>
