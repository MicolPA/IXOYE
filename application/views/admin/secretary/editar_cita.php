
<div class="container">
	<h3 class="text-center contenedor">Modificar cita</h3>
	<p class="text-center">Modifica todos los datos de tu cita y guarda los cambios</p>
	<div class="contenedorSec">
		
	</div>

	<div class="row">
	</div>

	<form method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img class="nCita" src="<?php echo base_url('assets/images/comprobado.png') ?>" width="100px">
					<h4 class="card-title">Elegir departamento</h4>
					<select name="DepartamentoCita" id="DepartamentoCita" data-toggle="select" class="form-control select select-info">
						<option value="<?php echo $datosCita[0]->DepartamentoID ?>">
							<?php 
								$id = $datosCita[0]->DepartamentoID;
								$query = $this->db->query("SELECT * FROM departamento WHERE idDepartamento = $id");
								$datoDept = $query->result();
								echo $datoDept[0]->Nombre;
						 	?>
						 	</option>

						<?php foreach ($obtenerDepartamentos as $datos): ?>
					        	<option value="<?php echo $datos->idDepartamento; ?> "><?php echo $datos->Nombre; ?></option>
					    <?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img id="imgN2" class="nCita" src="<?php echo base_url('assets/images/comprobado.png') ?>" width="100px">
					<h4 class="card-title">Elegir fecha</h4>
					<input type="date" class="form-control"  name="FechaCita" min="<?php echo date('Y-m-d');?>" max="2018-12-31" value="<?php echo $datosCita[0]->Fecha ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="cardBox text-center">
					<img id="imgN3" class="nCita" src="<?php echo base_url('assets/images/comprobado.png') ?>" width="100px">
					<h4 class="card-title">Elegir hora</h4>
					<input type="time" name="HoraCita" class="form-control" min="08:00" max="18:00" placeholder="Hora" value="<?php echo $datosCita[0]->Hora ?>">
				</div>
			</div>
		</div>


		<div class="row contenedorSec">
			<div class="col-md-12">
				<input type="submit" name="actualizarDatosCita" class="contenedor cardBox btn btn-info btn-lg btn-block" value="Guardar cambios">
			</div>
		</div>

	</form>
</div>


