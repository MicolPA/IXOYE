
<div class="container">
	<h3 class="text-center contenedor">Reservar nueva cita</h3>
	<p class="text-center">Reserva tu cita otorgando la especialidad (solo si posee un referimiento del area), dia y hora.</p>

	<div class="contenedorSec">
		
	</div>

	<div class="row">
	</div>

	<form method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img class="nCita" src="<?php echo base_url('assets/images/n1.png') ?>" width="100px">
					<h4 class="card-title">Elegir departamento</h4>
					<select name="DepartamentoCita" id="DepartamentoCita" data-toggle="select" class="form-control select select-info">
						<option value="">Elegir departamento</option>
						<?php foreach ($obtenerDepartamentos as $datos): ?>
					        	<option value="<?php echo $datos->idDepartamento; ?> "><?php echo $datos->Nombre; ?></option>
					    <?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img id="imgN2" class="nCita" src="<?php echo base_url('assets/images/n2-disabled.png') ?>" width="100px">
					<h4 class="card-title n2">Elegir fecha</h4>
					<input type="date" class="form-control" id="FechaCita" name="FechaCita" min="<?php echo date('Y-m-d');?>" max="2018-12-31">
				</div>
			</div>
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img id="imgN3" class="nCita" src="<?php echo base_url('assets/images/n3-disabled.png') ?>" width="100px">
					<h4 class="card-title n3">Elegir hora</h4>
					<input type="time" id="HoraCita" name="HoraCita" class="form-control" min="08:00" max="18:00" placeholder="Hora">
				</div>
			</div>
		</div>


		<div class="row margin_bottom_full contenedorSec">
			<div class="col-md-12">
				<input type="submit" id="btnRealizarCita" name="RealizarCita" class="contenedor cardBox btn btn-info btn-lg btn-block " value="Confirmar cita">
			</div>
		</div>

	</form>


</div>