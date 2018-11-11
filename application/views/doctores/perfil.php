<div class="row contenedor">
	<div class="col-md-3 col-lg-3 col-sm-3">
		<img src="<?php echo base_url('assets/images/user1.png') ?>" class ="imagenPerfil">
		<div class="info">
			<h4><?php print_r($_SESSION['datos'][0]->Nombre .' ' . $_SESSION['datos'][0]->Apellido ) ?></h4>
			<ul class="list-unstyled">
				<li><i class="fas fa-user-circle"></i>&nbsp; Paciente</li>
				<li><i class="fas fa-envelope"></i> &nbsp;<?php print_r($_SESSION['datos'][0]->Correo) ?></li>
				<li><i class="fas fa-address-card"></i> &nbsp;<?php print_r($_SESSION['datos'][0]->Cedula) ?></li>
				<div class="contenedorSec">
					<a href="#fakelink" class="btn btn-info btn-block btn-lg disabled">Editar información</a>
				</div>
			</ul>
		</div>
	</div>

	<div class="col-md-9 col-lg-9 col-sm-9 ">

			
		<a href="<?php echo base_url('index.php/doctor/nueva_cita') ?>">
			<div class="cardBox text-center">
	            <img src="<?php echo base_url('assets/images/calendar.png'); ?>" class="iconosPanel" width="100px" alt="">
	            <div class="card-block">
	                <h4 class="card-title">Crear nueva cita</h4>
	            </div>
	        </div>
		</a>

		<?php if ($cantidad > 0): ?>
			<h4 class="contenedorSec"><i class="fa fa-calendar-alt"></i>&nbsp; Tus citas</h4>
			<hr>
		<?php endif ?>
	</div>

</div>
