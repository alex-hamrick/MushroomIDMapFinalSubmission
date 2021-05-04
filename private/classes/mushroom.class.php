<?php

 class Mushroom extends DatabaseObject {
    
    static protected $table_name = 'mushroom_mshm';

    static protected $db_columns = ['id_mshm', 'latin_name_mshm', 'common_name_mshm', 'description_mshm', 'wiki_link_mshm', 'edible_mshm', 'edible_description_mshm'];

    public $id_mshm;
    public $latin_name_mshm;
    public $common_name_mshm;
    public $description_mshm;
    public $wiki_link_mshm;
    public $edible_mshm=1;
    public $edible_description_mshm;
    public $file_name;


    public const EDIBLE_OPTIONS = [ 
        1 => "Unknown",
        2 => "Edible",
        3 => "Not Edible",
        4 => "Poisonous"
    ];

   /**
   * Creates new Mushroom object
   * 
   * @param array [$args=[]] sets the default values of new object
   */
    public function __construct($args=[]) {
        $this->latin_name_mshm = $args['latin_name_mshm'] ?? '';
        $this->common_name_mshm = $args['common_name_mshm'] ?? '';
        $this->description_mshm = $args['description_mshm'] ?? '';
        $this->wiki_link_mshm = $args['wiki_link_mshm'] ?? '';
        $this->edible_mshm = $args['edible_mshm'] ?? '';
        $this->edible_description_mshm = $args['edible_description_mshm'] ?? '';
    }

    /**
     * Displays the edibility of a mushroom
     */
    public function edibility() {
        if( $this->edible_mshm > 0 ) {
            return self::EDIBLE_OPTIONS[$this->edible_mshm];
        } else {
            return "Unknown";
        }
    }
   
   
   	/**
   	 * finds mushroom from mushroom table based on the id
   	 * 
   	 * @param integer $id id to look up in the mushroom table
   	 *                                                  
   	 * returns array record where id matches                                                
   	 */
   	static public function find_by_id_mshm($id) {
      $sql = "SELECT * FROM " . static::$table_name . " ";
      $sql .= "WHERE id_mshm=" . self::$database->quote($id);
      $object_array = static::find_by_sql($sql);
      if(!empty($object_array)) {
          return array_shift($object_array);
      }   else    {
          return false;
      }
    }
   
   /**
    * returns image from image table where mushroom id matches
    * 
    * @param integer $id id of the mushroom
    *                              
    * @returns result of the query                             
    */
   public static function getImage($id) {
     $sql = "SELECT image_name_img FROM image_img WHERE id_mshm = $id";
  
      $result = static::query($sql);
      if($result==null) {
          return null;
      }   else    {
          return $result;
      }
   }
   
  /**
   * returns all mushroom objects from mushroom table
   */
  static public function find_all_mshm() {
      $sql = "SELECT * FROM " . static::$table_name . " ORDER BY latin_name_mshm";
      return static::find_by_sql($sql);
  }

  /**
   * instantiates record
   * 
   * @param object $record record that is having values bound to its properties
   *                                                                 
   * returns object                                                                 
   */
  static public function instantiate($record) {
      $object = new static;
      foreach($record as $property => $value) {
          if(property_exists($object, $property)) {
              $object->$property = $value;
          }
      }
      return $object;
  }
  
   /**
    * creates or updates mushroom object
    */
   public function save_mshm() {
      // A new record will not have an ID
      if(isset($this->id_mshm)) {
          return $this->update_mshm();
      } else {
          return $this->create_mshm();
      }
  }
   
   	/**
   	 * updates mushroom object
   	 */
   	protected function update_mshm() {
      $this->validate();
      if(!empty($this->errors)) {
          return false;
      }

      $attributes = $this->attributes_mshm();
      $attribute_pairs = [];
      $attribute_pair_binds = [];
      foreach($attributes as $key => $value) {
          $attribute_pairs[] = "{$key} = :{$key}";
          $attribute_pair_binds[$key] = ":" . $key;
      }
      $attribute_pairs_str = implode(", ", array_values($attribute_pairs));

      $sql = self::$database->prepare("UPDATE " . static::$table_name . " SET " . $attribute_pairs_str . " WHERE id_mshm = :id_mshm LIMIT 1");

      $sql->bindValue(':id_mshm', $this->id_mshm);
      foreach($attribute_pair_binds as $key => $value) {
        $sql->bindValue($value, $this->$key);
      }

      $result = $sql->execute();

      return $result;
  }
   
   	  /**
   	   * adds columns of the mushroom table to an array
   	   * 
   	   * returns array of columns
   	   */
   	  public function attributes_mshm() {
      $attributes = [];
      foreach(static::$db_columns as $column) {
          if($column == 'id_mshm') { continue; }
          $attributes[$column] = $this->$column;
      }
      return $attributes;
  }
   
   	/**
   	 * binds values to columns in the mushroom table
   	 */
   	protected function create_mshm() {
      $this->validate();
      if(!empty($this->errors)) {
          return false;
      }

      // Gather attributes
      $attributes = $this->attributes_mshm();
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
          $this->id_mshm = self::$database->lastInsertId();
      }

      return $result;
  }
   
   	/**
   	 * deletes mushroom record
   	 */
   	public function delete_mshm() {
			$sql = self::$database->prepare("DELETE FROM " . static::$table_name . " WHERE id_mshm = :id_mshm LIMIT 1");

			$sql->bindValue(':id_mshm', $this->id_mshm);

			$result = $sql->execute();

			return $result;

  }
   
  /**
   * inserts image into the image table 
   * @param integer $id_mshm  Mushroom id
   * @param string $fileName name of the image file
   */
  public function insert_image ($id_mshm, $fileName)
  {
    $sql = self::$database->prepare("INSERT INTO image_img( id_sub, id_mshm, image_name_img) VALUES (0, :id_mshm, :fileName) ");
    $sql->bindValue(':id_mshm', $id_mshm);
    $sql->bindValue(':fileName', $fileName);
    $result = $sql->execute();

      return $result;
  }
    /**
     * validates the input data for new mushroom
     */
    protected function validate() {
        $this->errors = [];
  
        if(is_blank($this->latin_name_mshm)) {
            $this->errors[] = "Latin Name cannot be blank.";
        }
        if(is_blank($this->description_mshm)) {
            $this->errors[] = "Description cannot be blank.";
        }
  
        return $this->errors;
    }

}
