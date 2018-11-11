<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?> | IXOYE</title>

	<!-- ESTILOS -->
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap/css/bootstrap.min.css') ?>">

	<!-- Flat UI -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/flat-ui.css') ?>">

	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">

	<!-- ICONOS -->
	<script defer src="<?php echo base_url('assets/fontawesome/fontawesome-all.min.js') ?>"></script>


	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>

	<link rel="stylesheet" href="<?php echo base_url('assets/slider/css/style.css') ?>">
	

	<!-- VEX -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex-theme-plain.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex-theme-os.css') ?>" />
</head>
<body>

	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand elementos-menu" href="<?php echo base_url() ?>"><i class="fa fa-home"></i>&nbsp; IXOYE</a>
	      </div>
	      <div class="navbar-collapse collapse">
	        
	        <ul class="nav navbar-nav navbar-right ">
	        	<?php if (isset($_SESSION['rol'])): ?>
	        		<li class="dropdown">
	                    <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
	                        <i class="fas fa-user-circle"></i> &nbsp; <?php print_r (!empty($_SESSION['datos'][0]->Nombre)?$_SESSION['datos'][0]->Nombre:''); ?>
	                        <span class="caret"></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li><a href="<?php echo base_url('index.php/Usuario');  ?>">Mi perfil</a></li>
	                        <li> <a href="<?php echo base_url('index.php/Login/logout') ?>">Cerrar sesión</a></li>
	                    </ul> <!-- /Sub menu -->
	                </li>
	        	<?php endif ?>

	        	<?php if (!isset($_SESSION['rol'])): ?>
	        		<a class="btn btn-info navbar-btn" href="<?php echo base_url('index.php/Login') ?>">Iniciar sesión</a>
	        		<a class="btn btn-inverse navbar-btn" href="<?php echo base_url('index.php/Login/registration') ?>">Registrarse</a>
	        	<?php endif ?>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	</div>

	<!-- VISTA PRINCIPAL -->

	<div class="contenedorSec">
		<?php $this->load->view($vista) ?>
	</div>

	<footer class="margin_top_full">

	  <div class="container">
	    <p>Hospital IXOYE</p>
	    <ul class="list-unstyled">
	      <li><i class="fa fa-map-marker"></i>&nbsp; Av. Las Américas, Santo Domingo Este</li>
	      <li><i class="fa fa-phone"></i>&nbsp; Tel. (809) 111-2222</li> 
	      <li><i class="fa fa-envelope"></i>&nbsp; hospital@ixoye.com</li>  
	    </ul>
	  </div>

	  <div class="col-md-12 text-center ">
	    <span><i class="fa fa-copyright"></i>&nbsp; Todos los derechos reservados</span>
	  </div>
	  
	</footer>
	
	<!-- /.VISTA PRINCIPAL -->

	<!-- Cargando JS -->

	<script src="<?php echo base_url('assets/js/vendor/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/flat-ui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/application.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/script.js') ?>"></script>
    <script src="<?php echo base_url('assets/vex/dist/js/vex.combined.min.js') ?>"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
    <script src="<?php echo base_url('assets/slider/js/index.js') ?>"></script>

	<script>


    $("#imagenFlotante").mouseenter(function(){
	    $(".tooltip1").animate({
	        left: "0"
	    	});
		});
    $("#imagenFlotante").mouseleave(function(){
	    $(".tooltip1").animate({
	        left: "-100%"
	    	});
		});

    $("#FechaCita").prop('disabled',true);
    $("#HoraCita").prop('disabled',true);
    $('.n2').animate({color: "#ccc"}, "slow");
    $('.n3').animate({color: "#ccc"}, "slow");


    $('#DepartamentoCita').change(function(){

		$('.progress-bar').css('width', '32%');
		$("#FechaCita").prop('disabled',false);
		document.getElementById("imgN2").setAttribute("src", "<?php echo base_url('assets/images/n2.png') ?>");
		$('.n2').animate({color: "#000"}, "slow");
	});

	$('#FechaCita').change(function(){
		
		$('.progress-bar').css('width', '65%');
		$("#HoraCita").prop('disabled',false);
		document.getElementById("imgN3").setAttribute("src", "<?php echo base_url('assets/images/n3.png') ?>");
		$('.n3').animate({color: "#000"}, "slow");
	});

	$('#HoraCita').change(function(){
		$('.progress-bar').css('width', '100%');
		$('#btnRealizarCita').removeClass('mostrar');
	});

	function mostrarCambioClave(){
		vex.dialog.open({
		    message: 'Cambiar contraseña',
		    className: 'vex-theme-plain',
		    input: [
		        '<input name="correo" type="text" placeholder="Inserte su correo electronico" required autocomplete="off"/>'
		    ].join(''),
		    buttons: [
		        $.extend({}, vex.dialog.buttons.YES, { text: 'Enviar' }),
		        $.extend({}, vex.dialog.buttons.NO, { text: 'Cancelar' })
		    ],
		    callback: function (data) {
		        if (!data) {
		            console.log('Cancelado');
		        } else {
		        	vex.dialog.open({
				    message: 'Introduzca el código enviado por correo',
				    className: 'vex-theme-plain',
				    input: [
				        '<input name="codigo" type="text" placeholder="Inserte el codigo" required autocomplete="off"/>'
				    ].join(''),
				    buttons: [
				        $.extend({}, vex.dialog.buttons.YES, { text: 'Enviar' }),
				        $.extend({}, vex.dialog.buttons.NO, { text: 'Cancelar' })
				    ],
				    callback: function (data) {
				        if (!data) {
				            console.log('Cancelado');
				        } else {
				        	window.location = '<?php echo base_url('index.php/Login/CambioClave/') ?>' + data.correo;
				        }
				    }
				});
		        }
		    }
		});
	}

	function borrarCita(id){

		vex.dialog.confirm({
	    message: '¿Está seguro de que desea borrar este perfil?',
	    className: 'vex-theme-plain',
	    
		    callback: function (value) {
		    	
		    	if (value) {
		    		window.location ="<?php echo base_url('index.php/Usuario/borrarCita') ?>/"+id;
		    	} 
		    }

		});
	
	}

	
</script>

</body>
</html>