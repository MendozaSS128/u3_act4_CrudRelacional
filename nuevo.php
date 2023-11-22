<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["fechapago"]) || !isset($_POST["metodopago"]) || !isset($_POST["idfactura"])  || !isset($_POST["horapago"]) || !isset($_POST["referpago"]) || !isset($_POST["atrasos"]) || !isset($_POST["estadopago"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$fechapago = $_POST["fechapago"];
$metodopago = $_POST["metodopago"];
$idfactura = $_POST["idfactura"];
$horapago = $_POST["horapago"];
$referpago = $_POST["referpago"];
$atrasos = $_POST["atrasos"];
$estadopago = $_POST["estadopago"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_pagos(fechapago, metodopago, idfactura, horapago, referpago, atrasos, estadopago) VALUES (?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$fechapago, $metodopago, $idfactura, $horapago, $referpago, $atrasos, $estadopago]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>