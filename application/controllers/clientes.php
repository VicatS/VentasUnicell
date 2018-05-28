<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data=array();
		$this->load->model('clientes_model');
		$data['clientes']=$this->clientes_model->obtenerCliente_todos();
		$this->load->view('clientes/header');
		$this->load->view('clientes/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('clientes/panel',$data);
		$this->load->view('clientes/footer');
	}
	public function verCliente($idCliente){
		$data=array();
		$this->load->model('clientes_model');
		$informe=$this->clientes_model->obtenerCliente_por_id($idCliente);
		$data['cliente']=$cliente;
		$this->load->view('clientes/header');
		$this->load->view('clientes/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('clientes/ver',$data);
		$this->load->view('clientes/footer');
	}
	public function guardar($idCliente=null){
		$data=array();
		$this->load->model('clientes_model');
		if ($idCliente) {
			$cliente=$this->clientes_model->obtenerCliente_por_id($idCliente);
			$data['idCliente']=$cliente->idCliente;
			$data['carnet']=$cliente->carnet;
			$data['nombres']=$cliente->nombres;
			$data['apellidoPaterno']=$cliente->apellidoPaterno;
			$data['apellidoMaterno']=$cliente->apellidoMaterno;
		}else{
			$data['idCliente']=null;
			$data['carnet']=null;
			$data['nombres']=null;
			$data['apellidoPaterno']=null;
			$data['apellidoMaterno']=null;
		}
		$this->load->view('clientes/header');
		$this->load->view('clientes/aside');
		//aqui podremos guardar
		$this->load->view('clientes/guardar',$data);
		$this->load->view('clientes/footer');

	}
	public function guardar_post($idCliente=null){
		//recibimos los datos
		if ($this->input->post()) {
			$carnet=$this->input->post('carnet');
			$nombres=$this->input->post('nombres');
			$apellidoPaterno=$this->input->post('apellidoPaterno');
			$apellidoMaterno=$this->input->post('apellidoMaterno');
			//cargamos modelo
			$this->load->model('clientes_model');
			$this->clientes_model->guardar($carnet,$nombres,$apellidoPaterno,$apellidoMaterno);
			redirect('clientes');
		}else{
			$this->guardar();
		}
	}
	public function eliminar($idCliente){
		$this->load->model('clientes_model');
		$this->clientes_model->eliminarCliente($idCliente);
		redirect('clientes');
	}
}
