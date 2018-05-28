<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Usuarios extends CI_Controller {
   public function __construct() {
      parent::__construct();
   }
   public function iniciar_sesion() {
      $data = array();
      $data['error'] = $this->session->flashdata('error');
      $this->load->view('usuarios/iniciar_sesion', $data);
   }
   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $nombre = $this->input->post('nombre');
         $contrasena = md5($this->input->post('contrasena'));
         $this->load->model('usuario_model');
         $usuario = $this->usuario_model->usuario_por_nombre_contrasena($nombre, $contrasena);
         if ($usuario) {
            $usuario_data = array(
               'id' => $usuario->id,
               'nombre' => $usuario->nombre,
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            redirect('usuarios/logueado');
         } else {
            $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
            redirect('usuarios/iniciar_sesion');
         }
      } else {
         $this->iniciar_sesion();
      }
   }
   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['nombre'] = $this->session->userdata('nombre');
         $this->load->view('usuarios/header');
         $this->load->view('usuarios/aside');
         $this->load->view('usuarios/logueado', $data);
         $this->load->view('usuarios/footer');
      }else{
         redirect('usuarios/iniciar_sesion');
      }
   }
   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      redirect('usuarios/iniciar_sesion');
   }
}