<?php  

	class pacientes extends CI_Controller{

		function __construct(){

			parent::__construct();

			if ($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Secretaria/o' || $_SESSION['rol'] == 'Doctor') {

				$data['titulo'] = "Inicio";
				$this->load->model('Model_Pacientes');

			} else{
				redirect(base_url('index.php/Login_A'));
			}
			
		}

		public function index(){

			$data['vista'] = "admin/pacientes/index";
			$data['titulo'] = "Inicio";
			$data['mostrarPacientes'] = $this->Model_Pacientes->mostrarPacientes();
			$this->load->view('admin/plantilla', $data);
		}


		public function nuevo(){

			$data['vista'] = "admin/pacientes/nuevo";
			$data['titulo'] = "Nuevo Paciente";
			$data['mostrarSeguros'] = $this->Model_Pacientes->mostrarSeguros();
			$this->load->view('admin/plantilla', $data);
		}

		public function nuevoPerfil(){
				

			$info = $this->input->post();
			print_r($info);

			//Tabla Paciente
			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$Sexo = $info['Sexo'];
			$Edad = $info['FechaNacimiento'];
			$Clave = $info['Correo'];

			//Tabla paciente asegurado
			if (isset($info['Nombre_Seguro'])) {

				$nombreSeguro = $info['Nombre_Seguro'];
				$tipoSeguro = $info['Tipo_Seguro'];
				$Poliza = $info['Poliza'];

			} else{

				$nombreSeguro = '';
				$tipoSeguro = '';
				$Poliza = '';
			}
			

			$this->Model_Pacientes->guardarPaciente($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $Sexo, $Edad, $Clave, $nombreSeguro, $tipoSeguro, $Poliza);

			redirect(base_url('index.php/pacientes/'));
		}

		public function perfil(){

			$id = $_GET['id'];
			$data['titulo'] = "Perfil";
			$data['vista'] = "admin/pacientes/perfil";
			$data['perfil'] = $this->Model_Pacientes->perfil($id);
			$this->load->view('admin/plantilla', $data);
		}

		public function editar(){
			$id = $_GET['id'];
			if ($id != null) {
				$data['vista'] = "admin/pacientes/editar";
				$data['datosPaciente'] = $this->Model_Pacientes->editarPaciente($id) ;
				$data['mostrarSeguros'] = $this->Model_Pacientes->mostrarSeguros();
				$this->load->view('admin/plantilla', $data);
			} else{
				redirect(base_url('index.php/Admin/secretary'));
			}
		}

		public function actualizarDatosPaciente(){

			$info = $this->input->post();

			$id = $info['id'];
			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$Sexo = $info['Sexo'];
			$Edad = $info['FechaNacimiento'];
			$Clave = $info['Correo'];

			//Tabla paciente asegurado
			switch ($info['verificarSeguro']) {
				case 'si':
					if (isset($info['nombreSeguro'])) {

					$nombreSeguro = $info['Nombre_Seguro'];
					$tipoSeguro = $info['Tipo_Seguro'];
					$Poliza = $info['Poliza'];

					} else{

						$nombreSeguro = '';
						$tipoSeguro = '';
						$Poliza = '';
					}

					break;
				
				default:
					# code...
					break;
			}
			
			$this->Model_Pacientes->actualizarDatosPaciente($id, $nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $Sexo, $Edad, $Clave, $nombreSeguro, $tipoSeguro, $Poliza);
			
			redirect(base_url('index.php/pacientes/'));

		}

		public function borrar($id = null){

			if ($id != null) {
				$this->Model_Pacientes->borrar($id);
				redirect(base_url('index.php/pacientes'));
			}
		}

	}
?>