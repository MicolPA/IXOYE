<?php  

	class Model_admin extends CI_Model{

		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->userTbl = "administrador";
		}

		function busqueda($busqueda){

			
			$busqueda = $_GET['busqueda'];
			if (isset($busqueda)) {
				$doctores = $this->db->query("SELECT * FROM doctores WHERE Nombre LIKE '$busqueda' or Apellido LIKE '$busqueda' or Cedula LIKE '$busqueda'");

				$secretaria = $this->db->query("SELECT * FROM secretaria WHERE Nombre LIKE '$busqueda' or Apellido LIKE '$busqueda' or Cedula LIKE '$busqueda'");

				$paciente = $this->db->query("SELECT * FROM paciente WHERE Nombre LIKE '$busqueda' or Apellido LIKE '$busqueda' or Cedula LIKE '$busqueda'");

				$doctores = $doctores->result();
				$secretaria = $secretaria->result();
				$paciente = $paciente->result();

				$busqueda = array('paciente' => $paciente, 'doctores' => $doctores, 'secretaria' => $secretaria );
			}
			else{
				echo "No hay ninguna busqueda";
			}

			return $busqueda;

		}

		function mostrarDoctores(){

			$query = $this->db->query('SELECT * FROM doctores order by Apellido');
			return $query->result();
		}

		function perfil_doctor($id){

			$query = $this->db->query('SELECT * FROM doctores WHERE idDoctores='. $id);
			return $query->result();
		}

		function obtenerDepartamentos(){
			$query = $this->db->query('SELECT * FROM departamento');
			return $query->result();
		}

		public function agregarDoctor($nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave, $Estudios_Realizados, $Lugar_Especializacion, $Facultad_graduo, $Direccion_Consultorio){

				
				$datosDoctores = array(
				'Nombre' => $nombre,
				'Apellido' => $Apellido,
				'Cedula' => $Cedula,
				'Fecha_Nacimiento' => $FechaNacimiento,
				'Correo' => $Correo,
				'Estudios_Realizados' => $Estudios_Realizados,
				'Facultad_graduo' => $Facultad_graduo,
				'Telefono_Celular' => $Telefono_Celular,
				'Lugar_Especializacion' => $Lugar_Especializacion,
				'Direccion_Consultorio' => $Direccion_Consultorio,
				'clave' => $Cedula,
				'Departamento_idDepartamento' => $Lugar_Especializacion);

				$this->db->insert('doctores', $datosDoctores);

		}

		public function borrar_doctor($id){

			$this->db->where('idDoctores', $id);
			$this->db->delete('doctores');
		}

		public function editar_doctor($id){
			$query = $this->db->query("SELECT * FROM doctores WHERE idDoctores = $id");

			return $query->result();
		}

		public function actualizarDatosDoctores($idDoctores,$nombre, $Apellido, $Cedula, $FechaNacimiento, $Telefono_Celular, $Correo, $clave, $Estudios_Realizados, $Lugar_Especializacion, $Facultad_graduo, $Direccion_Consultorio){

				$datosDoctores = array(
				'idDoctores' => $idDoctores,
				'Nombre' => $nombre,
				'Apellido' => $Apellido,
				'Cedula' => $Cedula,
				'Fecha_Nacimiento' => $FechaNacimiento,
				'Correo' => $Correo,
				'Estudios_Realizados' => $Estudios_Realizados,
				'Facultad_graduo' => $Facultad_graduo,
				'Telefono_Celular' => $Telefono_Celular,
				'Lugar_Especializacion' => $Lugar_Especializacion,
				'Direccion_Consultorio' => $Direccion_Consultorio,
				'clave' => $Cedula,
				'Departamento_idDepartamento' => $Lugar_Especializacion
			);

			$this->db->where('idDoctores', $datosDoctores['idDoctores']);
			$this->db->update('doctores', $datosDoctores);


		}


		//INICIO DE SESIÓN

		function getRows($params = array()){
	        $this->db->select('*');
	        $this->db->from($this->userTbl);
	        
	        //fetch data by conditions
	        if(array_key_exists("conditions",$params)){
	            foreach ($params['conditions'] as $key => $value) {
	                $this->db->where($key,$value);
	            }
	        }
	        if(array_key_exists("idAdministrador",$params)){
	            $this->db->where('idAdministrador',$params['idAdministrador']);
	            $query = $this->db->get();
	            $result = $query->row_array();
	        }else{
	            //set start and limit
	            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
	                $this->db->limit($params['limit'],$params['start']);
	            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
	                $this->db->limit($params['limit']);
	            }
	            $query = $this->db->get();
	            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
	                $result = $query->num_rows();
	            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
	                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
	            }else{
	                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
	            }
	        }
	        //return fetched data
	        return $result;
	    }
	    
	    /*
	     * Insert user information
	    //  */
	    public function insert($data = array()) {
	        
	        //insert user data to users table
	        $insert = $this->db->insert($this->userTbl, $data);
	        
	        //return the status
	        if($insert){
	            return $this->db->insert_id();;
	        }else{
	            return false;
	        }
	    }
	}
?>