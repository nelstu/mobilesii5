<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$search = $_POST['aesfe'];
$search2 = $_POST['auser'];
include "conex.php";
$aesfe=$_POST['aesfe'];
// Create connection
$conn = new mysqli($dbhost ,$dbuser, $dbpass , $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT id,Secuencia,Locales,estado FROM `rutas_asignadas_locales`  ORDER BY Secuencia ASC";

$sql = "SELECT rutas_asignadas_locales.id,rutas_asignadas_locales.Secuencia,rutas_asignadas_locales.Locales,rutas_asignadas_locales.Estado ,rutas_asignadas_locales.ide,rutas_asignadas.Desde,rutas_asignadas.Hasta,rutas_asignadas.Usuario FROM rutas_asignadas INNER JOIN rutas_asignadas_locales ON rutas_asignadas.id = rutas_asignadas_locales.ide where rutas_asignadas.Usuario='$search2' and rutas_asignadas.Desde>='$search' and rutas_asignadas.Hasta<='$search' order by rutas_asignadas_locales.Locales";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
    
    
     $return[] = array(
          'id' => $row['id'],
          'Locales' => utf8_encode($row['Locales']),
          'Secuencia' => ($row['Secuencia']),
          'Estado' => ($row['Estado']),
          'Desde' => ($row['Desde']),
          'Hasta' => ($row['Hasta']),
          'Usuario' => ($row['Usuario']),

       );
    }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($return) ;
?>
