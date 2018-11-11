
<div class="row">
		<h3>Listado de secretarias/os</h3>

</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="tabla col-md-12">
			    <thead class="tabla-th">
			      <tr>
			        <th>Apellido</th>
			        <th>Nombre</th>
			        <th>Cedula</th>
			        <th>Correo</th>
			        <th></th>
			        <th></th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php foreach ($mostrarSecretary as $datos): ?>
			    	<tr>
			    		<td><span class="text-center"><?php echo $datos->Apellido ?></span></td>
			    		<td><span class="text-center"><?php echo $datos->Nombre ?></span></td>
			    		<td><span class="text-center"><?php echo $datos->Cedula ?></span></td>
			    		<td><span class="text-center"><?php echo $datos->Correo ?></span></td>
			    		
			    		<td><a href="<?php echo base_url('index.php/secretary/editar/'.$datos->idSecretaria) ?>" class="btn btn-info"><span class="fui-new"></span></a></td>
						
			    		<td><a title="Borrar" onclick="javascript:borrar(<?php echo $datos->idSecretaria ?>, 'secretarias')"  class="btn btn-danger"><span class="fui-trash"></span></a></td>

			    		<td><a title="Ver más" href="<?php echo base_url('index.php/secretary/perfil_secretary?id='.$datos->idSecretaria) ?>" class="btn btn-inverse">Ver todo <span class="fui-arrow-right"></span></a></td>
			    	</tr>
			    <?php endforeach ?>
			    </tbody>
			</table>
		</div>
	</div>
</div>


<div id='div-imagenFlotante'>
  <a href='<?php echo base_url('index.php/secretary/nuevo'); ?>'>
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/agregar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>REGISTRAR NUEVA SECRETARIA/O</strong>
  </div>
</div>


