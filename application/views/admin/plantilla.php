<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?> | IXOYE</title>

	<!-- ESTILOS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css?v=1') ?>">

	<!-- ICONOS -->
	<script defer src="<?php echo base_url('assets/fontawesome/fontawesome-all.min.js') ?>"></script>

	<!-- Flat UI -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/flat-ui.min.css') ?>">

	<!-- VEX -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex-theme-plain.css') ?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vex/dist/css/vex-theme-os.css') ?>" />
</head>
<body>

	<div class="navbar nav-m navbar-inverse navbar-fixed-top" role="navigation">
	    <div class="container">
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand elementos-menu" href="<?php echo base_url('index.php/Admin') ?>"><i class="fa fa-home"></i>&nbsp; IXOYE</a>
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
	                        <li><a href="#fakelink">Mi perfil</a></li>
	                        <li> <a href="<?php echo base_url('index.php/Login_A/logout') ?>">Cerrar sesión</a></li>
	                    </ul> <!-- /Sub menu -->
	                </li>
	        	<?php endif ?>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	</div>

	<?php if (isset($_SESSION['rol'])): ?>
		<?php if ($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Secretaria/o' || $_SESSION['rol'] == 'Doctor'): ?>
			<div class="v_menu">
				
					<div class="estherlin_btn"> 
						<i class="fa fa-bars"></i>
					</div>

						<div class="menu_info">
								<div class="menu_img"><img src="<?php echo base_url('assets/images/user.png') ?>" alt="" width ="100%"></div>
								<div class="menu_datos"><b><?php print_r (!empty($_SESSION['datos'][0]->Nombre)?$_SESSION['datos'][0]->Nombre:''); echo ' '; print_r (!empty($_SESSION['datos'][0]->Apellido)?$_SESSION['datos'][0]->Apellido:''); ?></b> <br> <b>	<?php print_r (!empty($_SESSION['rol'])?$_SESSION['rol']:'');?></b></div>
						</div>

						<div class="estherlin_info">
								
						</div>

							<div class="ul_contenedor">

								<ul class="estherlin"> <i class="fa_ico fa fa-wheelchair"></i><a href="#fakelink">Pacientes</a>
									<li><a href="<?php echo base_url('index.php/pacientes'); ?>"> Ver listado</a></li>
									<li><a href="<?php echo base_url('index.php/pacientes/nuevo'); ?>">Nuevo</a></li>
								</ul>
							
								<?php if ($_SESSION['rol'] == 'Administrador'): ?>
									<ul class="estherlin"><i class="fa_ico fa fa-user-md"></i><a href="#fakelink">Doctores</a>
										<li><a href="<?php echo base_url('index.php/Admin/doctores'); ?>"> Ver listado</a></li>
										<li><a href="<?php echo base_url('index.php/Admin/nuevo_Doctor'); ?>">Nuevo</a></li>
									</ul>
								
									
								
									<ul class="estherlin"><i class="fa_ico fa fa-address-card"></i><a href="#fakelink">Secretarias/os</a>
										<li><a href="<?php echo base_url('index.php/secretary/'); ?>">Ver listado</a></li>
										<li><a href="<?php echo base_url('index.php/secretary/nuevo'); ?>">Nuevo</a></li>
									</ul>
								<?php endif ?>

								<ul class="estherlin"><i class="fa_ico fa fa-search"></i><a href="javascript:mostrarBuscador()">Buscar</a></ul>
					</div>
			</div>
		<?php endif ?>
		
	<?php endif ?>
	
	<!-- VISTA PRINCIPAL -->
	
	<div class="r_pantalla" style="margin-top: 60px; margin-bottom: 50px;">
		<?php $this->load->view($vista) ?>
	</div>
	
	<!-- /.VISTA PRINCIPAL -->


	
	<!-- Cargando JS -->

	<script src="<?php echo base_url('assets/js/vendor/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/video.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/flat-ui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/application.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/script.js') ?>"></script>
    <script src="<?php echo base_url('assets/vex/dist/js/vex.combined.min.js') ?>"></script>
    
  	<style>
  		.navbar-custom{
  			color:white;
  			background: #070017;
  		}
  		.elementos-menu{
  			color: white;
  		}

  		.tabla{
  			margin-top: 40px;
  		}
  	</style>

	<script>

	$('#PacientesCheck').click(function(){
  		if (this.checked) {
  			$('.divBusquedaPacientes').css("display", "block");
  		}
  		else {
  			$('.divBusquedaPacientes').css("display", "none");
  		}
	});

	$('#DoctoresCheck').click(function(){
  		if (this.checked) {
  			$('.divBusquedaDoctores').css("display", "block");
  		}
  		else {
  			$('.divBusquedaDoctores').css("display", "none");
  		}
	});

	$('#SecreCheck').click(function(){
  		if (this.checked) {
  			$('.divBusquedaSecretaria').css("display", "block");
  		}
  		else {
  			$('.divBusquedaSecretaria').css("display", "none");
  		}
	});

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

	$( "#mostrarFormSeguro" ).click(function() {
	  $( ".FormSeguro" ).toggle( "mostrar", function() {
	    
	  });
	});


	function calcularLogintud(cantidad, campo, divMod){
		
		digitos = document.getElementById(campo).value;
		div = document.getElementById(divMod);

		if (digitos.length > cantidad) {
			div.classList.add('has-error');	
		} else{
			div.classList.remove('has-error');	
		}
	}

	function borrar(id, rol){

		vex.dialog.confirm({
	    message: '¿Está seguro de que desea borrar este perfil?',
	    className: 'vex-theme-plain',
	    
		    callback: function (value) {
		        if (value) {
		        	console.log(rol);
		        	document.body.style.cursor = "wait";

		        	if (rol == 'doctor') {
		        		window.location = "<?php echo base_url('index.php/Admin/borrar_doctor/')?>" +id;
		        	}
		        	if (rol == 'secretarias') {
		        		window.location = "<?php echo base_url('index.php/secretary/borrar/')?>" +id;
		        	}
		        	if (rol == 'paciente') {
		        		window.location = "<?php echo base_url('index.php/pacientes/borrar/')?>" +id;
		        	}

		        }
		    }
		});
	
	}

	

		estado = sessionStorage.getItem('menuVertical');
		console.log("h");
		
	    if(estado == 'Afuera'){
	        mostrar();
	    }
	    else{
	       	ocultar();	
	    }

	function mostrar(){

	    $(".estherlin_btn").animate({width: '40px', opacity: '1.0',left:"160px"}, "slow");
	    $(".fa-angle-double-right").animate({transform: "rotate(180deg)"});
	    $(".r_pantalla").animate({width: "78%", padding: "auto auto auto auto", margin: "auto 3% auto auto"});
	    $(".v_menu").animate({width: "200px"}, "slow");
	    $(".estherlin a").show("slow");
	    $(".ul_contenedor").animate({padding: "30px 0 0 0"}, "slow");
   		$(".menu_info").delay(1000).slideToggle();
    }

    function ocultar(){

	    $(".menu_info").hide("slow");
	    $(".estherlin li").slideUp();
	    $(".estherlin a").css("display", "none");
	    $(".estherlin_btn").animate({width: '40px', opacity: '1.0',left:"0px"}, );
	    $(".v_menu").animate({width: "40px",background: "red"}, "slow");
	    $(".ul_contenedor").animate({padding: "50px 0 0 0"}, "slow");   		
	    $(".r_pantalla").animate({margin:"auto", width: "90%",padding:"1%"},"slow");
	}    	

	$(".estherlin_btn").click(function(){
        var div = $(".estherlin_btn");

	        estado = sessionStorage.getItem('menuVertical');
	        console.log(estado);

	        if(estado == 'Afuera'){
	        	sessionStorage.setItem('menuVertical', 'ocultar');
	        	ocultar();
	        }
	       	else{
	       		
	       		mostrar();
	       		sessionStorage.setItem('menuVertical', 'Afuera');	
	       	}
        
   	});
   

	$(".estherlin").click(function(){
		$("li", this).slideToggle();
	});

	function mostrarBuscador(){
		vex.dialog.open({
		    message: 'Realizar busqueda',
		    className: 'vex-theme-plain',
		    input: [
		        '<input name="busqueda" type="text" placeholder="Buscar..." required autocomplete="off"/>'
		    ].join(''),
		    buttons: [
		        $.extend({}, vex.dialog.buttons.YES, { text: 'Buscar' }),
		        $.extend({}, vex.dialog.buttons.NO, { text: 'Cancelar' })
		    ],
		    callback: function (data) {
		        if (!data) {
		            console.log('Cancelado');
		        } else {
		        	window.location ="<?php echo base_url('index.php/Home/buscar') ?>?busqueda=" + data.busqueda;
		            console.log('busqueda', data.busqueda);
		        }
		    }
		});
	}

	function borrarInfoSeguro(){

		document.getElementById('Tipo_Seguro').value = '';
		document.getElementById('Poliza').value = '';
		document.getElementById('Nombre_Seguro').value = '';
	}

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

	</script>

</body>
</html>