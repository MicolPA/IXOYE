
<h3>Registrar doctor</h3>
		<p><i class="fa fa-dot-circle"></i> &nbsp; Rellenar cada campo con la información correspondiente del doctor a registrar.</p>
		<hr>

<form action="<?php echo base_url('index.php/Admin/agregarDoctor') ?>" method="POST">
		<div class="col-md-6">
			<div class="form-group">
	        <label for="Nombre">Nombre</label>
	        <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" required>
	    </div>
	    <div class="form-group">
	        <label for="Apellido">Apellido</label>
	        <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Apellido" required>
	    </div>
	    <div class="form-group" id="div-cedula">
	        <label for="Cedula">Cedula</label>
	        <input type="number" name="Cedula" class="form-control" id="Cedula" onkeyup="calcularLogintud(13, 'Cedula', 'div-cedula')" placeholder="Cedula" required>
	    </div>
	    <div class="form-group">
	        <label for="FechaNacimiento">Fecha de Nacimiento</label>
	        <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" placeholder="Fecha de Nacimiento" required>
	    </div>
	    <div class="form-group" id="div-telefono">
	        <label for="Telefono_Celular">Telefono</label>
	        <input type="number" name="Telefono_Celular" onkeyup="calcularLogintud(10, 'Telefono_Celular', 'div-telefono')" maxlength="10" class="form-control" id="Telefono_Celular" placeholder="Telefono" required>
	    </div>
	   
		</div>
	    <div class="col-md-6">
	    	<div class="form-group">
		        <label for="Correo">Correo</label>
		        <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" required>
		    </div>
	    	<div class="form-group">
		        <label for="Estudios_Realizados">Estudios Realizados</label>
		        <input type="text" name="Estudios_Realizados" class="form-control" id="Estudios_Realizados" placeholder="Estudios Realizados" required>
		    </div>

		    <div class="form-group">
		        <label for="Lugar_Especializacion">Especialización</label>
		        <select data-toggle="select" name="Lugar_Especializacion" class="form-control select select-default" id="Lugar_Especializacion" required>
		        	<option></option>
		        	<?php foreach ($obtenerDepartamentos as $datos): ?>
		        		<option value="<?php echo $datos->idDepartamento; ?> "><?php echo $datos->Nombre; ?></option>
		        	<?php endforeach ?>
		        </select>
		    </div>

		    <div class="form-group">
		        <label for="Facultad_graduo">Facultad donde realizó sus estudios</label>
		        <input type="text" name="Facultad_graduo" class="form-control" id="Facultad_graduo" placeholder="Facultad donde realizó sus estudios" required>
		    </div>
		    <div class="form-group">
		        <label for="Direccion_Consultorio">Consultorio</label>
		        <input type="text" name="Direccion_Consultorio" class="form-control" id="Direccion_Consultorio" placeholder="Consultorio" required>
		    </div>
		    </div>

		    <div class="col-md-12">
		    	<input type="submit" value="Agregar doctor" class="btn btn-inverse">
		    </div>
</form>


