<?php 

class Model_doctor extends CI_Model{

	function listadoPacientesCita(){

		$query = $this->db->query("SELECT * FROM cita ORDER BY Fecha");
		return $query->result();
	}

	function listadoPacientes(){

		$query = $this->db->query("SELECT * FROM paciente");
		return $query->result();
	}

	function obtenerDepartamento(){

		$query = $this->db->query("SELECT * FROM departamento");
		return $query->result();
	}

	function obtenerExpediente($id){
		$query = $this->db->query("SELECT * FROM consulta WHERE Paciente_idCliente = $id");
		return $query->result();
	}

	function listadoPacienteExp($id){
		$query = $this->db->query("SELECT * FROM paciente WHERE id = $id");
		return $query->result();
	}

	function guardarConsulta($id, $peso, $estatura, $presionArterial, $observaciones, $razonConsulta, $alergias, $sintomas, $estudios, $diagnostico){

		$fecha = date("Y/m/d h:m:s");
		$pacienteId = $id;
		$doctorId = $_SESSION['userId'];

		$datosConsulta = array(

			'Peso' 					=> $peso,
			'Estatura' 				=> $estatura,
			'Presion_arterial'		=> $presionArterial,
			'Sintomas'				=> $sintomas,
			'Alergias'				=> $alergias,
			'Receta'				=> $Receta,
			'Estudios_Laboratorios'	=> $estudios,
			'Diagnostico'			=> $diagnostico,
			'Razon_Consulta'		=> $razonConsulta,
			'Observaciones'			=> $observaciones,
			'Fecha_Consulta'		=> $fecha,
			'Paciente_idCliente'	=> $pacienteId,
			'Doctores_idDoctores'	=> $doctorId

		);

		$this->db->insert('consulta', $datosConsulta);
		redirect(base_url('index.php/doctor'));

	}

	function actualizarConsulta($id, $peso, $estatura, $presionArterial, $observaciones, $razonConsulta, $alergias, $sintomas, $estudios, $diagnostico){

		$fecha = date("Y/m/d h:m:s");
		$pacienteId = $id;
		$doctorId = $_SESSION['userId'];

		$datosConsulta = array(

			'Peso' 					=> $peso,
			'Estatura' 				=> $estatura,
			'Presion_arterial'		=> $presionArterial,
			'Sintomas'				=> $sintomas,
			'Alergias'				=> $alergias,
			'Receta'				=> $Receta,
			'Estudios_Laboratorios'	=> $estudios,
			'Diagnostico'			=> $diagnostico,
			'Razon_Consulta'		=> $razonConsulta,
			'Observaciones'			=> $observaciones,
			'Fecha_Consulta'		=> $fecha,
			'Paciente_idCliente'	=> $pacienteId,
			'Doctores_idDoctores'	=> $doctorId

		);

		$this->db->where('Paciente_idCliente', $id);
		$this->db->update('consulta', $datosConsulta);
		redirect(base_url('index.php/doctor'));

	}
}

?>