<?php  

class Model_usuario extends CI_Model{
	
	function obtenerDepartamentos(){

		$query = $this->db->query('SELECT * FROM departamento');
		return $query->result();
	}

	function obtenerCitas($id){

		$query = $this->db->query("SELECT * FROM cita WHERE Paciente_idCliente = $id order by Fecha");
		
		return $query->result();
	}

	function RealizarCita($departamento, $fecha, $hora, $id){

		$datosCita = array(

			'Fecha' => $fecha,
			'Hora' => $hora,
			'DepartamentoID' => $departamento,
			'Paciente_idCliente' => $id

		);

		$this->db->insert('cita', $datosCita);
		redirect(base_url('index.php/Usuario'));
	}

	function borrarCita($id){

		$this->db->where('idCita', $id );
		$this->db->delete('cita');
	}

	function editarCita($id){

	}

	function obtenerDatosCita($id){
		
		$query = $this->db->query("SELECT * FROM cita WHERE idCita = $id limit 1");
		return $query->result();
	}

}

?>