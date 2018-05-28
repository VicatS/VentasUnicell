<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data=array();
		$this->load->model('usuarios_model');
		$data['usuarios']=$this->usuarios_model->obtenerUsuario_todos();
		$this->load->view('usuario/header');
		$this->load->view('usuario/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('usuario/panel',$data);
		$this->load->view('usuario/footer');
	}
	public function ver($id){
		$data=array();
		$this->load->model('usuarios_model');
		$usuario=$this->usuarios_model->obtenerUsuario_por_id($id);
		$data['usuario']=$usuario;
		$this->load->view('informes/header');
		//aqui cargamos los datos a mostrar
		$this->load->view('informes/ver',$data);
		$this->load->view('informes/footer');
	}
	public function guardar($id=null){
		$data=array();
		$this->load->model('usuarios_model');
		if ($id) {
			$usuario=$this->usuarios_model->obtenerUsuario_por_id($id);
			$data['id']=$usuario->id;
			$data['nombre']=$usuario->nombre;
			$data['contrasena']=$usuario->contrasena;
		}else{
			$data['id']=null;
			$data['nombre']=null;
			$data['contrasena']=null;
		}
		$this->load->view('usuario/header');
		$this->load->view('usuario/aside');
		//aqui podremos guardar
		$this->load->view('usuario/guardar',$data);
		$this->load->view('usuario/footer');

	}
	public function guardar_post($id=null){
		//recibimos los datos
		if ($this->input->post()) {
			$nombre=$this->input->post('nombre');
			$contrasena=md5($this->input->post('contrasena'));
			//cargamos modelo
			$this->load->model('usuarios_model');
			$this->usuarios_model->guardar($nombre,$contrasena,$id);
			redirect('usuario');
		}else{
			$this->guardar();
		}
	}
	public function eliminar($id){
		$this->load->model('usuarios_model');
		$this->usuarios_model->eliminar($id);
		redirect('usuario');
	}
	public function alta($id){
		$this->load->model('usuarios_model');
		$this->usuarios_model->darAlta($id);
		redirect('usuario');
	}
}
