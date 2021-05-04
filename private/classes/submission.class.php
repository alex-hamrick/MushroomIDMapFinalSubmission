<?php

 class Submission extends DatabaseObject {
    
    static protected $table_name = 'submission_sub';

    static protected $db_columns = ['id_sub', 'id_usr', 'id_mshm', 'latitude_sub', 'longitude_sub', 'description_sub', 'date_found_sub'];

    public $id_sub;
    public $id_usr;
    public $id_mshm;
    public $latitude_sub;
    public $longitude_sub;
    public $description_sub;
    public $date_found_sub;
    public $image1;
    public $image2;


    public const EDIBLE_OPTIONS = [ 
        1 => "Unknown",
        2 => "Edible",
        3 => "Not Edible",
        4 => "Poisonous"
    ];

    /**
     * Constructs submission object
     * 
     * @param array [$args=[]] array of values for new object
     *                                                 
     */
    public function __construct($args=[]) {
        $this->id_sub = $args['id_sub'] ?? '';
        $this->id_usr = $args['id_usr'] ?? '';
        $this->id_mshm = $args['id_mshm'] ?? '';
        $this->latitude_sub = $args['latitude_sub'] ?? '';
        $this->longitude_sub = $args['longitude_sub'] ?? '';
        $this->description_sub = $args['description_sub'] ?? '';
        $this->date_found_sub = $args['date_found_sub'] ?? '';
            }

 	/**
 	 * Finds submission by id
 	 * 
 	 * @param integer $id_sub id of submission being searched
 	 *                                               
 	 * Returns array of object                                               
 	 */
 	static public function find_by_id_sub($id_sub) {
      $sql = "SELECT s.*, image1, image2 FROM " . static::$table_name . " s ";
       $sql .=" LEFT JOIN view_sub_images i ON s.id_sub = i.id_sub";
      $sql .= " WHERE s.id_sub=" . self::$database->quote($id_sub);
  
      $object_array = static::find_by_sql($sql);
      if(!empty($object_array)) {
          return array_shift($object_array);
      }   else    {
          return false;
      }
  }
   
   /**
    * Adds new submission to the submission table
    * 
    * @param array $DATA array of values for 
    */
   function add_location($DATA){
    $con=mysqli_connect ("localhost", 'alexh189_bird', 'birds', 'alexh189_test');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $DATA['lat'];
    $lng = $DATA['lng'];
    $description =$DATA['description'];
    $mushId = $DATA['mushId'];
    $dateFound = $DATA['dateFound'];
    // Inserts new row with place data.
    $userId = $_SESSION['admin_id'];
      
    $insert = "INSERT INTO submission_sub (id_usr, id_mshm, latitude_sub, longitude_sub, description_sub, date_found_sub)";
    $values = "VALUES(:id_usr, :id_mshm, :latitude_sub, :longitude_sub, :description_sub, :date_found_sub)";
   
    $query = $insert.$values;
    $stmt = self::$database->prepare($query);
    $stmt->bindValue(":id_usr", $userId);
      $stmt->bindValue(":id_mshm", $mushId);
      $stmt->bindValue(":latitude_sub", $lat);
      $stmt->bindValue(":longitude_sub", $lng);
      $stmt->bindValue(":description_sub", $description);
      $stmt->bindValue(":date_found_sub", $dateFound);
    $stmt->execute();
     
  
    echo"Inserted Successfully";
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
   
  
   /**
    * finds all submissions orders by id_sub
    * 
    * returns result
    */
   static public function find_all_sub() {
      $sql = "SELECT * FROM " . static::$table_name . " ORDER BY id_sub DESC";
      return static::find_by_sql($sql);
  }

   
    /**
     * validates data for submission
     */
    protected function validate() {
        $this->errors = [];
  
        if(is_blank($this->description_sub)) {
            $this->errors[] = "Description cannot be blank.";
        }
        if(is_blank($this->date_found_sub)) {
            $this->errors[] = "Date found cannot be blank.";
        }
  
        return $this->errors;
    }


}
