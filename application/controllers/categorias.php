<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s es obligatorio.');
		$this->form_validation->set_message('alphat', '%s debe tener caracteres alfabéticos.');
	}
	public function index(){
		$data=array();
		$this->load->model('categorias_model');
		$data['categorias']=$this->categorias_model->obtenerCategoria_todos();
		$this->load->view('categorias/header');
		$this->load->view('categorias/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('categorias/panel',$data);
		$this->load->view('categorias/footer');
	}
	public function verCategoria(){
		$data=array();
		$this->load->model('categorias_model');
		$categoria=$this->categorias_model->obtenerCategoria_por_id($idCategoria);
		$data['categoria']=$categoria;
		$this->load->view('categorias/header');
		$this->load->view('categorias/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('categorias/ver',$data);
		$this->load->view('categorias/footer');
	}
	public function guardar($idCategoria=null){
		$data=array();
		$this->load->model('categorias_model');
		if ($idCategoria) {
			$categoria=$this->categorias_model->obtenerCategoria_por_id($idCategoria);
			$data['idCategoria']=$categoria->idCategoria;
			$data['nombreCategoria']=$categoria->nombreCategoria;
			$data['descripcion']=$categoria->descripcion;
		}else{
			$data['idCategoria']=null;
			$data['nombreCategoria']=null;
			$data['descripcion']=null;
		}
		$this->load->view('categorias/header');
		$this->load->view('categorias/aside');
		//aqui podremoscategorias
		$this->load->view('categorias/guardar',$data);
		$this->load->view('categorias/footer');

	}
	public function guardar_post($idCategoria=null){
		//recibimos los datos
		if ($this->input->post()) {
			$nombreCategoria=$this->input->post('nombreCategoria');
			$descripcion=$this->input->post('descripcion');
			$this->form_validation->set_rules('nombreCategoria', 'Este campo', 'required');
		    $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
			//cargamos modelo
			if ($this->form_validation->run()==TRUE) {
				$this->load->model('categorias_model');
				$this->categorias_model->guardar($nombreCategoria,$descripcion,$idCategoria);
				redirect('categorias');
			}else{
				  $data = array();
	         	$data['idCategoria'] = $idCategoria;
	         	$data['nombreCategoria'] = $nombreCategoria;
	         	$data['descripcion'] = $descripcion;
	         	$this->load->view('categorias/header');
	         	$this->load->view('categorias/aside');
	         	$this->load->view('categorias/guardar', $data);
	        	$this->load->view('categorias/footer');
			}
		}else{
			$this->guardar();
		}
	}
	public function eliminar($idCategoria){
		$this->load->model('categorias_model');
		$this->categorias_model->eliminarCategoria($idCategoria);
		redirect('categorias');
	}
}
