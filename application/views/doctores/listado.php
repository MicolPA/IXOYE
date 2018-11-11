
<h3>Listado de pacientes</h3>
<div class="table-responsive">
	<table class="tabla col-md-12">
	    <thead class="tabla-th">
	      <tr>
	        <th>Apellido</th>
	        <th>Nombre</th>
	        <th>Cédula</th>
	        <th>Especialidad</th>
	        <th>Fecha</th>
	        <th></th>
	        <th></th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>

	    <?php foreach ($listadoPacientesCita as $cita): ?>
	    	<?php foreach ($listadoPacientes as $datos): ?>
	    		<?php if ($datos->id == $cita->Paciente_idCliente): ?>
	    			<tr>
			    		<td><span class="text-center"><?php echo $datos->Apellido ?></span></td>
			    		<td><span class="text-center"><?php echo $datos->Nombre ?></span></td>
			    		<td><span class="text-center"><?php echo $datos->Cedula ?></span></td>
			    		<?php 
			    			$query = $this->db->query("SELECT * FROM departamento");
			    			$dept = $query->result();

			    			foreach ($dept as $departamento) {
			    				if ($departamento->idDepartamento == $cita->DepartamentoID) {
			    					echo "<td><span class='text-center'>$departamento->Nombre</span></td>";
			    				}
			    			}
			    		?>
			    		<td><span class="text-center"><?php echo $cita->Fecha ?></span></td>
			    		
			    		<?php 

			    		$query = $this->db->query("SELECT Paciente_idCliente FROM consulta");
			    		$confirmConsulta = $query->result();

			    		foreach ($confirmConsulta as $confirmConsulta) {
			    			
			    			if ($confirmConsulta->Paciente_idCliente == $datos->id) {
			    				$ruta = base_url('index.php/doctor/consulta/') . $datos->id;
			    				echo "<td><a href='$ruta' class='btn btn-primary'>Consultar</a></td>";
			    			} else{
			    				$ruta = base_url('index.php/doctor/expediente/') . $datos->id;
			    				echo "<td><a href='$ruta' class='btn btn-info'>Ver expendiente</a></td>";
			    			}
			    		}

			    		?>
			    		
			    	</tr>
	    		<?php endif ?>
	    	<?php endforeach ?>
	    <?php endforeach ?>
	    </tbody>
	</table>
</div>


<div id='div-imagenFlotante'>
  <a href='<?php echo base_url('index.php/pacientes/nuevo'); ?>'>
    <img id="imagenFlotante" src='<?php echo base_url('assets/images/agregar-icon.png'); ?>' width="100%"/>
  </a>
  <div class='tooltip1'>
  	<strong>REGISTRAR NUEVO PACIENTE</strong>
  </div>
</div>


