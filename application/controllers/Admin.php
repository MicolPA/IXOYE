<?php 

	class Admin extends CI_Controller{

		function __construct(){

			parent::__construct();

			if (isset($_SESSION['rol'])) {

				switch ($_SESSION['rol']){

					case 'Administrador':
						$data['titulo'] = "Inicio";
						$this->load->model('Model_admin');
						break;

					case 'Secretaria/o':
						redirect(base_url('index.php/pacientes'));
						break;

					case 'Doctor':
						redirect(base_url('index.php/doctor'));
						break;

					case 'Paciente':
						redirect(base_url('index.php/Login'));
						break;
				}

			} else{
				redirect(base_url('index.php/Login_A'));
			}
		}

		public function index(){

			$data['vista'] = "admin/index";
			$data['titulo'] = "Inicio";
			$this->load->view('admin/plantilla', $data);
		}


		public function doctores(){
			$data['vista'] = "admin/doctores/index";
			$data['titulo'] = "Doctores";
			$data['mostrarDoctores'] = $this->Model_admin->mostrarDoctores();
			$this->load->view('admin/plantilla', $data);
		}

		public function perfil_doctor(){

			$id = $_GET['id'];
			$data['titulo'] = "Perfil";
			$data['vista'] = "admin/doctores/perfil";
			$data['perfil_doctor'] = $this->Model_admin->perfil_doctor($id);
			$this->load->view('admin/plantilla', $data);
		}


		public function nuevo_Doctor(){
			$data['titulo'] = "Agregar doctor";
			$data['vista'] = "admin/doctores/nuevo";
			$data['obtenerDepartamentos'] = $this->Model_admin->obtenerDepartamentos();
			$this->load->view('admin/plantilla', $data);
		}

		public function agregarDoctor(){
			$info = $this->input->post();

			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$clave = $info['Cedula'];
			$Estudios_Realizados = $info['Estudios_Realizados'];
			$Lugar_Especializacion = $info['Lugar_Especializacion'];
			$Facultad_graduo = $info['Facultad_graduo'];
			$Direccion_Consultorio = $info['Direccion_Consultorio'];

			$this->Model_admin->agregarDoctor($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave, $Estudios_Realizados, $Lugar_Especializacion, $Facultad_graduo, $Direccion_Consultorio);

			redirect(base_url('index.php/Admin/doctores/'));
		}


		public function borrar_doctor($id = null){

			if ($id != null) {
				$this->Model_admin->borrar_doctor($id);
				redirect(base_url('index.php/Admin/doctores'));
			}

		}

		public function editar_doctor($id = null){

			if ($id != null) {
				$data['vista'] = "admin/doctores/editar";
				$data['datosDoctor'] = $this->Model_admin->editar_doctor($id) ;
				$data['obtenerDepartamentos'] = $this->Model_admin->obtenerDepartamentos();
				$this->load->model('Model_admin');
				$this->load->view('admin/plantilla', $data);
			} else{
				redirect(base_url('index.php/Admin/doctores'));
			}

		}

		public function actualizarDatosDoctores(){
			$info = $this->input->post();
			$idDoctores = $info['id'];
			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$clave = $info['Cedula'];
			$Estudios_Realizados = $info['Estudios_Realizados'];
			$Lugar_Especializacion = $info['Lugar_Especializacion'];
			$Facultad_graduo = $info['Facultad_graduo'];
			$Direccion_Consultorio = $info['Direccion_Consultorio'];

			$this->Model_admin->actualizarDatosDoctores($idDoctores, $nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave, $Estudios_Realizados, $Lugar_Especializacion, $Facultad_graduo, $Direccion_Consultorio);
			
			redirect(base_url('index.php/Admin/doctores/'));

		}

		
		
	}


?>		