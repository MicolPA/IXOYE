<h1>Busqueda</h1>
	<div class="tile">
        <h3 class="tile-title"></h3>
        <p></p>
        <a class="btn btn-primary btn-large btn-block" href=""></a>
    </div>

<div class="row">
	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->id)): ?>
					<div class="col-md-4">
						<div class="tile">
							<img src="<?php echo base_url('assets/images/user-paciente.png') ?>" class="tile-image">
					        <h3 class="tile-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h3>
					        <p></p>
					        <a class="btn btn-primary btn-large btn-block" href="">Ver perfil</a>
					    </div>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>

<div class="row">
	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->idDoctores)): ?>
					<div class="col-md-4">
						<div class="tile">
							<img src="<?php echo base_url('assets/images/user-doctor.png') ?>" class="tile-image">
					        <h3 class="tile-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h3>
					        <p></p>
					        <a class="btn btn-primary btn-large btn-block" href="">Ver perfil</a>
					    </div>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>

<div class="row">
	<?php foreach ($busqueda as $datos): ?>
		<?php foreach ($datos as $data): ?>
				<?php if (isset($data->idSecretaria)): ?>
					<div class="col-md-4">
						<div class="tile">
							<img src="<?php echo base_url('assets/images/user-woman.png') ?>" class="tile-image">
					        <h3 class="tile-title"><?php echo $data->Nombre . ' ' . $data->Apellido ?></h3>
					        <p></p>
					        <a class="btn btn-primary btn-large btn-block" href="">Ver perfil</a>
					    </div>
					</div>
				<?php endif ?>
		<?php endforeach ?>
	<?php endforeach ?>
</div>	
			

