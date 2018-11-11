
<h3>Listado de doctores</h3>
<div class="table-responsive">
	<table class="tabla col-md-12">
	    <thead class="tabla-th">
	      <tr>
	        <th>Apellido</th>
	        <th>Nombre</th>
	        <th>Cédula</th>
	        <th>Especialización</th>
	        <th></th>
	        <th></th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($mostrarDoctores as $datos): ?>
	    	<tr>
	    		
	    		<td><span class="text-center"><?php echo $datos->Apellido ?></span></td>
	    		<td><span class="text-center"><?php echo $datos->Nombre ?></span></td>
	    		<td><span class="text-center"><?php echo $datos->Cedula ?></span></td>
	    		<td><span class="text-center"><?php echo $datos->Lugar_Especializacion ?></span></td>
	    		
	    		
	    		<td><a href="<?php echo base_url('index.php/Admin/editar_doctor/'.$datos->idDoctores) ?>" class="btn btn-info"><span class="fui-new"></span></a></td>

	    		<td><a onclick="javascript:borrar(<?php echo $datos->idDoctores ?>,'doctor')"  class="btn btn-danger"><span class="fui-trash"></span></a></td>

	    		<td><a href="<?php echo base_url('index.php/Admin/perfil_doctor?id='.$datos->idDoctores) ?>" class="btn btn-inverse">Ver todo <span class="fui-arrow-right"></span></a></td>
	    	</tr>
	    <?php endforeach ?>
	    </tbody>
	</table>
</div>


<div id='div-imagenFlotante'>
  <a href='<?php echo base_url('index.php/Admin/nuevo_Doctor'); ?>'>
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/agregar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>REGISTRAR NUEVO DOCTOR</strong>
  </div>
</div>


