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
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }
  if (($searchu==402)){
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }
  if (($searchu==403)){
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }
  if (($searchu==404)){
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }
  if (($searchu==405)){
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }

  if (($searchu==406)){
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=3";
  $result = $dblink->query($sql);
  }


  if (($searchu<>401) and ($searchu<>402) and ($searchu<>403) and ($searchu<>404)  and ($searchu<>405) and ($searchu<>406)){
  //$sql="SELECT codigo,producto,venta,venta2,un,familia,estado FROM detlista WHERE  (estado='Activo') AND (producto LIKE '%".$tearm."%') AND ide=4 ";
  
  $sql="SELECT detlista.codigo,detlista.producto,detlista.venta,detlista.venta2,detlista.un,detlista.familia,detlista.estado,productos.stock_actual FROM detlista INNER JOIN productos ON productos.codigo=detlista.codigo WHERE (detlista.estado='Activo') AND (detlista.producto LIKE '%".$tearm."%') AND detlista.ide=4";
  $result = $dblink->query($sql);
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
