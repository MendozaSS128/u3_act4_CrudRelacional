<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Factura</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Factura realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Factura cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Factura quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> La Factura que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>La Factura está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la factura
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="idfactura">Escribe el id de factura:</label>
		<input autocomplete="off" autofocus class="form-control" name="idfactura" required type="text" id="idfactura" placeholder="Escribe el id de la factura">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Fecha pago</th>
				<th>Metodo de pago</th>
				<th>Id factura</th>
				<th>Hora de pago</th>
				<th>Atrasos</th>
				<th>Estado de pago</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $pago) {
				/*$granTotal += $pagos->total;*/
			?>
				<tr>
					<td><?php echo $pago->id ?></td>
					<td><?php echo $pago->fechapago ?></td>
					<td><?php echo $pago->metodopago ?></td>
					<td><?php echo $pago->idfactura ?></td>
					<td><?php echo $pago->horapago ?></td>
					<td><?php echo $pago->atrasos ?></td>
					<td><?php echo $pago->estadopago ?></td>
					
					<td><?php echo $pago->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form action="./terminarVenta.php" method="POST">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>