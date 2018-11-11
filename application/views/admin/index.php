
	<div class="jumbotron">
		<h1 class="text-center">Panel de control</h1>
	</div>

	<div class="row">
		<div class="col-lg-4 text-center">
			<div class="cardBox">
                <a href="<?php echo base_url('index.php/pacientes/index'); ?>" class="enlace-art-p">
                    <img src="<?php echo base_url('assets/images/user-paciente.png'); ?>" class="iconosPanel" width="100px" alt="">
                    <div class="card-block">
                    	<h4 class="card-title">Pacientes</h4>
                        <p class="card-text">
							Agregar, editar y eliminar <br>
							Consultar citas
                        </p>
                    </div>
                </a>
            </div>
		</div>
		<div class="col-lg-4 text-center">
			<div class="cardBox">
                <a href="<?php echo base_url('index.php/admin/doctores/index'); ?>" class="enlace-art-p">
                    <img src="<?php echo base_url('assets/images/user-doctor.png'); ?>" class="iconosPanel" width="100px" alt="" >
                    <div class="card-block">
                    	<h4 class="card-title">Doctores</h4>
                        <p class="card-text">
                        	Agregar, editar y eliminar <br>
                        	Consultar citas
                    	</p>
                    </div>
                </a>
            </div>
		</div>
		<div class="col-lg-4 text-center">
			<div class="cardBox">
                <a href="<?php echo base_url('index.php/secretary/index'); ?>" class="enlace-art-p">
                    <img src="<?php echo base_url('assets/images/user-woman.png'); ?>" class="iconosPanel" width="100px" alt="">
                    <div class="card-block">
                    	<h4 class="card-title">Secretarias/os</h4>
                        <p class="card-text">
                        	Agregar, editar y eliminar <br>
                        	Consultar perfil
                    	</p>
                    </div>
                </a>
            </div>
		</div>
	</div>
