<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lectura extends CI_Controller {


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
		$this->load->view('MyViewaddDocente',$data);
	}
	public function insertdocente(){
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
		
			$this->BdAdel_model->insertardoc($ci,$usuario,$contraseña,$nombre,$grado,$fechanac,$departamento);
			redirect('index');
			}else{
				
			}
		}
	}
	
	
}
