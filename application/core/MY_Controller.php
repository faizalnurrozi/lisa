<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('GeneralModel');
		$this->load->library('session');

		if(!$this->session->userdata('loginData') || !$this->session->loginData){
			redirect('login');
		}

	}
}
