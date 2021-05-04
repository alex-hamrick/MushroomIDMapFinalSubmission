<?php

/**
 * creates path to files
 * 
 * @param string $script_path Path to file
 *                                    
 * returns path                                    
 */
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

/**
 * encods a string to be used in a query part of a URL
 * 
 * @param string [$string=""] string to be encoded
 *                                         
 * returns encoded string                                        
 */
function u($string="") {
  return urlencode($string);
}

/**
 * returns string 
 * 
 * @param string [$string=""] string to be returned
 *                                         
 * returns htmlspecialcharacters string                                         
 */
function h($string="") {
  return htmlspecialchars($string);
}

/**
 * displays error 404
 */
function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

/**
 * displays error_500
 */
function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

/**
 * redirects to locations
 * @param string $location location that is being redirected to
 */
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

/**
 * function that sends request to the post method
 */
function is_post_request() {
//  echo($_SERVER['REQUEST_METHOD']);
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * function that sends request to the get method
 */
function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

?>
