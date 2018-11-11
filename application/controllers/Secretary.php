<?php  

	class secretary extends CI_Controller{

		function __construct(){

			parent::__construct();
			
			if ($_SESSION['rol'] == 'Administrador' || $_SESSION['rol'] == 'Secretaria/o') {

				$data['titulo'] = "Inicio";
				$this->load->model('Model_secretary');

			} else{
				redirect(base_url('index.php/Login_A'));
			}

		}

		public function index(){

			$data['vista'] = "admin/secretary/index";
			$data['titulo'] = "Inicio";
			$data['mostrarSecretary'] = $this->Model_secretary->mostrarSecretary();
			$this->load->view('admin/plantilla', $data);

		}

		public function nuevo(){

			$data['vista'] = "admin/secretary/nuevo";
			$data['titulo'] = "Nuevo";
			$this->load->view('admin/plantilla', $data);
		}

		public function nuevoPerfil(){
			
			$info = $this->input->post();

			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$clave = $info['Cedula'];

			$this->Model_secretary->agregarSecretary($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave);

			redirect(base_url('index.php/secretary/'));
		}

		public function perfil_secretary(){

			$id = $_GET['id'];
			$data['titulo'] = "Perfil";
			$data['vista'] = "admin/secretary/perfil";
			$data['perfil_secretary'] = $this->Model_secretary->perfil_secretary($id);
			$this->load->view('admin/plantilla', $data);
		}

		public function editar($id = null){

			if ($id != null) {
				$data['vista'] = "Admin/secretary/editar";
				$data['datosSecretary'] = $this->Model_secretary->editarSecretary($id) ;
				$this->load->model('Model_secretary');
				$this->load->view('admin/plantilla', $data);
			} else{
				redirect(base_url('index.php/Admin/secretary'));
			}
		}

		public function actualizarDatosSecretary(){
			$info = $this->input->post();
			$idSecretaria = $info['id'];
			$nombre = $info['nombre'];
			$Apellido = $info['Apellido'];
			$Cedula = $info['Cedula'];
			$FechaNacimiento = $info['FechaNacimiento'];
			$Telefono_Celular = $info['Telefono_Celular'];
			$Correo = $info['Correo'];
			$clave = $info['Cedula'];
			

			$this->Model_secretary->actualizarDatosSecretary($idSecretaria, $nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave);
			
			redirect(base_url('index.php/secretary/'));

		}

		public function borrar($id = null){

			if ($id != null) {
				$this->Model_secretary->borrar($id);
				redirect(base_url('index.php/secretary'));
			}

		}

		public function nueva_cita($id){

			if ($id != null) {

				$data['vista'] = 'admin/secretary/nueva_cita';
				$data['titulo'] = 'Nueva cita';
				$data['obtenerDepartamentos'] = $this->obtenerDepartamentos();
				$this->load->view('admin/plantilla', $data);

			} else{
				redirect(base_url('index.php/pacientes'));
			}

			

			if($this->input->post('RealizarCita')){

				$query = $this->db->query("SELECT * FROM cita");
				$query = $query->result();

				if ($query->DepartamentoID == $_POST['DepartamentoID'] && $query->Paciente_idCliente == $id) {
					echo "Ya tiene una cita";
				}


	           $datosCita = array(

				'Fecha' =>$_POST['FechaCita'],
				'Hora' => $_POST['HoraCita'],
				'DepartamentoID' => $_POST['DepartamentoCita'],
				'Paciente_idCliente' => $id

				);

				$this->db->insert('cita', $datosCita);
				redirect(base_url('index.php/pacientes'));
	        }


		}

		function obtenerDepartamentos(){
			$query = $this->db->query("SELECT * FROM departamento");
			return $query->result();
		}

	}


?>