<h1 class="text-center">Busqueda</h1>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
	<div class="form-group">
        <div class="input-group">
            <input type="text" name="busqueda" class="form-control active">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div><!-- /input-group -->
    </div>
</form>

 			<div class="form-group">
 				<span class="text-left">Se muestran resultados de <span class="text-danger"><?php echo $_GET['busqueda'] ?></span></span>
 				
              <div style="float:right">
	              	<label class="checkbox checkbox-inline" for="PacientesCheck">
	                <input type="checkbox" data-toggle="checkbox" value="" id="PacientesCheck" checked> Pacientes
	              </label>
	              <label class="checkbox checkbox-inline" for="DoctoresCheck">
	                <input type="checkbox" data-toggle="checkbox" value="" id="DoctoresCheck" checked> Doctores
	              </label>
	              <label class="checkbox checkbox-inline" for="SecreCheck">
	                <input type="checkbox" data-toggle="checkbox" value="" id="SecreCheck" checked> Secretarias
	              </label>
              </div>
            </div>
<hr>

<div class="row">
	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->id)): ?>
					<div class="col-lg-4 text-center divBusquedaPacientes">
						<a href="<?php echo base_url('index.php/pacientes/perfil?id='.$data->id) ?>" class="enlace-art-p">
							<div class="cardBox">
			                    <div class="card-block">
			                    	<h4 class="card-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h4>
			                    	<p class="card-text texto-pt">Paciente</p>
			                    </div>
			                </div>
			            </a>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>


	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->idDoctores)): ?>
					<div class="col-lg-4 text-center divBusquedaDoctores">
						<a href="<?php echo base_url('index.php/Admin/perfil_doctor?id='.$data->idDoctores) ?>" class="enlace-art-p">
							<div class="cardBox">
			                    <div class="card-block">
			                    	<h4 class="card-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h4>
			                    	<p class="card-text texto-dt">Doctor</p>
			                    </div>
			                </div>
			            </a>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>


	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->idSecretaria)): ?>
					<div class="col-lg-4 text-center divBusquedaSecretaria">
						<a href="<?php echo base_url('index.php/secretary/perfil_secretary?id='.$data->idSecretaria) ?>" class="enlace-art-p">
							<div class="cardBox">
			                    
			                    <div class="card-block">
			                    	<h4 class="card-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h4>
			                    	<p class="card-text texto-sr">Secretaria</p>
			                    </div>
			                </div>
			            </a>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>	

