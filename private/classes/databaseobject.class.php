<?php

class DatabaseObject {

  static protected $database;
  static protected $table_name = "";
  static protected $db_columns = [];
  public $errors = [];

  /**
   * Sets the database of an object
   * 
   * @param string $database the database of the object
   */
  static public function set_database($database) {
    self::$database = $database;
  }

  /**
   * querys the database with the sql statement
   * 
   * @param string $sql SQL string that is being submitted to the database
   *
   * returns the array of records 
   */
  static public function find_by_sql($sql) {
      $result = self::$database->query($sql);
      if(!$result) {
          exit("<p>Database query failed</p>");
      }

      // Turn results into objects
      $object_array = [];
      while ($record = $result->fetch(PDO::FETCH_ASSOC)) {
       // var_dump($record);
          $object_array[] = static::instantiate($record);
        //var_dump($object_array);
        }
      //  $result->free();
      return $object_array;
  }
  
   /**
   * querys the database with the sql statement
   * 
   * @param string $sql SQL string that is being submitted to the database
   *
   * returns the array of records 
   */
  static public function query($sql) {
      $result = self::$database->query($sql);
      if(!$result) {
          exit("<p>Database query failed</p>");
      }

      // Turn results into objects
      //$object_array = [];
      return $result->fetchAll();

  }
  
  /**
   * Finds records where id matches the input id
   * 
   * @param integer $id the id that is being searched
   *                                         
   * returns the records that match the id
   */
  static public function find_by_id($id) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE id_usr=" . self::$database->quote($id);
      $object_array = static::find_by_sql($sql);
      if(!empty($object_array)) {
          return array_shift($object_array);
      }   else    {
          return false;
      }
  }
  
	  /**
	   * Searches the mushroom table for where text matches either the common or latin name
	   * 
	   * @param string $text search string
	   *                            
	   * returns rows with matching data                    
	   */
	  static public function find_by_search($text) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE common_name_mshm like '%$text%' OR latin_name_mshm like '%$text%'";
     
      return static::find_by_sql($sql);
  }
  
  /**
   * Finds all records from table
   */
  static public function find_all() {
      $sql = "SELECT * FROM " . static::$table_name . "";
      return static::find_by_sql($sql);
  }

  static public function instantiate($record) {
      $object = new static;
    //var_dump($object);
      foreach($record as $property => $value) {
       // echo "$property \n";
          if(property_exists($object, $property)) {
              $object->$property = $value;
          }
      }
      return $object;
  }

  /**
   * Validates the results
   */
  protected function validate() {
      $this->errors = [];

      // Add custom validations

      return $this->errors;
  }

  /**
   * creates object
   */
  protected function create() {
      $this->validate();
      if(!empty($this->errors)) {
          return false;
      }
      
      // Gather attributes
      $attributes = $this->attributes();
      // Create COLUMNS string
      $attribute_keys = implode(", ", array_keys($attributes));
      // Create variable for appending ":"
      $attribute_key_bind = $attributes;
      // Append ":"
      foreach($attribute_key_bind as $key => $value) {
          $attribute_key_bind[$key] = ":" . $key;
      }
      // Create VALUES string
      $attribute_key_bind_value = implode(", ", array_values($attribute_key_bind));

      // Assemble prepare statement
      $sql = self::$database->prepare("INSERT INTO " . static::$table_name . " (" . $attribute_keys . ") VALUES (" . $attribute_key_bind_value . ")");

      // Bind each value
      foreach($attribute_key_bind as $key => $value) {
          $sql->bindValue($value, $this->$key);
      }

      $result = $sql->execute();
      if($result){
          $this->id_usr = self::$database->lastInsertId();
      }

      return $result;
  }
  
  /**
   * updates database object
   */
  protected function update() {
      $this->validate();
      if(!empty($this->errors)) {
          return false;
      }

      $attributes = $this->attributes();
      $attribute_pairs = [];
      $attribute_pair_binds = [];
      foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key} = :{$key}";
          $attribute_pair_binds[$key] = ":" . $key;
      }
      $attribute_pairs_str = implode(", ", array_values($attribute_pairs));

      $sql = self::$database->prepare("UPDATE " . static::$table_name . " SET " . $attribute_pairs_str . " WHERE id_usr = :id_usr LIMIT 1");

      $sql->bindValue(':id_usr', $this->id_usr);
      foreach($attribute_pair_binds as $key => $value) {
        $sql->bindValue($value, $this->$key);
      }

      $result = $sql->execute();

      return $result;
  }
	
  /**
   * adds new user to database
   */
  public function save() {
      // A new record will not have an ID
      if(isset($this->id_usr)) {
          return $this->update();
      } else {
          return $this->create();
      }
  }
	
  /**
   * Adds values to the columns stored in the attributes array
   * 
   * @param array [$args=[]] attributes array
   */
  public function merge_attributes($args=[]) {
      foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
              $this->$key = $value;
          }
      }
  }

  /**
   * adds columns of table to attributes array
   * 
   * returns array of attributes
   */
  public function attributes() {
      $attributes = [];
      foreach(static::$db_columns as $column) {
          if($column == 'id_usr') { continue; }
          $attributes[$column] = $this->$column;
      }
      return $attributes;
  }
	
  /**
   * delete object
   */
  public function delete() {
      $sql = self::$database->prepare("DELETE FROM " . static::$table_name . " WHERE id = :id LIMIT 1");

      $sql->bindValue(':id', $this->id);

      $result = $sql->execute();

      return $result;

  }
	
}

?>
