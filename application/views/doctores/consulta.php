<?php  
	
	$query = $this->db->query("SELECT * FROM consulta WHERE Paciente_idCliente = '$id'");
	$query = $query->result();

	if (empty($query)) {
		$tipo = 'Crear';
	} else {
		$tipo = 'Actualizar';
	}
?>
	
	<?php foreach ($query as $info): ?>
		
	<?php endforeach ?>



<h3>Registrar consulta</h3>
<form action="<?php echo base_url('index.php/doctor/') .$tipo ?>consulta/<?php echo $id;?>" method="POST">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="Peso">Peso</label>
				<input type="number" id="Peso" class="form-control" name="peso" value="<?php echo !empty($info->Peso)?$info->Peso:''?>" placeholder="Peso">
			</div>
			<div class="form-group">
				<label for="Estatura">Estatura</label>
				<input type="number" id="Estatura" class="form-control" name="estatura" value="<?php echo !empty($info->Estatura)?$info->Estatura:''?>" placeholder="Estatura">
			</div>
			<div class="form-group">
				<label for="Presión arterial">Presión arterial</label>
				<input type="number" id="Presión arterial" name="presionArterial" value="<?php echo !empty($info->Presion_arterial)?$info->Presion_arterial:''?>"	 placeholder="Presión arterial" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="Razón de consulta">Razón de consulta</label>
				<textarea name="razonConsulta" id="Razón de consulta" class="form-control" rows="3" placeholder="Razón de consulta"><?php echo !empty($info->Razon_Consulta)?$info->Razon_Consulta:''?></textarea>
			</div>
			<div class="form-group">
				<label for="Observaciones">Observaciones</label>
				<textarea name="observaciones" id="Observaciones" class="form-control" rows="3"><?php echo !empty($info->Observaciones)? $info->Observaciones:'' ?></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="Alergias">Alergias</label>
				<div class="tagsinput-primary">
		            <input name="alergias" id="Alergias" data-role="tagsinput" value="<?php echo !empty($info->Alergias)? $info->Alergias:'' ?>" placeholder="Alergias"/>
		        </div>
			</div>
			<div class="form-group">
				<label for="Sintomas">Sintomas</label>
				<div class="tagsinput-primary">
		            <input name="sintomas" id="Sintomas" data-role="tagsinput" value="<?php echo !empty($info->Sintomas)? $info->Sintomas:'' ?>" placeholder="Sintomas"/>
		        </div>
			</div>
			<div class="form-group">
				<label for="Estudios">Estudios</label>
				<div class="tagsinput-primary">
		            <input name="estudios" id="Estudios" data-role="tagsinput" value="<?php echo !empty($info->Estudios_Laboratorios)? $info->Estudios_Laboratorios:'' ?>" placeholder="Estudios"/>
		        </div>
			</div>
			<div class="form-group">
				<label for="Receta">Receta</label>
				<div class="tagsinput-primary">
		            <input name="Receta" id="Receta" data-role="tagsinput" value="<?php echo !empty($info->Receta)? $info->Receta:'' ?>" placeholder="Receta"/>
		        </div>
			</div>
			
			<div class="form-group">
				<label for="Diagnostico">Diagnostico</label>
				<textarea name="diagnostico" id="Diagnostico" class="form-control" rows="3"><?php echo !empty($info->Diagnostico)? $info->Diagnostico:'' ?></textarea>
			</div>
		</div>
		
		<div class="col-md-12">
			<input type="submit" class="btn btn-info" name="<?php echo $tipo ?>" value="<?php echo $tipo ?> consulta">
		</div>
	</div>
</form>