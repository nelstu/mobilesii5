<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$search = utf8_encode($_GET['term']);
// Initialize variable for database credentials
include "conex.php";

//Create database connection
  $dblink = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

//Check connection was successful
  if ($dblink->connect_errno) {
     printf("Failed to connect to database");
     exit();
  }

//Fetch 3 rows from actor table
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un FROM productos WHERE `producto` LIKE '%$search%' and estado='Activo'");

//Initialize array variable 
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
 echo json_encode($dbdata);
 
?>
