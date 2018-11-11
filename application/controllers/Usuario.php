<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

	function __construct(){

		parent::__construct();
        
        if (isset($_SESSION['rol'])) {
        	
        	if ($_SESSION['rol'] == "Paciente") {
        		
        		$this->load->model('Model_usuario');
        	} else{
        		redirect(base_url('index.php/Home'));
        	}
        } else{
        	redirect(base_url('index.php/Login'));
          }
	}

	public function index(){

	       $data['vista'] = "pacientes/perfil.php";
	       $data['titulo'] = "Perfil";
           $data['obtenerCitas'] = $this->Model_usuario->obtenerCitas($_SESSION['userId']);
	       $this->load->view('plantilla', $data);

	}

    public function nueva_cita(){

        $data['vista'] = "pacientes/nueva_cita.php";
        $data['titulo'] = "Nueva cita";
        $data['obtenerDepartamentos'] = $this->Model_usuario->obtenerDepartamentos();

        if($this->input->post('RealizarCita')){

            $departamento = $_POST['DepartamentoCita'];
            $fecha = $_POST['FechaCita'];
            $hora = $_POST['HoraCita'];
            $id = $_SESSION['userId'];

            $this->Model_usuario->RealizarCita($departamento, $fecha, $hora, $id);
        }

            $this->load->view('plantilla', $data);

    }

    function borrarCita($id){

        if ($id != null) {
            
            $this->Model_usuario->borrarCita($id);
            redirect(base_url('index.php/Usuario'));        
        }     
    }

    function editarCita($id){
        
        if ($id != null) {
            
            $data['vista'] = 'pacientes/editar_cita';
            $data['datosCita'] = $this->Model_usuario->obtenerDatosCita($id);
            $data['obtenerDepartamentos'] = $this->Model_usuario->obtenerDepartamentos();

            $this->load->model('Model_usuario');
            $this->load->view('plantilla', $data);

        } else{
            redirect(base_url('index.php/Usuario'));
        }

        if ($this->input->post('actualizarDatosCita')) {
            
            $datosCita = array(

                'Fecha' => $_POST['FechaCita'],
                'Hora' => $_POST['HoraCita'],
                'DepartamentoID' => $_POST['DepartamentoCita'],
                'Paciente_idCliente' => $_SESSION['userId']

            );

            $this->db->where('idCita', $id);
            $this->db->update('cita', $datosCita);

            redirect(base_url('index.php/Usuario'));
        }

    }

    function actualizarDatosCita($id){

    }



}



?>