<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$search = $_POST['nped'];

include "conex.php";
// Create connection
$conn = new mysqli($dbhost ,$dbuser, $dbpass , $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT id,Secuencia,Locales,estado FROM `rutas_asignadas_locales`  ORDER BY Secuencia ASC";

$sql = "SELECT id,ide,producto,cant,precio FROM detpedidof where ide=".$search;
// and fecha='".$search."'

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
    
    
     $return[] = array(
          'id' => $row['id'],
          'producto' => $row['producto'],
          'cant' => $row['cant'],
          'precio' => utf8_encode($row['precio']),
          );
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($return) ;
?>
