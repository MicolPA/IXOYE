<div class="container">
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
			<?php 

				$cantidad = 0;
				foreach ($obtenerCitas as $citas) {
					$cantidad = $cantidad + 1; 
				}
			?>

			<?php if ($cantidad == 0): ?>
				<div class="alert bg-primary text-center">No tiene ninguna cita pendiente</div>

			<?php else: ?>
				<div class="alert bg-info text-center">Usted tiene <?php echo $cantidad ?> citas pendientes</div>
			<?php endif ?>

				
			<a href="<?php echo base_url('index.php/Usuario/nueva_cita') ?>">
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



			<div class="row">
				<?php foreach ($obtenerCitas as $citasInfo): ?>
					<div class="col-lg-4 text-center" id="cita">
							<div class="cardBoxCommon">
					            <div class="card-block">
					                <h4 class="card-title">
					                	<?php 
									        $departamento=$this->db->query("SELECT * FROM departamento WHERE idDepartamento = {$citasInfo->DepartamentoID} limit 1")->row();
									        //var_dump($paciente);

									        echo $departamento->Nombre; ?>
					                </h4>
									<span class="card-text texto-pt">
										<?php 


										$time = strtotime($citasInfo->Fecha);
										$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

										$dia = date('d', $time);
										$mes = date('m', $time) - 1;
										$year = date('Y', $time);

										$fecha = "$dia de " . $meses[$mes] . " del $year";
										echo $fecha ;
										 ?>
										</span><br>
										<span><strong>Hora: </strong><?php echo $citasInfo->Hora ?></span>
									
					            </div>
					            <div class="card-footer">
					            	<a href="javascript:borrarCita(<?php echo $citasInfo->idCita ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash" title="Borrar"></i></a>
					            	<a href="<?php echo base_url('index.php/Usuario/editarCita') ?>/<?php echo $citasInfo->idCita ?>" class="btn btn-primary btn-xs" title="Editar"><i class="fui-new"></i></a>
					            	
					            </div>
					        </div>
					        	
					</div>
				<?php endforeach ?>
			</div>

			

			

		</div>



	</div>
</div>
