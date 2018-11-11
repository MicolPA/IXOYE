<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_A extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_doctores');
    }
    
    //Realizamos la funcion principal del controlador login Administrativo cuando este es llamado
    public function index()
    {  
         //Con la funcion de registro imprime en la vista login un mensaje de exito en el registro
            // if($this->session->userdata('success_msg'))
            // {
            //     $data['success_msg'] = $this->session->userdata('success_msg');
            //     $this->session->unset_userdata('success_msg');
            // }
         //Con la funcion de registro imprime en la vista login un mensaje de exito en el registro
        
        $data = array();
        $data['titulo'] = 'Iniciar sesión';

        //Imprime un mensaje de error si las credenciales no matchearon o no selecciono el rol correcto
        if($this->session->userdata('error_msg'))
        {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        //Imprime un mensaje de error si las credenciales no matchearon o no selecciono el rol correcto

        //Si se oprime el boton de validacion inicia la validacion del usuario y la magia comienza :D  
        if($this->input->post('loginSubmit'))
        {   
            $this->form_validation->set_rules('clave', 'password', 'required');
            
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                
                $con['conditions'] = array(
                'clave' => $this->input->post('clave'),
                'cedula' => $this->input->post('cedula'));

                    if($this->input->post('rol') == 1)
                    {
                        
                        $checkLogin = $this->Model_doctores->getRows($con);

                        if($checkLogin){
                            $datos = $this->obtenerDatos('doctores', $checkLogin['idDoctores'], 'idDoctores');
                            $this->session->set_userdata('isUserLoggedIn',TRUE);
                            $this->session->set_userdata('userId',$checkLogin['idDoctores']);
                            $this->session->set_userdata('especialidad',$checkLogin['Lugar_Especializacion']);
                            $this->session->set_userdata('datos',$datos);
                            $this->session->set_userdata('rol','Doctor');
                            redirect('index.php/Admin/');
                        }else{$data['error_msg'] = 'Usuario y/o contraseña incorrecta.'; }

                    } elseif ($this->input->post('rol') == 2){

                        $this->load->model('Secre');
                        $checkLogin = $this->Secre->getRows($con);
                            if($checkLogin){
                                $datos = $this->obtenerDatos('secretaria', $checkLogin['idSecretaria'], 'idSecretaria');
                                         $this->session->set_userdata('isUserLoggedIn',TRUE);
                                         $this->session->set_userdata('userId',$checkLogin['idSecretaria']);
                                         $this->session->set_userdata('datos',$datos);
                                         $this->session->set_userdata('rol','Secretaria/o');
                                         redirect('index.php/pacientes/');
                                     }else{
                                         $data['error_msg'] = 'Usuario y/o contraseña incorrecta.';
                                     }
                    }else{
                        $this->load->model('Model_admin');
                        $checkLogin = $this->Model_admin->getRows($con);
                            if($checkLogin){
                                $datos = $this->obtenerDatos('administrador', $checkLogin['idAdministrador'], 'idAdministrador');
                                         $this->session->set_userdata('isUserLoggedIn',TRUE);
                                         $this->session->set_userdata('userId',$checkLogin['idAdministrador']);
                                         $this->session->set_userdata('datos',$datos);
                                         $this->session->set_userdata('rol','Administrador');
                                         redirect('index.php/Admin/');
                                     }else{
                                         $data['error_msg'] = 'Usuario y/o contraseña incorrecta.';
                                     }
                                   
                    }           
            }
        
        }
        //Si se oprime el boton de validacion inicia la validacion del usuario y la magia comienza :D 

        //Cargamos las vistas para login administrativo
        $data['vista'] = "users/hospital/login";
        $this->load->view('admin/plantilla', $data);
        //Cargamos las vistas para login administrativo
    }
    //Realizamos la funcion principal del controlador login Administrativo cuando este es llamado

    //Si se logro validar al usuario se procede a cargar una pagina con su informacion relevante    
    public function account($estado){
        
        if($estado == 1)
        {
                $this->load->model('doctores');

                $data = array();
            if($this->session->userdata('isUserLoggedIn')){
                $data['user'] = $this->Model_doctores->getRows(array('idDoctores' => $this->session->userdata('userId')));
                //load the view
            $data['vista'] = "users/hospital/doctor";
            $this->load->view('plantilla', $data);
        
            }else{ redirect('login_a'); }

        }elseif($estado == 2)
        {
                $this->load->model('secre');
                $data = array();
            if($this->session->userdata('isUserLoggedIn')){
                $data['user'] = $this->secre->getRows(array('idSecretaria' => $this->session->userdata('userId')));
                //load the view
                $data['vista'] = "users/hospital/secre";
                $this->load->view('plantilla', $data);
            }else{ redirect('login_a'); }
        }

    }
    //Si se logro validar al usuario se procede a cargar una pagina con su informacion relevante

    public function obtenerDatos($table, $id, $idName){
        $query = $this->db->query("SELECT * FROM $table WHERE $idName = $id");
        return $query->result();
    }
    
    //Cerramos la session de usuario registrado.
    public function logout()
    {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('datos');
        $this->session->sess_destroy();
        redirect('index.php/Login_A');
    }
    //Cerramos la session de usuario registrado.
    
 //Verificamos si el email y cedula ingresados estan disponibles descomentar si se va a emplear la funcion de registro
    /*public function email_check($str)
    {
            $con['returnType'] = 'count'; $con['conditions'] = array('correo'=>$str);
            $checkEmail = $this->user->getRows($con);
            
            if($checkEmail > 0){
                $this->form_validation->set_message('email_check', '<span style="color:Orange;">Elije otro e-mail por favor -este ya esta registrado-.</span>');
                return FALSE;
            } else { return TRUE; }
    }   
    
    public function cedula_check($cdl)
    {
            $con['returnType'] = 'count'; $con['conditions'] = array('cedula'=>$cdl); 
            $checkCedula = $this->user->getRows($con);
        
        if($checkCedula > 0){
            $this->form_validation->set_message('cedula_check', '<span style="color:Orange;">Esta cedula ya existe favor de revisar.</span>');
            return FALSE;

            } else { return TRUE; }
    }   
     */
 //Verificamos si el email y cedula ingresados estan disponibles descomentar si se va a emplear la funcion de registro

}
/* End of file Login.php */
