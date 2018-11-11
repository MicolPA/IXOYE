
	<h3>Modificar perfil <?php foreach ($datosDoctor as $datosDoctor):  ?>
		<p><i class="fa fa-user-circle"></i> &nbsp; Dr.  <?php echo $datosDoctor->Nombre .' '. $datosDoctor->Apellido ?></p>
		<?php endforeach ?>
	
	<hr>
	<form action="<?php echo base_url('index.php/Admin/actualizarDatosDoctores') ?>" method="POST">
		<input type="hidden" name="id" value="<?php echo $datosDoctor->idDoctores?>">
		<div class="col-md-6">
			<div class="form-group">
	        <label for="Nombre">Nombre</label>
	        <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $datosDoctor->Nombre; ?> " required>
	    </div>
	    <div class="form-group">
	        <label for="Apellido">Apellido</label>
	        <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Apellido" value="<?php echo $datosDoctor->Apellido; ?>" required>
	    </div>
	    <div class="form-group">
	        <label for="Cedula">Cedula</label>
	        <input type="number" name="Cedula" class="form-control" id="Cedula" placeholder="Cedula" value="<?php echo $datosDoctor->Cedula; ?>" required>
	    </div>
	    <div class="form-group">
	        <label for="FechaNacimiento">Fecha de Nacimiento</label>
	        <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" placeholder="Fecha de Nacimiento" value="<?php echo $datosDoctor->Fecha_Nacimiento; ?>" required>
	    </div>
	    <div class="form-group">
	        <label for="Telefono_Celular">Telefono</label>
	        <input type="number" name="Telefono_Celular" class="form-control" id="Telefono_Celular" placeholder="Telefono" value="<?php echo $datosDoctor->Telefono_Celular; ?>" required>
	    </div>
	   
		</div>
	    <div class="col-md-6">
	    	<div class="form-group">
		        <label for="Correo">Correo</label>
		        <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" value="<?php echo $datosDoctor->Correo; ?>" required>
		    </div>
	    	<div class="form-group">
		        <label for="Estudios_Realizados">Estudios Realizados</label>
		        <input type="text" name="Estudios_Realizados" class="form-control" id="Estudios_Realizados" placeholder="Estudios Realizados" value="<?php echo $datosDoctor->Estudios_Realizados; ?>" required>
		    </div>

		    <div class="form-group">
		        <label for="Lugar_Especializacion">Especialización</label>
		        <select id="SelectLugar_Especializacion" data-toggle="select" name="Lugar_Especializacion" class="form-control select select-default" id="Lugar_Especializacion" onkeyup="selectDepartamento()" required>
		        	<option></option>
		        	<?php foreach ($obtenerDepartamentos as $datos): ?>
		        		<option value="<?php echo $datos->idDepartamento; ?> "><?php echo $datos->Nombre; ?></option>
		        	<?php endforeach ?>
		        </select>

		    </div>

		    <div class="form-group">
		        <label for="Facultad_graduo">Facultad donde realizó sus estudios</label>
		        <input type="text" name="Facultad_graduo" class="form-control" id="Facultad_graduo" placeholder="Facultad donde realizó sus estudios" value="<?php echo $datosDoctor->Facultad_graduo; ?>" required>
		    </div>
		    <div class="form-group">
		        <label for="Direccion_Consultorio">Consultorio</label>
		        <input type="text" name="Direccion_Consultorio" class="form-control" id="Direccion_Consultorio" placeholder="Consultorio" value="<?php echo $datosDoctor->Direccion_Consultorio; ?>" required>
		    </div>
		    </div>

		    <div class="col-md-12">
		    	<input type="submit" value="Guardar cambios" class="btn btn-inverse">
		    </div>
</form>
