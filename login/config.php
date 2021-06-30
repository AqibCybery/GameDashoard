<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u377115506_aqibhan143');
define('DB_PASSWORD', 'Aqibtouseefsoftwarehouse@123');
define('DB_NAME', 'u377115506_Unity3D');
 
 // private $db_host = 'localhost';
   // private $db_name = 'u377115506_Unity3D';
   // private $db_user = 'u377115506_aqibhan143';
  //  private $db_pword = 'Aqibtouseefsoftwarehouse@123';
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>