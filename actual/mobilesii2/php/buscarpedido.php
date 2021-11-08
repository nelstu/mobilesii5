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

$sql = "SELECT id,cliente,estado,total,fecha,user FROM pedido where id=".$search;
// and fecha='".$search."'

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
    
    
     $return[] = array(
          'id' => $row['id'],
          'cliente' => $row['cliente'],
          'user' => $row['user'],
          'estado' => utf8_encode($row['estado']),
          'total' => ($row['total']),
         

       );
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($return) ;
?>
