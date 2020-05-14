<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User');
    }

    function obtenerDatos($id){

        $query = $this->db->query('SELECT * FROM paciente WHERE id='. $id);
        return $query->result();
    }

    public function index()
    {
        $data = array();
        $data['titulo'] = 'Iniciar sesión';

        if($this->session->userdata('success_msg'))
        {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }

        if($this->session->userdata('error_msg'))
        {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        if($this->input->post('loginSubmit'))
        {
            $this->form_validation->set_rules('clave', 'password', 'required');
                if ($this->form_validation->run() == true) {
                    $con['returnType'] = 'single';
                    $con['conditions'] = array(
                        'clave' => $this->input->post('clave'),
                        'cedula' => str_replace('-', '', $this->input->post('cedula')),
                        );
                $checkLogin = $this->User->getRows($con);
                if($checkLogin){
                    $data = $this->obtenerDatos($checkLogin['id']);
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    $this->session->set_userdata('rol','Paciente');
                    $this->session->set_userdata('datos',$data);
                    redirect('index.php/Usuario');
                }else{
                    $data['error_msg'] = 'Cedula de identidad y/o contraseña incorrecta.';
                }
            }
        }
        //Cargamos la vista del paciente
        $data['vista'] = "users/login";
        $this->load->view('plantilla', $data);
        //Cargamos la vista del paciente
    }

    

    
    //Colocamos la info de usuario en session para mostrala en la vista
    
    public function account()
    {
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->User->getRows(array('id'=>$this->session->userdata('userId')));
        
        //load the view    
        $this->load->view('head', $data);
        $this->load->view('home', $data);
    
        }else{ redirect('login'); }
    }

    public function registration(){

        $data = array();
        $userData = array();
        $data['titulo'] = 'Registrarse';
        
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('correo', 'correo', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('cedula', 'cedula', 'required|callback_cedula_check');
            $this->form_validation->set_rules('clave', 'clave', 'required');
            $this->form_validation->set_rules('conf_clave', 'confirme su clave', 'required|matches[clave]');

            $userData = array(
                'nombre' => strip_tags($this->input->post('name')),
                'apellido' => strip_tags($this->input->post('lastname')),
                'cedula' => strip_tags(str_replace('-', '', $this->input->post('cedula'))),
                'fecha_nacimiento' => strip_tags($this->input->post('fecha_nacimiento')),
                'correo' => strip_tags($this->input->post('correo')),
                'sexo' => $this->input->post('gender'),
                'edad' => strip_tags($this->input->post('edad')),
                'clave' => $this->input->post('clave')
            );

            if($this->form_validation->run() == true){
                
                $insert = $this->User->insert($userData);
                

                if($insert){
                    $this->session->set_userdata('success_msg', 'Bienvenido ya eres un paciente completa los campos para continuar');
                    redirect(base_url('index.php/Login'));

                }else{
                    $data['error_msg'] = 'Hubo un error, Por favor intentalo de nuevo.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $data['vista'] = "users/registration";
        $this->load->view('plantilla', $data);
        
    }
    
//Cerramos la session del paciente
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('rol');
        $this->session->unset_userdata('datos');
        $this->session->sess_destroy();
        redirect('index.php/home');
    }
//Cerramos la session del paciente
    
//Validamos si la cedula y correo proporcionados no estan ya registrados
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('correo'=>$str);
        $checkEmail = $this->User->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', '<span class="bg-danger">Este correo ya está registrado</span>');
            return FALSE;
        } else {
            return TRUE;
        }
    }   
    public function cedula_check($cdl){
        $con['returnType'] = 'count';
        $con['conditions'] = array('cedula'=>str_replace('-', '', $cdl));
        $checkCedula = $this->User->getRows($con);
        if($checkCedula > 0){
            $this->form_validation->set_message('cedula_check', '<span style="color:Orange;">Esta cedula ya existe favor de revisar.</span>');
            return FALSE;
        } else {
            return TRUE;
        }
    }
//Validamos si la cedula y correo proporcionados no estan ya registrados   


    function CambioClave(){
        
    }

}
/* End of file Login.php */
