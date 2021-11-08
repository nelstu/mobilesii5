<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

include "conex.php";

$ulogin = $_POST["ulogin"];
$uclave = $_POST["uclave"];

// Create connection
$conn = new mysqli($dbhost ,$dbuser, $dbpass , $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT usuario,pass FROM `usuarios` WHERE usuario='".$ulogin."'  and pass='".$uclave."'";

$result = $conn->query($sql);
$return=false;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $return=true; 
      }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($return) ;
?>
