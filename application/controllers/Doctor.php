<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class doctor extends CI_Controller{


	function __construct(){

		parent::__construct();

		if (isset($_SESSION['rol'])) {

				switch ($_SESSION['rol']){

					case 'Doctor':
						$data['titulo'] = "Inicio";
						$this->load->model('Model_doctor');
						break;

					case 'Administrador':
						$data['titulo'] = "Inicio";
						$this->load->model('Model_doctor');
						break;

					case 'Secretaria/o':
						redirect(base_url('index.php/pacientes'));
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

		$data['vista'] = 'doctores/index';
		$data['titulo'] = 'Listado';
		$data['listadoPacientesCita'] = $this->Model_doctor->listadoPacientesCita();
		$data['mostrarPacientes'] = $this->Model_doctor->listadoPacientes();
		$this->load->view('admin/plantilla', $data);
	}

	public function expediente($id){

		$data['id'] = $id;
		$data['vista'] = 'doctores/expediente';
		$data['titulo'] = 'Expediente';
		$data['obtenerExpediente'] = $this->Model_doctor->obtenerExpediente($id);
		$data['listadoPacienteExp'] = $this->Model_doctor->listadoPacienteExp($id);
 		$this->load->view('admin/plantilla', $data);
	}

	public function consulta($id){
		$data['id'] = $id;
		$data['vista'] = 'doctores/consulta';
		$data['titulo'] = 'Registrar nueva consulta';
/*
		if ($this->input->post('Crear')) {

			//redirect(base_url("index.php/doctor/guardarConsulta/$id"));
		}
		if ($this->input->post('Actualizar')){
			$this->actualizarConsulta($id);
			//redirect(base_url("index.php/doctor/actualizarConsulta/$id"));
		}

		switch ($this->input->post()) {
			case 'Crear':
				redirect(base_url("index.php/doctor/guardarConsulta/$id"));
				break;
			
			case 'Actualizar':
				redirect(base_url("index.php/doctor/guardarConsulta/$id"));
				break;
		}*/

		$this->load->view('admin/plantilla', $data);
	}

	public function CrearConsulta($id){

		$info = $this->input->post();

		$peso = $info['peso'];
		$Receta = $info['Receta'];
		$estatura = $info['estatura'];
		$presionArterial = $info['presionArterial'];
		$observaciones = $info['observaciones'];
		$razonConsulta = $info['razonConsulta'];
		$alergias = $info['alergias'];
		$sintomas = $info['sintomas'];
		$estudios = $info['estudios'];
		$diagnostico = $info['diagnostico'];

		$this->Model_doctor->guardarConsulta($id, $peso, $estatura, $presionArterial, $observaciones, $razonConsulta, $alergias, $Receta, $sintomas, $estudios, $diagnostico);
	}


	public function ActualizarConsulta($id){

		$info = $this->input->post();

		$peso = $info['peso'];
		$Receta = $info['Receta'];
		$estatura = $info['estatura'];
		$presionArterial = $info['presionArterial'];
		$observaciones = $info['observaciones'];
		$razonConsulta = $info['razonConsulta'];
		$alergias = $info['alergias'];
		$sintomas = $info['sintomas'];
		$estudios = $info['estudios'];
		$diagnostico = $info['diagnostico'];

		$this->Model_doctor->actualizarConsulta($id, $peso, $estatura, $presionArterial, $observaciones, $razonConsulta, $alergias, $Receta, $sintomas, $estudios, $diagnostico);

	}


}


?>