
<h3>Registrar nueva secretaria/o</h3>
		<p><i class="fa fa-dot-circle"></i> &nbsp; Rellenar cada campo con la información correspondiente del perfil a registrar.</p>
		<hr>

<form action="<?php echo base_url('index.php/secretary/nuevoPerfil') ?>" method="POST">
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
		        <input type="number" name="Cedula" class="form-control" id="Cedula" onkeyup="calcularLogintud(13, 'Cedula', 'div-cedula')" maxlength="13" placeholder="Cedula" required>
		    </div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
		        <label for="FechaNacimiento">Fecha de Nacimiento</label>
		        <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" placeholder="Fecha de Nacimiento" required>
		    </div>
		    <div class="form-group" id="div-telefono">
		        <label for="Telefono_Celular">Telefono</label>
		        <input type="number" name="Telefono_Celular" onkeyup="calcularLogintud(10, 'Telefono_Celular', 'div-telefono')" maxlength="10" class="form-control" id="Telefono_Celular" placeholder="Telefono" required>
		    </div>

		    <div class="form-group">
			    <label for="Correo">Correo</label>
			    <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" required>
			</div>
		</div>

		    <div class="col-md-12">
		    	<input type="submit" value="Agregar secretaria/o" class="btn btn-inverse">
		    	<input type="reset" value="Limpiar" class="btn btn-info">
		    </div>
</form>


