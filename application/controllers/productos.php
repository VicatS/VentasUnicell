<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('productos_model');
			$this->load->model('categorias_model');
		}

		public function index(){
			$data = array();
			$this->load->model('productos_model');
			$data['productos']=$this->productos_model->obtenerProducto();
			$this->load->view('productos/header');
			$this->load->view('productos/aside');
			$this->load->view('productos/panel',$data);
			$this->load->view('productos/footer');
		}
		public function registrarProducto(){
			
		$imagenNombre=$_FILES['foto']['name'];
	    $foto="imagenes/$imagenNombre";
	    move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

		$data['idCategoria']=$_POST['idCategoria'];
		$data['codigoImei']=$_POST['codigoImei'];
		$data['nombre']=$_POST['nombre'];
		$data['marca']=$_POST['marca'];
		$data['stock']=$_POST['stock'];
		$data['descripcion']=$_POST['descripcion'];
		$data['imagen']=$foto;
		$this->productos_model->agregarProducto($data);
		$data['idCategoria']=$_POST['idCategoria'];
		$data['codigoImei']=$_POST['codigoImei'];
		$data['nombre']=$_POST['nombre'];
		$data['marca']=$_POST['marca'];
		$data['stock']=$_POST['stock'];
		$data['descripcion']=$_POST['descripcion'];
		$data['imagen']=$foto;
		$this->load->view('productos/header');
		$this->load->view('productos/aside');
		$this->load->view('productos/agregarProducto',$data);
		$this->load->view('productos/footer');
		}

		public function registrar(){
			$data['categorias']=$this->categorias_model->listacategorias();
			$this->load->view('productos/header');
			$this->load->view('productos/aside');
			$this->load->view('productos/agregarProducto',$data);
			$this->load->view('productos/footer');
		}
		public function actualizarProducto($idArticulo=null){
			$data = array();
			$this->load->model('productos_model');
			if ($idArticulo) {
				$producto=$this->productos_model->obtenerProductoId($idArticulo);
				$data['ID']=$articulo->idArticulo;
				$data['CATEGORIA']=$articulo->idCategoria;
				$data['CODIGO']=$articulo->codigoImei;
				$data['NOMBRE']=$articulo->nombre;
				$data['MARCA']=$articulo->marca;
				$data['STOCK']=$articulo->stock;
				$data['DESCRIPCION']=$articulo->descripcion;
				$data['IMAGEN']=$articulo->imagen;
			}else{
				$data['ID']=null;
				$data['ID']=null;
				$data['CATEGORIA']=null;
				$data['CODIGO']=null;
				$data['NOMBRE']=null;
				$data['MARCA']=null;
				$data['STOCK']=null;
				$data['DESCRIPCION']=null;
				$data['IMAGEN']=null;
			}
			$this->load->view('productos/header');
			$this->load->view('productos/aside');
			$this->load->view('productos/guardar',$data);
			$this->load->view('productos/footer');
		}
		public function actualizarProductoPost($idArticulo=null){
			if ($this->input->post()) {
				$idCategoria=$this->input->post('CATEGORIA');
				$nombre=$this->input->post('CODIGO');
				$idCategoria=$this->input->post('NOMBRE');
				$idCategoria=$this->input->post('MARCA');
				$idCategoria=$this->input->post('STOCK');
				$idCategoria=$this->input->post('DESCRIPCION');
				$idCategoria=$this->input->post('IMAGEN');
			}
		}

	}
		/*
public function index()
{
	if($this->session->userdata('logueado')){
         $data = array();
         $data['nombre'] = $this->session->userdata('nombre');
	$this->load->view('inc/header');
		$this->load->view('inc/logo');
		$this->load->view('inc/menu');
		$this->load->view('principal');
		$this->load->view('inc/scrips');
		 }else{
         redirect('login');
      }
      	public function index2(){
		$data=array();
		$this->load->model('productos_model');
		$data['productos']=$this->productos_model->obtenerProducto();
		$this->load->view('productos/header');
		$this->load->view('productos/aside');
		//aqui cargamos los datos a mostrar
		$this->load->view('productos/panel',$data);
		$this->load->view('productos/footer');
	}
}*/
