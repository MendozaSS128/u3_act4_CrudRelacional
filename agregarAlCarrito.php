<?php
if (!isset($_POST["idfactura"])) {
    return;
}

$idfactura = $_POST["idfactura"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_pagos WHERE idfactura = ? LIMIT 1;");
$sentencia->execute([$idfactura]);
$pago = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$pago) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($pago->atrasos < 0) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar pago dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->idfactura === $idfactura) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $pago->cantidad = 1;
    $pago->total = $pago->estadopago;
    array_push($_SESSION["carrito"], $pago);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->atrasos;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $pago->existencia) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    $_SESSION["carrito"][$indice]->atrasos++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->atrasos * $_SESSION["carrito"][$indice]->estadopago;
}
header("Location: ./vender.php");
