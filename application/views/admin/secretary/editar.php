
	<h3>Modificar perfil <?php foreach ($datosSecretary as $mostrarSecretary):  ?>
		<p><i class="fa fa-user-circle"></i> &nbsp; Dr.  <?php echo $mostrarSecretary->Nombre .' '. $mostrarSecretary->Apellido ?></p>
		<?php endforeach ?>
	
	<hr>
	<form action="<?php echo base_url('index.php/secretary/actualizarDatosSecretary') ?>" method="POST">
		<input type="hidden" name="id" value="<?php echo $mostrarSecretary->idSecretaria?>">
		
		<div class="col-md-6">
			<div class="form-group">
		        <label for="Nombre">Nombre</label>
		        <input type="text" name="nombre" class="form-control" id="Nombre" placeholder="Nombre" value="<?php echo $mostrarSecretary->Nombre; ?> " required>
		    </div>
		    <div class="form-group">
		        <label for="Apellido">Apellido</label>
		        <input type="text" name="Apellido" class="form-control" id="Apellido" placeholder="Apellido" value="<?php echo $mostrarSecretary->Apellido; ?>" required>
		    </div>
		    <div class="form-group">
		        <label for="Cedula">Cedula</label>
		        <input type="number" name="Cedula" class="form-control" id="Cedula" placeholder="Cedula" value="<?php echo $mostrarSecretary->Cedula; ?>" required>
		    </div>
		</div>

	    <div class="col-md-6">
	    	<div class="form-group">
		        <label for="FechaNacimiento">Fecha de Nacimiento</label>
		        <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" placeholder="Fecha de Nacimiento" value="<?php echo $mostrarSecretary->Fecha_Nacimiento; ?>" required>
		    </div>
		    <div class="form-group">
		        <label for="Telefono_Celular">Telefono</label>
		        <input type="number" name="Telefono_Celular" class="form-control" id="Telefono_Celular" placeholder="Telefono" value="<?php echo $mostrarSecretary->Telefono_Celular; ?>" required>
		    </div>
	    	<div class="form-group">
		        <label for="Correo">Correo</label>
		        <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" value="<?php echo $mostrarSecretary->Correo; ?>" required>
		    </div>
		</div>

		    <div class="col-md-12">
		    	<input type="submit" value="Guardar cambios" class="btn btn-inverse">
		    </div>
</form>
