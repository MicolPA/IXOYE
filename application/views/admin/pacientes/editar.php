<?php foreach ($datosPaciente as $datos): ?>
	
<?php endforeach ?>
<div class="row">
	<div class="col-md-12">
		<h3>Editar información del paciente</h3>
		<p><i class="fa fa-user-circle"></i> &nbsp; <?php echo $datos->Nombre . ' ' . $datos->Apellido ?></p>
		<hr>
	</div>
</div>
	

<form action="<?php echo base_url('index.php/pacientes/actualizarDatosPaciente') ?>" method="POST">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $datos->id ?>">
			        <label for="Nombre">Nombre</label>
			        <input type="text" name="nombre" class="form-control" id="Nombre" value="<?php echo $datos->Nombre ?>" required>
			    </div>
			    <div class="form-group">
			        <label for="Apellido">Apellido</label>
			        <input type="text" name="Apellido" class="form-control" id="Apellido"value="<?php echo $datos->Apellido ?>" required>
			    </div>
			    <div class="form-group" id="div-cedula">
			        <label for="Cedula">Cedula</label>
			        <input type="number" name="Cedula" class="form-control" id="Cedula" onkeyup="calcularLogintud(13, 'Cedula', 'div-cedula')" max="13" value="<?php echo $datos->Cedula ?>" required>
			    </div>
			    <div class="form-group">
			    	<label for="Sexo">Sexo</label>
			    	<label class="radio">
	                <input type="radio" data-toggle="radio" name="Sexo" id="Sexo1" value="Femenino" data-radiocheck-toggle="radio" required <?php echo($datos->Sexo == 'Femenino')?  'checked':'' ?>>
	                	Femenino
	              </label>
				
				<?php echo !empty($user['nombre'])?$user['nombre']:''; ?>

	              <label class="radio">
	                <input type="radio" data-toggle="radio" name="Sexo" id="Sexo2" value="Masculino" data-radiocheck-toggle="radio" required <?php echo($datos->Sexo == 'Masculino')?  'checked':'' ?>>
	                 	Masculino
	              </label>
			    </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
			        <label for="FechaNacimiento">Fecha de Nacimiento</label>
			        <input type="date" name="FechaNacimiento" class="form-control" id="FechaNacimiento" value="<?php echo $datos->Fecha_Nacimiento ?>" required>
			    </div>
			    <div class="form-group" id="div-telefono">
			        <label for="Telefono_Celular">Telefono</label>
			        <input type="number" name="Telefono_Celular" onkeyup="calcularLogintud(10, 'Telefono_Celular', 'div-telefono')" maxlength="10" class="form-control" id="Telefono_Celular" value="<?php echo $datos->Telefono_Celular ?>" required>
			    </div>

			    <div class="form-group">
				    <label for="Correo">Correo</label>
				    <input type="email" name="Correo" class="form-control" id="Correo" value="<?php echo $datos->Correo ?>" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 form-group">
				<a  id="mostrarFormSeguro" class="btn btn-primary" style="width: 100%">Agregar información de seguro medico </a>
			</div>
		</div>
		
		<div class="row">
			<div class="FormSeguro mostrar">
				<div class="col-md-6">
					<div class="form-group">
				        <label for="Seguro">Seguro</label>
				        <select data-toggle="select" id="Nombre_Seguro" name="Nombre_Seguro" class="form-control select select-default">
				        	<?php 
				        			$query = $this->db->query("SELECT * FROM paciente_asegurado WHERE Paciente_idCliente = {$_GET['id']}");
									$infoSeguro = $query->result();
									$cantidad = mysqli_num_rows($infoSeguro);
									
									if ($cantidad != null) {
										$id = $infoSeguro[0]->Seguro_idSeguro;

					        			$query = $this->db->query("SELECT Nombre_Seguro FROM seguro WHERE idSeguro = $id");

					        			$query = $query->result();
					        			$nombreSeguro = $query[0]->Nombre_Seguro;
									} 

				        		 ?>
				        	<option>

								<?php echo !empty($nombreSeguro)?$nombreSeguro : '-- Selecione el seguro --' ?>
				        	</option>
				          <?php foreach ($mostrarSeguros as $seguros): ?>
				          	<option ><?php echo $seguros->Nombre_Seguro ?></option>
				          <?php endforeach ?>
				        </select>
				    </div>
				    <div class="form-group">
				        <label for="Poliza">Poliza</label>
				        <input type="number" name="Poliza" class="form-control" id="Poliza" value="<?php echo !empty($infoSeguro[0]->Poliza)?$infoSeguro[0]->Poliza: '' ?>">
				    </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
				        <label for="Tipo_Seguro">Tipo de seguro</label>
				      <select data-toggle="select" id="Tipo_Seguro" name="Tipo_Seguro" class="form-control select select-default">
				        	<option value="Seguro 1">Seguro 1</option>
				        	<option value="Seguro 1">Seguro 1</option>
				        </select>
				    </div>
				    <div class="form-group">
						<label for="">Borrar información</label><br>
				    	<input type="button" class="btn btn-danger " onclick="borrarInfoSeguro()" value="Borrar información del seguro">
				    </div>
				</div>
			</div>
		</div>

		<div class="row">
		    <div class="col-md-12">
			    <input type="submit" value="Guardar cambios" class="btn btn-inverse">
			</div>
		</div>
</form>


