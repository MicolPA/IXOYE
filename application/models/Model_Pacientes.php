<?php  
	
	class Model_Pacientes extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function mostrarPacientes(){

			$query = $this->db->query('SELECT * FROM paciente order by Apellido');
			return $query->result();
		}

		function mostrarSeguros(){
			$query = $this->db->query('SELECT * FROM seguro');
			return $query->result();
		}

		function perfil($id){

			$query = $this->db->query('SELECT * FROM paciente WHERE id='. $id);
			return $query->result();
		}

		function obtenerDepartamentos(){
			$query = $this->db->query('SELECT * FROM departamento');
			return $query->result();
		}


		function obtenerSeguro($nombreSeguro){
			$query =$this->db->query("SELECT * FROM seguro WHERE Nombre_Seguro= '$nombreSeguro'");
			return $query->result();
		}

		function guardarPacienteAsegurado($Poliza, $tipoSeguro, $idSeguro, $id){

			$datosPacienteAsegurado = array(

					'Poliza'				=> $Poliza,
					'Tipo_Seguro'			=> $tipoSeguro,
					'Seguro_idSeguro'		=> $idSeguro,
					'Paciente_idCliente'	=> $id
				);

			$this->db->insert('paciente_asegurado', $datosPacienteAsegurado);
		}

		public function guardarPaciente($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $Sexo, $Edad, $Clave, $nombreSeguro, $tipoSeguro, $Poliza){
			 

				$datosPaciente = array(

					'Nombre'				=> $nombre,
					'Apellido'				=> $Apellido,
					'Cedula'				=> $Cedula,
					'Telefono_Celular'		=> $Telefono_Celular,
					'Fecha_Nacimiento'  	=> $FechaNacimiento,
					'Correo' 				=> $Correo,
					'Sexo' 				    => $Sexo,
					'Edad' 				    => $Edad,
					'clave' 				=> $Cedula
				);


				$this->db->insert('paciente', $datosPaciente);
				$id = $this->db->insert_id();

				if ($Poliza != '') {

				 	$idSeguro = $this->obtenerSeguro($nombreSeguro);
				 	print_r($idSeguro);

				 	foreach ($idSeguro as $dato) {
				 		$idSeguro = $dato->idSeguro;
				 		$this->guardarPacienteAsegurado($Poliza, $tipoSeguro, $idSeguro, $id);
				 	}
				 	
				} 
		}

		public function editarPaciente($id){
			
			$query = $this->db->query("SELECT * FROM paciente WHERE id = $id");
			return $query->result();
		}

		public function actualizarDatosPaciente($id, $nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $Sexo, $Edad, $Clave, $nombreSeguro, $tipoSeguro, $Poliza){

			

				$datosPaciente = array(

					'Nombre'				=> $nombre,
					'Apellido'				=> $Apellido,
					'Cedula'				=> $Cedula,
					'Telefono_Celular'		=> $Telefono_Celular,
					'Fecha_Nacimiento'  	=> $FechaNacimiento,
					'Correo' 				=> $Correo,
					'Sexo' 				    => $Sexo,
					'Edad' 				    => $Edad,
					'clave' 				=> $Cedula
				);

			$this->db->where('id', $id);
			$this->db->update('paciente', $datosPaciente);

			if ($Poliza != '') {

				$idSeguro = $this->obtenerSeguro($nombreSeguro);
				print_r($idSeguro);

				foreach ($idSeguro as $dato) {
				 	$idSeguro = $dato->idSeguro;
				 	$this->actualizarDatosPacienteAsegurado($Poliza, $tipoSeguro, $idSeguro, $id);
				}
				 	
			} 

		}

		function actualizarDatosPacienteAsegurado($Poliza, $tipoSeguro, $idSeguro, $id){

			$datosPacienteAsegurado = array(

					'Poliza'				=> $Poliza,
					'Tipo_Seguro'			=> $tipoSeguro,
					'Seguro_idSeguro'		=> $idSeguro,
					'Paciente_idCliente'	=> $id
				);

			$this->db->where('Paciente_idCliente', $id);
			$this->db->update('paciente_asegurado', $datosPacienteAsegurado);
		}

		public function borrar($id){

			$this->db->where('id', $id);
			$this->db->delete('paciente');
		}		
	}

?>