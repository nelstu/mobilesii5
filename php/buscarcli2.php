<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$tearm= utf8_encode($_GET['term']);
$searchu = utf8_encode($_GET['us']);
// Initialize variable for database credentials
include "conex.php";

//Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$dblink-> set_charset("utf8");
//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }


  $result = $dblink->query("SELECT id,rut,nombre,direccion,comuna,ciudad FROM clientes  order by nombre ASC ");// WHERE `nombre` LIKE '%$tearm%' order by nombre");

//Initialize array variable
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
 echo json_encode($dbdata);

?>
