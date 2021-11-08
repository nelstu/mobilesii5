<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$prodArr = json_decode($_POST["prod"]);
$unArr = json_decode($_POST["un"]);
$canArr = json_decode($_POST["can"]);
$prArr = json_decode($_POST["pr"]);

//dos
include "conex.php";

$cliente = $_POST["cli"];
$user = $_POST["user"];



// Create connection
$conn = new mysqli($dbhost ,$dbuser, $dbpass , $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO pedido (user,cliente) ";
$sql .= "VALUES ('$user','$cliente')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $ultimo_id = $conn->insert_id;
    $total=0;
    for ($i = 0; $i < count($prodArr); $i++) {
          $sql2 = "INSERT INTO detpedidof (ide,producto,cant,precio) ";
          $sql2 .= "VALUES ($ultimo_id,'$prodArr[$i]',$canArr[$i],$prArr[$i])";
          if ($conn->query($sql2) === TRUE) {
           $total=$total+($canArr[$i]*$prArr[$i]);
          }
       } 
    }

   $sql3="UPDATE pedido  set total=$total where id=".$ultimo_id;
                if ($conn->query($sql3) === TRUE) {
                  
                    }

 //actualizar ruta

$sql4="UPDATE rutas_asignadas_locales  set Estado='Por Facturar' where Locales='".$cliente."'";
                if ($conn->query($sql4) === TRUE) {
                  
                    }




    

$conn->close();
echo('Added Successfully');
?>
