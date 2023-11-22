<?php
if(!isset($_POST["total"])) exit;


session_start();


$estadodepago = $_POST["total"];
include_once "base_de_datos.php";


$fechavenci = date("Y-m-d H:i:s");

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_factura(fechavenci, montototal) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id FROM tbl_factura ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
$idCliente = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO tbl_cantidadpagos(id, hora, cantidad, idfac) VALUES (?, ?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE tbl_pagos SET atrasos = atrasos - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $pago) {
	$cantidad += $pago->cantidad;
	$sentencia->execute([$pago->id, $idfactura, $pago->cantidad]);
	$sentenciaExistencia->execute([$pago->cantidad, $pago->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>