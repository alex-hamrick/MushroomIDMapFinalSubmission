<?php

class Admin extends DatabaseObject {

  static protected $table_name = "user_usr";
  static protected $db_columns = ['id_usr', 'first_name_usr', 'last_name_usr', 'email_usr', 'username_usr', 'hashed_password_usr', 'user_level_usr'];

  public $id_usr;
  public $first_name_usr;
  public $last_name_usr;
  public $email_usr;
  public $username_usr;
  public $user_level;
  protected $hashed_password_usr;
  public $password;
  public $confirm_password;
  protected $password_required = true;

  /**
   * Creates new admin object
   * 
   * @param array [$args=[]] sets the default values of new object
   */
  public function __construct($args=[]) {
    $this->first_name_usr = $args['first_name_usr'] ?? '';
    $this->last_name_usr = $args['last_name_usr'] ?? '';
    $this->email_usr = $args['email_usr'] ?? '';
    $this->username_usr = $args['username_usr'] ?? '';
    $this->user_level_usr = $args['user_level_usr'] ?? 'm';
    $this->password = $args['password'] ?? '';
    $this->confirm_password = $args['confirm_password'] ?? '';
  }

  /**
   * Joins first and last name
   */
  public function full_name() {
    return $this->first_name_usr . " " . $this->last_name_usr;
  }

  /**
   * Encrypts password
   */
  protected function set_hashed_password() {
    $this->hashed_password_usr = password_hash($this->password, PASSWORD_BCRYPT);
  }

  /**
   * Verifies password
   * @param string $password User password
   */
  public function verify_password($password){
    return password_verify($password, $this->hashed_password_usr);
  }

  /**
   * creates password
   */
  protected function create() {
    $this->set_hashed_password();
    return parent::create();
  }

  /**
   * updates object
   */
  protected function update() {
    if($this->password != '') {
      // validate password
      $this->set_hashed_password();
    } else {
      // password not being updated, skip hashing and validation
      $this->password_required = false;
    }
    return parent::update();
  }

  /**
   * validates entries upon submission
   */
  protected function validate() {
    $this->errors = [];
  
    if(is_blank($this->first_name_usr)) {
      $this->errors[] = "First name cannot be blank.";
    } elseif (!has_length($this->first_name_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "First name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->last_name_usr)) {
      $this->errors[] = "Last name cannot be blank.";
    } elseif (!has_length($this->last_name_usr, array('min' => 2, 'max' => 255))) {
      $this->errors[] = "Last name must be between 2 and 255 characters.";
    }
  
    if(is_blank($this->email_usr)) {
      $this->errors[] = "Email cannot be blank.";
    } elseif (!has_length($this->email_usr, array('max' => 255))) {
      $this->errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($this->email_usr)) {
      $this->errors[] = "Email must be a valid format.";
    }
  
    if(is_blank($this->username_usr)) {
      $this->errors[] = "Username cannot be blank.";
    } elseif (!has_length($this->username_usr, array('min' => 8, 'max' => 255))) {
      $this->errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($this->username_usr, $this->id ?? 0)) {
      $this->errors[] = "Username not allowed. Try another.";
    }
  
    if($this->password_required) {
      if(is_blank($this->password)) {
        $this->errors[] = "Password cannot be blank.";
      } elseif (!has_length($this->password, array('min' => 12))) {
        $this->errors[] = "Password must contain 12 or more characters";
      } elseif (!preg_match('/[A-Z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
        $this->errors[] = "Password must contain at least 1 symbol";
      }
    
      if(is_blank($this->confirm_password)) {
        $this->errors[] = "Confirm password cannot be blank.";
      } elseif ($this->password !== $this->confirm_password) {
        $this->errors[] = "Password and confirm password must match.";
      }
    }
  
    return $this->errors;
  }

  /**
   * Finds user by username
   * 
   * @param string $username_usr username variable
   */
  static public function find_by_username($username_usr) {
    $sql = "SELECT * FROM " . static::$table_name . " ";
    $sql .= "WHERE username_usr=" . self::$database->quote($username_usr);
    $object_array = static::find_by_sql($sql);
    if(!empty($object_array)) {
        return array_shift($object_array);
    }   else    {
        return false;
    }
  }

}

?>
