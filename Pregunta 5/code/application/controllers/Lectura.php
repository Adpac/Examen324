<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lectura extends CI_Controller {

public function __construct(){
   parent::__construct();

}
	public function index()
	{
		$this->load->model("BdAdel_model");
		$filasper=$this->BdAdel_model->persona();
		$filasdoc=$this->BdAdel_model->docente();
		$filasuser=$this->BdAdel_model->usuario();
		$filas=$this->BdAdel_model->datosunidos();
		$data['personas']=$filasper;
		$data['docentes']=$filasdoc;
		$data['usuarios']=$filasuser;
		$data['unidos']=$filas;
		
		$this->load->helper('url');
		$this->load->view('MyView',$data);
	}
	public function adddoc(){
		$this->load->model("BdAdel_model");
		$filasper=$this->BdAdel_model->persona();
		$filasdoc=$this->BdAdel_model->docente();
		$filasuser=$this->BdAdel_model->usuario();
		$filas=$this->BdAdel_model->datosunidos();
		$data['personas']=$filasper;
		$data['docentes']=$filasdoc;
		$data['usuarios']=$filasuser;
		$data['unidos']=$filas;
		
		$this->load->helper('url');
		$this->load->view('Adddoc',$data);
	}
	public function editdoc(){
		$cidoc=$this->input->post();
		$ci=$cidoc['ci'];
		$this->load->model("BdAdel_model");
		$docente=$this->BdAdel_model->datosdedocente($ci);
		$data['docente']=$docente;
		$this->load->helper('url');
		$this->load->view('Adddoc',$data);
	}
	public function insertoeditdocente(){
		$this->load->model("BdAdel_model");
		$datos=$this->input->post();
		if(isset($datos)){
			$caso=$datos['caso'];
			$ci= $datos['ci'];
			$usuario= $datos['usuario'];
			$contraseña= $datos['contraseña'];
			$nombre= $datos['nombre'];
			$grado= $datos['grado'];
			$fechanac= $datos['fecha_de_nacimiento'];
			$departamento= $datos['departamento'];
		

			if($caso=="nuevo"){
		
				$this->BdAdel_model->insertdocente($ci,$usuario, $contraseña, $nombre, $fechanac, $departamento, $grado);
				$data['inf']="Se agrego correctamente";
				$this->load->helper('url');
				$this->load->view('Exitosa',$data);
				
			}else{
				$clave=$datos['clave'];
				$this->BdAdel_model->editardocente($clave,$ci,$usuario, $contraseña, $nombre, $fechanac, $departamento, $grado);
				$data['inf']="Se edito correctamente";
				$this->load->helper('url');
				$this->load->view('Exitosa',$data);
			}
		}
	}

	public function confirelimdoc(){

		$datos=$this->input->post();
		
		$this->load->helper('url');
		$this->load->view('Confelim',$datos);
	}

	public function eliminar(){
		$this->load->model("BdAdel_model");
		$datos=$this->input->post();

		$ci= $datos['ci'];
		$this->BdAdel_model->eliminardoc($ci);
	
		$data['inf']="Se Elimino correctamente";
		$this->load->helper('url');
		$this->load->view('Exitosa',$data);
	}

	
	
}
