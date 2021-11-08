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

//Fetch 3 rows from actor table
  if (($searchu==401)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,ide,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=3 ");
  }
  if (($searchu==402)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,ide,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=3 ");
  }
  if (($searchu==403)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,ide,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=3 ");
  }
  if (($searchu==404)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,ide,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=3 ");
  }
  if (($searchu==405)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,ide,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=3 ");
  }
  if (($searchu<>401) and ($searchu<>402) and ($searchu<>403) and ($searchu<>404)  and ($searchu<>405)){
  $result = $dblink->query("SELECT codigo,producto,venta,venta2,un,familia,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=4 ");
  }
//Initialize array variable 
  $dbdata = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

//Print array in JSON format
 echo json_encode($dbdata);
 
?>
