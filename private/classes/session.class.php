<?php

class Session {

  private $admin_id;
  public $username_usr;
  public $user_level_usr;
  private $last_login;
  private $email_usr;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day in seconds

  /**
   * Constructs session object
   */
  public function __construct() {
    session_start();
    $this->check_stored_login();
  }
  
  /**
   * Gets the username of the user
   * 
   * Returns username
   */
  public function get_username() {
  return $this->username_usr;
  }

  /**
   * Function that logs in user
   * 
   * @param object $admin user object
   * 
   * returns true
   */
  public function login($admin) {
    if($admin) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->admin_id = $_SESSION['admin_id'] = $admin->id_usr;
      $this->username_usr = $_SESSION['username_usr'] = $admin->username_usr;
      $this->user_level_usr = $_SESSION['user_level_usr'] = $admin->user_level_usr;
      $this->last_login = $_SESSION['last_login'] = time();
      $this->email_usr = $_SESSION['email_usr'] = $admin->email_usr;
    }
    return true;
  }

  /**
   * determines if user is logged in
   */
  public function is_logged_in() {
    // return isset($this->admin_id);
    return isset($this->admin_id) && $this->last_login_is_recent();
  }

  /**
   * determines if user is admin
   */
  public function is_admin() {
  if($this->is_logged_in() && $this->user_level_usr == 'a') {
      return true;
    } else {
      // $session->message("Access denied.");
    }
  }
  
  /**
   * logs out user
   */
  public function logout() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['username_usr']);
    unset($_SESSION['user_level_usr']);
    unset($_SESSION['last_login']);
    unset($this->admin_id);
    unset($this->username_usr);
    unset($this->user_level_usr);
    unset($this->last_login);
    return true;
  }

  /**
   * checks the login data and stores it in session
   */
  private function check_stored_login() {
    if(isset($_SESSION['admin_id'])) {
      $this->admin_id = $_SESSION['admin_id'];
      $this->username_usr = $_SESSION['username_usr'];
      $this->user_level_usr = $_SESSION['user_level_usr'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  /**
   * checks the time that the user has been logged in
   */
  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  /**
   * Adds message to the session message
   * 
   * @param string [$msg=""] message to be displayed
   *                                       
   * Returns session message
   */
  public function message($msg="") {
    if(!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      return $_SESSION['message'] ?? '';
    }
  }

  /**
   * Unsets the session message
   */
  public function clear_message() {
    unset($_SESSION['message']);
  }

}

?>