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
	public function datosunidosconpsw(){
		$this->load->database();
		$query=$this->db->query("SELECT docente.ci, usuario.Usuario,usuario.password, docente.grado, persona.nombre, persona.fecha_de_nacimiento, persona.departamento, case persona.departamento when '01' then 'Chuquisaca' when '02' then 'La Paz' when '03' then 'Cochabamba' when '04' then 'Oruro' when '05' then 'Potosí' when '06' then 'Tarija' when '07' then 'Santa Cruz' when '08' then 'Beni' when '09' then 'Pando' end as dpto FROM usuario, docente, persona WHERE docente.ci=usuario.ci and usuario.ci=persona.ci");
		return $query->result();
	}

	public function insertardoc($ci, $usuario, $contraseña,$nombre, $grado, $fecha_de_nacimiento, $departamento){
			$arrayusuario=array(
				'ci'=>$ci,
				'Usuario'=>$usuario,
				'password'=>$password
			);
		    $arraypersona=array(
				'ci'=>$ci,
				'nombre'=>$nombre,
				'fecha_de_nacimiento'=>$fecha_de_nacimiento,
				'departamento'=>$departamento
			);
			$arraydocente=array(
				'ci'=>$ci,
				'grado'=>$grado
			);
			$this->db->insert('usuario',$arrayusuario);
			$this->db->insert('persona',$arraypersona);
			$this->db->insert('docente',$arraydocente);
	}
}
