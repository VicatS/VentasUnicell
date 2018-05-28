<?php

class Productos_model extends CI_Model
{

	public function recuperarCategoria(){
	$this->db->select('idCategoria,nombreCategoria');
	$this->db->from('categoria');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;

	}
	public function agregarProducto($data){
		$this->db->insert('articulo',$data);
	}
	//obtener todos los productos en general
	public function obtenerProducto(){
	$this->db->select('A.idArticulo AS ID,C.nombreCategoria AS CATEGORIA,A.codigoImei AS CODIGO,A.nombre AS NOMBRE,A.marca AS MARCA,A.stock AS STOCK,A.descripcion AS DESCRIPCION,A.imagen AS IMAGEN');
	$this->db->from('articulo A');
	$this->db->where('A.estado','1');
	$this->db->join('categoria C','A.idCategoria=C.idCategoria');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;
	}
	public function modificarProducto($idCategoria,$codigoImei,$nombre,$marca,$stock,$descripcion,$imagen,$idArticulo=null){
		$data = array(
			'idCategoria' =>$idCategoria,
			'codigoImei' =>$codigoImei,
			'nombre' =>$nombre,
			'marca' =>$marca,
			'stock' =>$stock,
			'descripcion' =>$descripcion,
			'imagen' =>$imagen  
		);
		if ($idArticulo) {
			$this->db->where('idArticulo',$idArticulo);
			$this->db->update('articulo',$data);
		}else{
			$this->db->insert('articulo',$data);
		}
	}
	public function eliminarProducto(){
		$data = array(
			'estado' =>'0'
		);
		$this->db->where('idArticulo',$idArticulo);
		$this->db->update('articulo',$data);
	}
	public function obtenerProductoId($idArticulo){
		$this->db->select('A.idArticulo AS ID,C.nombreCategoria AS CATEGORIA,A.codigoImei AS CODIGO,A.nombre AS NOMBRE,A.marca AS MARCA,A.stock AS STOCK,A.descripcion AS DESCRIPCION,A.imagen AS IMAGEN');
		$this->db->from('articulo');
		$this->db->where('idArticulo',$idArticulo);
		$consulta=$this->db->get();
		$resultado=$consulta->row();
		return $resultado;
	}
}
?>