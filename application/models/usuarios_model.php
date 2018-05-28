<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	//guardar datos en base de datos
	public function guardar($nombre,$contrasena, $id=null){
		$data = array(
			'nombre' =>$nombre ,
			'contrasena' =>$contrasena
	 	);
		if ($id) {
			$this->db->where('id',$id);
			$this->db->update('usuarios',$data);
		}else{
			$this->db->insert('usuarios',$data);
		}
	}
	public function eliminar($id){
		$data = array(
			'estado'=>'0' 
	 	);
		$this->db->where('id',$id);
		$this->db->update('usuarios',$data);		
	}
	// solo recuperar un dato con todos sus elementos
	public function obtenerUsuario_por_id($id){
	$this->db->select('id,nombre,contrasena');
	$this->db->from('usuarios');
	$this->db->where('id',$id);
	$consulta=$this->db->get();
	$resultado=$consulta->row();
	return $resultado;
	}	
	//obtener todos los datos de informes
	public function obtenerUsuario_todos(){
	$this->db->select('id,nombre,contrasena');
	$this->db->from('usuarios');
	$this->db->where("estado","1");
	$this->db->order_by('nombre,contrasena','asc');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;
	}
	public function darAlta($id){
		$data = array(
			'estado'=>'1' 
	 	);
		$this->db->where('id',$id);
		$this->db->update('usuarios',$data);
	}
}
