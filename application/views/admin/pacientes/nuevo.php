
<div class="row">
	<div class="col-md-12">
		<h3>Registrar nuevo paciente</h3>
		<p><i class="fa fa-user-circle"></i> &nbsp; Rellenar cada campo con la información correspondiente del paciente a registrar.</p>
		<hr>
	</div>
</div>

<form action="<?php echo base_url('index.php/pacientes/nuevoPerfil') ?>" method="POST">
		<div class="row">
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
			    <div class="form-group">
			    	<label for="Sexo">Sexo</label>
			    	<label class="radio">
	                <input type="radio" data-toggle="radio" name="Sexo" id="Sexo1" value="Femenino" data-radiocheck-toggle="radio" required>
	                	Femenino
	              </label>
	              <label class="radio">
	                <input type="radio" data-toggle="radio" name="Sexo" id="Sexo2" value="Masculino" data-radiocheck-toggle="radio" required>
	                 	Masculino
	              </label>
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
		</div>

		<div class="row">
			<div class="col-md-12 form-group">
				<a  id="mostrarFormSeguro" class="btn btn-primary" style="width: 100%">Modificar la información de seguro medico </a>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group FormSeguro mostrar">
				<div class="col-md-6">
					<div class="form-group">
				        <label for="Seguro">Seguro</label>
				        <select data-toggle="select" name="Nombre_Seguro" class="form-control select select-default">
				          <?php foreach ($mostrarSeguros as $seguros): ?>
				          	<option><?php echo $seguros->Nombre_Seguro ?></option>
				          <?php endforeach ?>
				        </select>
				    </div>
				    <div class="form-group">
				        <label for="Poliza">Poliza</label>
				        <input type="number" name="Poliza" class="form-control" id="Poliza" placeholder="Poliza">
				    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				        <label for="Tipo_Seguro">Tipo de seguro</label>
				      <select data-toggle="select" name="Tipo_Seguro" class="form-control select select-default">
				        	<option value="Seguro 1">Seguro 1</option>
				        </select>
				    </div>
				</div>
			</div>
		</div>


		    <div class="row">
		    	<div class="col-md-12">
			    	<input type="submit" value="Agregar Paciente" class="btn btn-inverse">
			    	<input type="reset" value="Limpiar" class="btn btn-info">
			    </div>
		    </div>
</form>


