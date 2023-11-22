<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_pagos;");
$pagos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Pagos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID Pago</th>
					<th>Fecha pago</th>
					<th>Metodo de pago</th>
					<th>Id factura</th>
					<th>Hora de pago</th>
					<th>Referencia de pago</th>
					<th>Atrasos</th>
					<th>Estado de pago</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pagos as $pago){ ?>
				<tr>
					<td><?php echo $pago->id ?></td>
					<td><?php echo $pago->fechapago ?></td>
					<td><?php echo $pago->metodopago ?></td>
					<td><?php echo $pago->idfactura ?></td>
					<td><?php echo $pago->horapago ?></td>
					<td><?php echo $pago->referpago ?></td>
					<td><?php echo $pago->atrasos ?></td>
					<td><?php echo $pago->estadopago ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $pago->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $pago->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>