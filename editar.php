<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_pagos WHERE id = ?;");
$sentencia->execute([$id]);
$pagos = $sentencia->fetch(PDO::FETCH_OBJ);
if($pagos === FALSE){
	echo "¡No existe algún pagos con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar pagos con el ID <?php echo $pagos->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $pagos->id; ?>">
	
			<label for="fechapago">Fecha pago:</label>
			<input value="<?php echo $pagos->fechapago ?>" class="form-control" name="fechapago" required type="date" id="fechapago" placeholder="Escribe el código">

			<label for="metodopago">Metodo de pago:</label>
			<input value="<?php echo $pagos->metodopago ?>" class="form-control" name="metodopago" required type="text" id="metodopago" placeholder="Escribe el metodo de pago">

			<label for="idfactura">Id factura:</label>
			<input value="<?php echo $pagos->idfactura ?>" class="form-control" name="idfactura" required type="number" id="idfactura" placeholder="Escribe el id de factura">

			<label for="horapago">Hora de pago:</label>
			<input value="<?php echo $pagos->horapago ?>" class="form-control" name="horapago" required type="time" id="horapago" placeholder="Hora de pago">

			<label for="referpago">Referencia de pago:</label>
			<input value="<?php echo $pagos->referpago ?>" class="form-control" name="referpago" required type="number" id="referpago" placeholder="Escribe referencia del pago">

			<label for="atrasos">Atrasos:</label>
			<input value="<?php echo $pagos->atrasos ?>" class="form-control" name="atrasos" required type="number" id="atrasos" placeholder="Atrasos">

			<label for="estadopago">Estado de pago:</label>
			<input value="<?php echo $pagos->estadopago ?>" class="form-control" name="estadopago" required type="text" id="estadopago" placeholder="Estado de pagos">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
