

<?php foreach ($perfil_secretary as $datos): ?>
<?php endforeach ?>


<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12">
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
</div>
<div id='div-imagenFlotante'>
  <a href="<?php echo base_url('index.php/secretary/editar/'.$datos->idSecretaria) ?>">
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/editar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>EDITAR PERFIL</strong>
  </div>
</div>

<style>
	.encabezado{
		font-weight: bold;
	}
</style>