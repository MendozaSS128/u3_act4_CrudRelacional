<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
<h1>Nuevo pago</h1>
	<form method="post" action="nuevo.php">
		<label for="fechapago">Fecha pago:</label>
		<input class="form-control" name="fechapago" required type="date" id="fechapago" placeholder="Escribe el código">

		<label for="metodopago">Metodo de pago:</label>
		<input class="form-control" name="metodopago" required type="text" id="metodopago" placeholder="Escribe el metodo de pago">

		<label for="idfactura">Id factura:</label>
		<input class="form-control" name="idfactura" required type="number" id="idfactura" placeholder="Escribe el id de factura">

		<label for="horapago">Hora de pago:</label>
		<input class="form-control" name="horapago" required type="time" id="horapago" placeholder="Hora de pago">

		<label for="referpago">Referencia de pago:</label>
		<input class="form-control" name="referpago" required type="text" id="referpago" placeholder="Escribe referencia del pago">

		<label for="atrasos">Atrasos:</label>
		<input class="form-control" name="atrasos" required type="text" id="atrasos" placeholder="Atrasos">
		
		<label for="estadopago">Estado de pago:</label>
		<input class="form-control" name="estadopago" required type="text" id="estadopago" placeholder="Estado de pago">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>