<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	//guardar datos en base de datos
	public function guardar($nombreCategoria, $descripcion, $idCategoria=null){
		$data = array(
			'nombreCategoria' =>$nombreCategoria ,
			'descripcion' =>$descripcion 
	 	);
		if ($idCategoria) {
			$this->db->where('idCategoria',$idCategoria);
			$this->db->update('categoria',$data);
		}else{
			$this->db->insert('categoria',$data);
		}
	}
	public function eliminarCategoria($idCategoria){
		$data = array(
			'estado'=>'0' 
	 	);
		$this->db->where('idCategoria',$idCategoria);
		$this->db->update("categoria",$data);		
	}
	// solo recuperar un dato con todos sus elementos
	public function obtenerCategoria_por_id($idCategoria){
	$this->db->select('idCategoria,nombreCategoria,descripcion');
	$this->db->from('categoria');
	$this->db->where('idCategoria',$idCategoria);
	$consulta=$this->db->get();
	$resultado=$consulta->row();
	return $resultado;
	}	
	//obtener todos los datos de informes
	public function obtenerCategoria_todos(){
	$this->db->select('idCategoria,nombreCategoria,descripcion');
	$this->db->from('categoria');
	$this->db->where("estado","1");
	$this->db->order_by('idCategoria','asc');
	$consulta=$this->db->get();
	$resultado=$consulta->result();
	return $resultado;
	}
	public function listacategorias(){

    $this->db->select('idCategoria,nombreCategoria');
    $this->db->from('categoria');
    $this->db->where('estado','1');
    return $this->db->get(); 
  	}

  	public function listarCategorias(){
  	$this->db->select('@i := @i + 1 AS CONTADOR, nombreCategoria AS NOMBRECATEGORIA, descripcion AS DESCRIPCION');
    $this->db->from('categoria');
    $this->db->join('(SELECT @i := 0) CONTADOR');
    $this->db->where('estado','1');
    return $this->db->get(); 
  	}
  	public function listarCategorias2(){
  	$this->db->select('@rownum:=@rownum+1) AS rownum, nombreCategoria AS CATEGORIA, descripcion AS DESCRIPCION');
    $this->db->from('(SELECT @rownum:=0) rownum, categoria');
    $this->db->where('estado','1');
    return $this->db->get(); 
  	}
  	/*SELECT @i := @i + 1 as contador, nombreCategoria AS 'Nombre Categoria', descripcion AS Descripcion 
  	FROM categoria 
  	CROSS JOIN (SELECT @i := 0) contador 
  	WHERE estado=1*/
  	/*SELECT (@rownum:=@rownum+1) AS CONTADOR, nombreCategoria AS CATEGORIA, descripcion AS DESCRIPCION FROM (SELECT @rownum:=0) CONTADOR , categoria WHERE estado=1*/
}
