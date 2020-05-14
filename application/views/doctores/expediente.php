<?php 
	// foreach ($obtenerExpediente as $datosConsulta) {}
	foreach ($listadoPacienteExp as $datosPacientes) {}
	$datos = isset($obtenerExpediente[0])?$obtenerExpediente[0]:null;
?>
<style>
	.form-control{
		color:black !important;
	}
</style>
<h3>Expediente médico</h3>
<hr>
<div class="row">
	<div class="col-md-3 col-lg-3 col-sm-3">
		<img src="<?php echo base_url('assets/images/user1.png') ?>" width='60%'>
		<div class="info">
			<h4><?php echo $datosPacientes->Nombre . ' ' . $datosPacientes->Apellido?></h4>
			<ul class="list-unstyled">
				<li><i class="fa fa-user-circle"></i>&nbsp; <?= $datosPacientes->Cedula; ?></li>
				<li><i class="fa fa-envelope"></i> &nbsp; <?php echo $datosPacientes->Fecha_Nacimiento ?></li>
			</ul>
		</div>
		
	</div>

	<?php if ($datos): ?>
		<div class="col-md-9">
			<div class="form-group">
				<p class='texto-pt'>Sintomas</p>
				<input type="text" class="form-control" value="<?= $datos->Sintomas ?>" readonly>
			</div>
			
			<div class="form-group">
				<p class='texto-pt'>Alergias</p>
				<input type="text" class="form-control" value="<?= $datos->Alergias ?>" readonly>
			</div>
			<div class="form-group">
				<p class='texto-pt'>Estudios indicados</p>
				<input type="text" class="form-control" value="<?=  str_replace(',', ', ', $datos->Estudios_Laboratorios); ?>" readonly>
			</div>
			<div class="form-group">
				<p class='texto-pt'>Diagnostico</p>
				<input type="text" class="form-control" value="<?=  str_replace(',', ', ', $datos->Diagnostico); ?>" readonly>
			</div>
		</div>
	<?php else: ?>
	<div class="col-md-9">
		<h2>No posee ningun expediente aún.</h2>
	</div>	
	<?php endif ?>
	
</div>
<div id='div-imagenFlotante'>
  <a href="<?php echo base_url('index.php/doctor/consulta/'. $id) ?>">
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/editar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>EDITAR EXPEDIENTE</strong>
  </div>
</div>
