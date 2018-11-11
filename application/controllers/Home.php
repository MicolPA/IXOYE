<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_admin');
	}

    public function index()
    {
    	$data['titulo'] = "Inicio";
        $data['vista'] = "home/index";
		$this->load->view('plantilla', $data);       
    }

    public function buscar(){

		$data['vista'] = "admin/buscar";
		$data['titulo'] = "Buscar";
		$busqueda = $_GET['busqueda'];
		$data['busqueda'] = $this->Model_admin->busqueda($busqueda);
		$this->load->view('admin/plantilla', $data);
	}
    
}
