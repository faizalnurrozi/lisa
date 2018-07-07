<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GeneralModel');
		$this->load->model('M_login');
	}

	public function index(){
		if($this->session->userdata('loginData')){
			redirect('admin/dashboard');
		}else{

			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
			);

			$data['csrf'] = $csrf;
		
			$data['project_name'] = "Lisa V.1.0";
			$data['established'] = date("Y");
			$this->load->view('admin/Login', $data);
		}
	}

	public function doLogin(){
		$dataPost = $this->input->post();
		if ($this->GeneralModel->checkLogin($dataPost['Username'], $dataPost['Password'])){
			redirect('admin/dashboard');  
		}else{
			$this->session->set_flashdata('GagalLogin', 'Ya');

			redirect('login');
		}
	}

	function logout(){
		$this->session->unset_userdata('loginData');
		redirect('login');
	}

}
