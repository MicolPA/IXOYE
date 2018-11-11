

<?php foreach ($perfil_doctor as $datos): ?>
<?php endforeach ?>


<div class="row">
	<div class="col-md-6 col-lg-6 col-sm-6">
		<h4>Información personal</h4>
		<hr>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Nombre</span>
		<p><?php echo $datos->Nombre . ' ' . $datos->Apellido?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Cedula</span>
		<p><?php echo $datos->Cedula ?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Fecha de nacimiento</span>
		<p><?php echo $datos->Fecha_Nacimiento ?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Telefono</span>
		<p><?php echo $datos->Telefono_Celular ?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Correo</span>
		<p><?php echo $datos->Correo ?></p>
	</div>
	<div class="col-md-6 col-lg-6 col-sm-6">
		<h4>Departamento</h4>
		<hr>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Especialización</span>
		<p><?php echo $datos->Lugar_Especializacion?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Consultorio</span>
		<p><?php echo $datos->Direccion_Consultorio ?></p>
		<h4>Información academica</h4>
		<hr>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Estudios realizados</span>
		<p><?php echo $datos->Estudios_Realizados ?></p>
		<span class="encabezado"><i class="fa fa-caret-right"></i>&nbsp; Lugar especialización</span>
		<p><?php echo $datos->Lugar_Especializacion ?></p>
	</div>
</div>
<div id='div-imagenFlotante'>
  <a href="<?php echo base_url('index.php/Admin/editar_doctor/'.$datos->idDoctores) ?>">
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/editar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>EDITAR PERFIL DEL DOCTOR</strong>
  </div>
</div>

<style>
	.encabezado{
		font-weight: bold;
	}
</style>