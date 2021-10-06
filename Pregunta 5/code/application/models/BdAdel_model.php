<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BdAdel_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();

	}

	public function persona()
	{
		$this->load->database();
		$query=$this->db->query('select * from persona');
		return $query->result();
	}
	public function docente(){
		$this->load->database();
		$query=$this->db->query('select * from docente');
		return $query->result();
	}
	public function usuario(){
		$this->load->database();
		$query=$this->db->query('select * from docente');
		return $query->result();
	}
	
	public function datosunidos(){
		$this->load->database();
		$query=$this->db->query("SELECT docente.ci, usuario.Usuario, docente.grado, persona.nombre, persona.fecha_de_nacimiento, persona.departamento, case persona.departamento when '01' then 'Chuquisaca' when '02' then 'La Paz' when '03' then 'Cochabamba' when '04' then 'Oruro' when '05' then 'Potosí' when '06' then 'Tarija' when '07' then 'Santa Cruz' when '08' then 'Beni' when '09' then 'Pando' end as dpto FROM usuario, docente, persona WHERE docente.ci=usuario.ci and usuario.ci=persona.ci");
		return $query->result();
	}
	public function datosdedocente($ci){
		$this->load->database();
		$query=$this->db->query("SELECT docente.ci, usuario.Usuario,usuario.password, docente.grado, persona.nombre, persona.fecha_de_nacimiento, persona.departamento, case persona.departamento when '01' then 'Chuquisaca' when '02' then 'La Paz' when '03' then 'Cochabamba' when '04' then 'Oruro' when '05' then 'Potosí' when '06' then 'Tarija' when '07' then 'Santa Cruz' when '08' then 'Beni' when '09' then 'Pando' end as dpto FROM usuario, docente, persona WHERE docente.ci=usuario.ci and usuario.ci=persona.ci and persona.ci=".$ci);
		$fila = $query->row_array(1);
		return $fila;
	}


	public function editardocente($clave,$ci,$usuario, $contraseña, $nombre, $fechanac, $departamento, $grado){
		$this->load->database();
			$datausuario = array(
				'ci' => $ci,
				'Usuario' => $usuario,
				'password'=>$contraseña
			);
			$this->db->where('ci', $clave);
			$this->db->update('usuario',$datausuario);

			$datapersona = array(
				'ci' => $ci,
				'nombre' => $nombre,
				'fecha_de_nacimiento'=>$fechanac,
				'departamento'=>$departamento
			);
			$this->db->where('ci', $clave);
			$this->db->update('persona',$datapersona);
			$datadocente = array(
				'ci' => $ci,
				'grado' => $grado);
			$this->db->where('ci', $clave);
			$this->db->update('docente',$datadocente);
			return "operacion completada";
		}

	public function insertdocente($ci,$usuario, $contraseña, $nombre, $fechanac, $departamento, $grado){
		$this->load->database();
			$datausuario = array(
				'ci' => $ci,
				'Usuario' => $usuario,
				'password'=>$contraseña
			);
	    $this->db->insert('usuario',$datausuario);

			$datapersona = array(
				'ci' => $ci,
				'nombre' => $nombre,
				'fecha_de_nacimiento'=>$fechanac,
				'departamento'=>$departamento
			);
		$this->db->insert('persona',$datapersona);
			$datadocente = array(
				'ci' => $ci,
				'grado' => $grado);
 		$this->db->insert('docente',$datadocente);
			return "operacion completada";
		}
	public function eliminardoc($ci){
		$this->load->database();
		$this->db->delete('usuario', array('ci' => $ci));
		$this->db->delete('persona', array('ci' => $ci));
		$this->db->delete('docente', array('ci' => $ci));
		return "operacion completada";
	}


}
