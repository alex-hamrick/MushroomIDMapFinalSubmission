<?php
  
  // Initialize the general stuff
  require_once('../private/initialize.php');


  //Check if this is a POST request. If it is, add the new member, log them in, and redirect to mushroom-members/index.php
  if(is_post_request() == 'POST') {
   
    $captcha;

if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LdnF58aAAAAACcmLv721FFoFhEFyR-G1gwlFOIz";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);


    // Create record using post parameters
    $args = $_POST['admin'];
    $admin = new Admin($args);
    $result = $admin->save();
  
    // Test result to see if there were no errors when saving the admin to the database
    // if all went well, use session to login with the new admin, add a session message, and redirect to mushroom-members/index.php
    if($result === true) {
      $session->login($admin);
      $session->message('Congratulations! You are now an honorary member of Mushroom ID Map, you can now add a submission. Cool!');
      redirect_to(url_for('/mushroom-members/index.php'));
    } else {
      // show errors: the rest of the page will load and show the errors above the Form
    }
  
  } else {
    // If this is not a POST request -> display the form
    $admin = new Admin;
  }

  // Set page title
  $page_title = 'Sign-Up';

  // Include the PUBLIC header
  include(SHARED_PATH . '/public_header.php');
?>

<!-- Setup the page using the same div structure as mshrm-home.php so that everything looks relatively the same -->
<div id="main">

  <div id="page">
    <div class="intro">
      <h2>Fill out the form below to become a member.</h2>
    </div>
    
    <form action="<?php echo url_for('/signup.php'); ?>" method="post">
      <dl>
        <dt>First name</dt>
        <dd><input type="text" name="admin[first_name_usr]" maxlength="255" value="<?php echo h($admin->first_name_usr); ?>" pattern=".{2,}" title="First name must be between 2 and 255 characters." required /></dd>

      </dl>

      <dl>
        <dt>Last name</dt>
        <dd><input type="text" name="admin[last_name_usr]" maxlength="255" value="<?php echo h($admin->last_name_usr); ?>" pattern=".{2,}" title="Last name must be between 2 and 255 characters." required /></dd>
      </dl>

      <dl>
        <dt>Email</dt>
        <dd><input type="text" name="admin[email_usr]" maxlength="255" value="<?php echo h($admin->email_usr); ?>" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="must be a valid email format" required /></dd>
      </dl>

      <dl>
        <dt>Username</dt>
        <dd><input type="text" name="admin[username_usr]" maxlength="255" value="<?php echo h($admin->username_usr); ?>" pattern=".{8,}" title="User name must be between 8 and 255 characters." required /></dd>
      </dl>
      <div>
        <?php echo display_errors($admin->errors); ?>
      </div>
      <dl>
        <dt>Password</dt>
        <dd><input type="password" name="admin[password]" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9\s]).{12,}" title="Must contain at least one  number and one uppercase and lowercase letter, one symbol, and at least 12 or more characters" required /></dd>
      </dl>

      <dl>
        <dt>Confirm Password</dt>
        <dd><input type="password" name="admin[confirm_password]" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9\s]).{12,}" title="Must contain at least one  number and one uppercase and lowercase letter, one symbol, and at least 12 or more characters" required /></dd>
      </dl>


      <div class="g-recaptcha" data-sitekey="6LdnF58aAAAAALlHgx-VU3lraeMLIp0A1y3KxdRU"></div>

      <div id="operations">
        <input type="submit" value="Become a Member" />
      </div>

    </form>

  </div>

</div>

<?php
  // Include the PUBLIC Footer
  include(SHARED_PATH . '/public_footer.php');
?>
