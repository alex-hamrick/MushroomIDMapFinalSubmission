<?php

/**
 * Function that checks if user is logged in and if not sends them to login.php
 */
function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/mushroom-members/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * checks the user level of a user to see if they are admin
 */
function require_admin() {
  global $session;
  if($session->user_level_usr !== 'a') {
    redirect_to(url_for('/mushroom-members/index.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * function that requires user level to be admin
 */
function require_admin_usr() {
  global $session;
  if($session->user_level_usr !== 'a') {
    redirect_to(url_for('/mushroom-members/index.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

/**
 * function that displays the errors
 * 
 * @param array [$errors=array()] array of errors
 *                                         
 * returns $output                                        
 */
function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

/**
 * Displays session message
 * 
 * returns div with session message
 */
function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
