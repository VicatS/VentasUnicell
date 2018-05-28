<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	//guardar datos en base de datos
	public function guardar($carnet, $nombres,$apellidoPaterno,$apellidoMaterno, $idCliente=null){
		$data = array(
			'carnet' =>$carnet ,
			'nombres' =>$nombres,
			'apellidoPaterno' =>$apellidoPaterno,
			'apellidoMaterno' =>$apellidoMaterno
	 	);
	 	// si los datos a ingresar ya existe, los actualiza
		if ($idCliente) {
			$this->db->where('idCliente',$idCliente);
			$this->db->update('cliente',$data);
		}else{
			$this->db->insert('cliente',$data);
		}
	}
	public function eliminarCliente($idCliente){
		$data = array(
			'estado'=>'0' 
	 	);
		$this->db->where('idCliente',$idCliente);
		$this->db->update("cliente",$data);		
	}
	// solo recuperar un dato con todos sus elementos
	public function obtenerCliente_por_id($idCliente){
	$this->db->select('idCliente,carnet,nombres,apellidoPaterno,apellidoMaterno');
	$this->db->from('cliente');
	$this->db->where('idCliente',$idCliente);
	$consulta=$this->db->get();
	$resultado=$consulta->row();
	return $resultado;
	}	
	//obtener todos los datos de informes
	public function obtenerCliente_todos(){
	$this->db->select('idCliente,carnet,nombres,apellidoPaterno,apellidoMaterno');
	$this->db->from('cliente');
	$this->db->where("estado","1");
	$this->db->order_by('idCliente','asc');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;
	}

}
