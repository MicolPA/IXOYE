
<?php  
	
	class Model_secretary extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function mostrarSecretary(){

			$query = $this->db->query('SELECT * FROM secretaria order by Apellido');
			return $query->result();
		}

		function perfil_secretary($id){

			$query = $this->db->query('SELECT * FROM secretaria WHERE idSecretaria='. $id);
			return $query->result();
		}

		function obtenerDepartamentos(){
			$query = $this->db->query('SELECT * FROM departamento');
			return $query->result();
		}

		public function agregarSecretary($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave){

				$datosSecretary = array(
				'Nombre' => $nombre,
				'Apellido' => $Apellido,
				'Cedula' => $Cedula,
				'Fecha_Nacimiento' => $FechaNacimiento,
				'Correo' => $Correo,
				'clave' => $Cedula);

				$this->db->insert('secretaria', $datosSecretary);

		}

		public function editarSecretary($id){
			$query = $this->db->query("SELECT * FROM secretaria WHERE idSecretaria = $id");
			return $query->result();
		}

		public function actualizarDatosSecretary($idSecretaria,$nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave){

				$datosSecretary = array(
				'idSecretaria' => $idSecretaria,
				'Nombre' => $nombre,
				'Apellido' => $Apellido,
				'Cedula' => $Cedula,
				'Fecha_Nacimiento' => $FechaNacimiento,
				'Correo' => $Correo,
				'clave' => $Cedula
			);

			$this->db->where('idSecretaria', $datosSecretary['idSecretaria']);
			$this->db->update('Secretaria', $datosSecretary);


		}

		public function borrar($id){

			$this->db->where('idSecretaria', $id);
			$this->db->delete('secretaria');
		}		
	}

?>