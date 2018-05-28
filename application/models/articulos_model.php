<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	//guardar datos en base de datos
	public function guardar($idCategoria, $codigoImei, $nombre, $marca, $stock, $descripcion, $idArticulo=null){
		$data = array(
			'idCategoria' =>$idCategoria,
			'codigoImei' =>$codigoImei,
			'nombre'=>$nombre,
			'marca'=>$marca, 
			'stock'=>$stock, 
			'descripcion'=>$descripcion  
	 	);
		if ($idArticulo) {
			$this->db->where('idArticulo',$idArticulo);
			$this->db->update('articulo',$data);
		}else{
			$this->db->insert('articulo',$data);
		}
	}
	public function eliminarArticulo($idArticulo){
		$data = array(
			'estado'=>'0' 
	 	);
		$this->db->where('idArticulo',$idArticulo);
		$this->db->update("articulo",$data);		
	}
	// solo recuperar un dato con todos sus elementos
	public function obtenerArticulo_por_id($idArticulo){
	$this->db->select('idArticulo,idCategoria,codigoImei,nombre,marca,stock,descripcion');
	$this->db->from('articulo');
	$this->db->where('idArticulo',$idArticulo);
	$consulta=$this->db->get();
	$resultado=$consulta->row();
	return $resultado;
	}	
	//obtener todos los datos de informes
	public function obtenerArticulo_todos(){
	$this->db->select('idArticulo,idCategoria,codigoImei,nombre,marca,stock,descripcion');
	$this->db->from('articulo');
	$this->db->where("estado","1");
	$this->db->order_by('idArticulo','asc');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;
	}

}
