<?php
//start_session();
require_once('../../private/initialize.php');
require("db.php");
//$dbName="alexh189_bird";
$dbName="demo";
// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}
if(isset($_GET['confirm_location'])) {
    confirm_location();
}
if (isset($_GET['post_location'])){
  post_location();
}

/**
 * Connect to database
 */
function getConn()
{
  $dbName="alexh189_bird";
  //$dbName="demo";
  return mysqli_connect ("localhost", 'root', '',$dbName);
}

/**
 * posts location to database
 */
function post_location(){
    global $dbName;
    $con=getConn();
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
  $description =$_POST['manual_description'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    
  // Inserts new row with place data.
    $idUser = 1;//$_GET['admin_id'];
//    $idUser = $session->admin_id;
    
  $query = sprintf("INSERT INTO submission_sub " .
        " (id_sub, id_usr, id_mshm, latitude_sub, longitude_sub, description_sub, date_found_sub) " .
        " VALUES (NULL, '%s', 0, '%s', '%s','%s', SYSDATE());",
        mysqli_real_escape_string($con,$idUser),
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$description));

    $result = mysqli_query($con,$query);
    $new_id =mysqli_insert_id($con);
    
  for ($idx=1;$idx<3;$idx++)
    {
      $file = $_FILES["file$idx"];
    
      if ($file['name']!="")
      {
      
        $fileName = "id_$new_id"."_sub_".Date('now')."_".$file['name'];
      
        $tempName = $file['tmp_name'];
        move_uploaded_file ($tempName, "../images/".$fileName);
        $query = "INSERT INTO image_img(id_sub, id_mshm, image_name_img) VALUES ($new_id,0, '$fileName') ";
        $result = mysqli_query($con,$query);

      }else{

        die("new id: $new_id");
      }
    }
  
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

/**
 * adds location to submission table
 */
function add_location(){
    global $dbName;
    $con=getConn();
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $description =$_GET['description'];
  // Inserts new row with place data.
    $idUser = 1;//$_GET['admin_id'];
//    $idUser = $session->admin_id;
    
  $query = sprintf("INSERT INTO submission_sub " .
        " (id_sub, id_usr, id_mshm, latitude_sub, longitude_sub, description_sub, date_found_sub) " .
        " VALUES (NULL, '%s', 0, '%s', '%s','%s', SYSDATE());",
         mysqli_real_escape_string($con,$idUser),
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng),
        mysqli_real_escape_string($con,$description));

    $result = mysqli_query($con,$query);
    
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

/**
 * gets list of mushrooms for admin map form used to confirm mushroom
 * 
 * returns rows of mushroom records
 */
function getMushroomList()
{
   global $dbName;
    $con=getConn();//mysqli_connect ("localhost", 'root', '',$dbName);
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
  $sqldata = mysqli_query($con,"SELECT id_mshm, latin_name_mshm FROM `mushroom_mshm` ORDER BY latin_name_mshm");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  return $rows;
}

/**
 * updates the sumbission table when a mushroom is confirmed
 */
function confirm_location(){
   global $dbName;
    $con=getConn();//mysqli_connect ("localhost", 'root', '',$dbName);
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $id =$_GET['id'];
    $confirmed =$_GET['confirmed'];
    // update location with confirm if admin confirm.
    $query = "update submission_sub set id_mshm = $confirmed WHERE id_sub = $id ";
    
    $result = mysqli_query($con,$query);
  //  $new_id =mysqli_insert_id($con);
  
    $query = "update image_img set id_mshm = $confirmed WHERE id_sub = $id ";
    $result = mysqli_query($con,$query);
    echo "$id - Inserted Successfully: $confirmed";
  
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

/**
 * finds all submissions from the submission table where the mushroom id is greater than 0, gets the images associated with the submission from the image table
 */
function get_confirmed_locations(){
   global $dbName;
    $con=getConn();//mysqli_connect ("localhost", 'root', '',$dbName);
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"
    select s.id_sub ,latitude_sub,longitude_sub,description_sub,s.id_mshm as isconfirmed, latin_name_mshm, common_name_mshm, image1, image2,date_found_sub from submission_sub s JOIN mushroom_mshm m ON s.id_mshm = m.id_mshm
    LEFT JOIN view_sub_images v ON s.id_sub = v.id_sub
    WHERE s.id_mshm > 0
    ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

/**
 * finds all sumissions from the submission table and the assoctiated images from the image table
 */
function get_all_locations(){
    $con=getConn();//mysqli_connect ("localhost", 'root', '',$dbName);
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    
    $sqldata = mysqli_query($con,"
    select s.id_sub ,latitude_sub,longitude_sub,description_sub,id_mshm as isconfirmed, image1, image2,date_found_sub 
    from submission_sub s LEFT JOIN view_sub_images v ON s.id_sub = v.id_sub
    ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
  
}

/**
 * Flatten a multi-dimensional array into a single level.
 * 
 * @param array $array array to be flattened 
 *                                           
 * returns result                                           
 */
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>