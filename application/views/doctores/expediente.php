<?php 
	foreach ($obtenerExpediente as $datosConsulta) {}
	foreach ($listadoPacienteExp as $datosPacientes) {}
?>
<h3>Expediente medico</h3>
<hr>
<div class="row">
	<div class="col-md-3 col-lg-3 col-sm-3">
		
		<div class="info">
			<h4><?php echo $datosPacientes->Nombre . ' ' . $datosPacientes->Apellido?></h4>
			<ul class="list-unstyled">
				<li><i class="fa fa-user-circle"></i>&nbsp; <span class="encabezado">Cedula:</span> Paciente</li>
				<li><i class="fa fa-user-circle"></i>&nbsp; Paciente</li>
				<li><i class="fa fa-envelope"></i> &nbsp; <span class="encabezado">Fecha de nacimiento:</span><?php echo $datosPacientes->Fecha_Nacimiento ?></li>
				<li><i class="fa fa-address-card"></i> &nbsp;</li>
			</ul>
		</div>
	</div>
	<hr>

	<div class="col-md-9">
		<ul>
			<li><span class="encabezado">Sintomas</span></li>
			<?php  
				foreach ($obtenerExpediente as $datosConsulta) {
				$Sintomas = str_replace(',', ', ', $datosConsulta->Sintomas);
				echo "<p>$Sintomas</p>";
			}
			?>
			<li><span class="encabezado">Alergias</span></li>
			<?php  
				foreach ($obtenerExpediente as $datosConsulta) {
				$Alergias = str_replace(',', ', ', $datosConsulta->Alergias);
				echo "<p>$Alergias</p>";
			}
			?>
			<li><span class="encabezado">Estudios indicados</span></li>
			<?php  
				foreach ($obtenerExpediente as $datosConsulta) {
				$Estudios_Laboratorios = str_replace(',', ', ', $datosConsulta->Estudios_Laboratorios);
				echo "<p>$Estudios_Laboratorios</p>";
			}
			?>

			<li><span class="encabezado">Diagnostico(s)</span></li>
			<?php echo $datosConsulta->Diagnostico ?>
		</ul>
		
	</div>
	
</div>
<div id='div-imagenFlotante'>
  <a href="<?php echo base_url('index.php/doctor/consulta/'. $id) ?>">
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/editar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>EDITAR EXPEDIENTE</strong>
  </div>
</div>
