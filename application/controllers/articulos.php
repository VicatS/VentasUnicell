<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data=array();
		$this->load->model('articulos_model');
		$data['articulos']=$this->articulos_model->obtenerArticulo_todos();
		$this->load->view('articulos/header');
		$this->load->view('articulos/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('articulos/panel',$data);
		$this->load->view('articulos/footer');
	}
	public function verArticulo(){
		$data=array();
		$this->load->model('articulos_model');
		$articulo=$this->articulos_model->obtenerArticulo_por_id($idArticulo);
		$data['articulo']=$articulo;
		$this->load->view('articulo/header');
		$this->load->view('articulo/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('articulo/ver',$data);
		$this->load->view('articulo/footer');
	}
	public function guardar($idArticulo=null){
		$data=array();
		$this->load->model('articulos_model');
		if ($idArticulo) {
			$articulo=$this->articulos_model->obtenerArticulo_por_id($idArticulo);
			$data['idArticulo']=$articulo->idArticulo;
			$data['idCategoria']=$articulo->idCategoria;
			$data['codigoImei']=$articulo->codigoImei;
			$data['nombre']=$articulo->nombre;
			$data['marca']=$articulo->marca;
			$data['stock']=$articulo->stock;
			$data['descripcion']=$articulo->descripcion;
		}else{
			$data['idArticulo']=null;
			$data['idCategoria']=null;
			$data['codigoImei']=null;
			$data['nombre']=null;
			$data['marca']=null;
			$data['stock']=null;
			$data['descripcion']=null;
		}
		$this->load->view('articulos/header');
		$this->load->view('articulos/aside');
		//aqui podremoscategorias
		$this->load->view('articulos/guardar',$data);
		$this->load->view('articulos/footer');

	}
	public function guardar_post($idArticulo=null){
		//recibimos los datos
		if ($this->input->post()) {
			$idCategoria=$this->input->post('idCategoria');
			$codigoImei=$this->input->post('codigoImei');
			$nombre=$this->input->post('nombre');
			$marca=$this->input->post('marca');
			$stock=$this->input->post('stock');
			$descripcion=$this->input->post('descripcion');
			//cargamos modelo
			$this->load->model('articulos_model');
			$this->articulos_model->guardar($idCategoria,$codigoImei,$nombre,$marca,$stock,$descripcion,$idArticulo);
			redirect('articulos');
		}else{
			$this->guardar();
		}
	}
	/*public function guardar_post($idArticulo=null){
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
	         	$this->load->view('categorias/guardar', $data);
	        	 $this->load->view('categorias/footer');
			}
		}else{
			$this->guardar();
		}
	}*/
	public function eliminar($idArticulo){
		$this->load->model('articulos_model');
		$this->articulos_model->eliminarArticulo($idArticulo);
		redirect('articulos');
	}
}
