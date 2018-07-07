<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class token_transaksi extends MY_Controller {
	var $title;
	var $biaya_admin, $tarif, $pjj;

	function __construct(){
		parent::__construct();

		$this->title = "Topup Token";

		$this->biaya_admin = 0;
		$this->pjj = 8;
	}

	public function index(){
		
		$data['userLogin'] 		= $this->session->userdata('loginData');
		$data['v_content'] 		= 'admin/token_transaksi/list';
		$data['data']['title']	= $this->title;

		$data['data_list']		= $this->GeneralModel->getAllTokenTransaksi();

		$this->load->view('admin/layout', $data);

	}

	public function add(){
		
		$data['userLogin'] 		= $this->session->userdata('loginData');
		$data['v_content'] 		= 'admin/token_transaksi/add';
		$data['data']['title']	= $this->title;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$data['csrf'] = $csrf;

		$data['perhitungan_dasar']['biaya_admin'] 	= $this->biaya_admin;
		$data['perhitungan_dasar']['pjj'] 			= $this->pjj;

		$this->load->view('admin/layout', $data);

	}

	public function edit($id){
		
		$data['userLogin'] 			= $this->session->userdata('loginData');
		$data['v_content'] 			= 'admin/token_transaksi/add';
		$data['data']['title']		= $this->title;
		$data['data_list']			= $this->GeneralModel->getAllTokenTransaksi($id);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$data['csrf'] = $csrf;
		$data['edit'] = true;

		$this->load->view('admin/layout', $data);

	}

	public function process_add(){

		$post = $this->input->post();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('penambahan_daya', 'penambahan_daya', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/token_transaksi/add'); 
		}else{

			$id_token_transaksi = strtoupper(uniqid());

			$data_master = array(
				"id_token_transaksi"	=> $id_token_transaksi,
				"tanggal"				=> $post['tanggal'],
				"biaya_admin"			=> $post['biaya_admin'],
				"pjj"					=> $post['pjj'],
				"nilai_pjj"				=> $post['nilai_pjj'],
				"biaya_materai"			=> $post['biaya_materai'],
				"nilai_token"			=> $post['nilai_token'],
				"penambahan_daya"		=> $post['penambahan_daya'],
				"biaya"					=> $post['biaya']
			);

			$insert = $this->db->insert("token_transaksi", $data_master);
			$insert = $this->db->insert("transaksi_perangkat", array('id_token_transaksi' => $id_token_transaksi, 'penambahan_daya' => $post['penambahan_daya']));

			if($insert){
				$this->GeneralModel->generatePesan("Berhasil menambahkan data","berhasil");
				redirect('admin/token_transaksi');
			}else{
				$this->GeneralModel->generatePesan("Gagal menambahkan data", "gagal");
				redirect('admin/token_transaksi/add'); 
			}

		}

	}

	public function process_edit($id){

		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('penambahan_daya', 'penambahan_daya', 'trim|required');
		$this->form_validation->set_rules('biaya', 'biaya', 'trim|required');

		if($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/token_transaksi/add'); 
		}else{

			$data_master = array(
				"tanggal"				=> $post['tanggal'],
				"biaya_admin"			=> $post['biaya_admin'],
				"pjj"					=> $post['pjj'],
				"nilai_pjj"				=> $post['nilai_pjj'],
				"biaya_materai"			=> $post['biaya_materai'],
				"nilai_token"			=> $post['nilai_token'],
				"penambahan_daya"		=> $post['penambahan_daya'],
				"biaya"					=> $post['biaya']
			);

			$update = $this->db->update("token_transaksi", $data_master, array("id_token_transaksi" => $id));
			$update = $this->db->update("transaksi_perangkat", array("penambahan_daya" => $post['penambahan_daya']), array("id_token_transaksi" => $id));

			if($update){
				$this->GeneralModel->generatePesan("Data berhasil diubah.","berhasil");
				redirect('admin/token_transaksi');
			}else{
				$this->GeneralModel->generatePesan("Data gagal diubah.","gagal");
				redirect('admin/token_transaksi/edit/'.$id); 
			}

		}

	}
	
	public function process_delete($id){

		$delete = $this->db->delete("token_transaksi", array("id_token_transaksi" => $id));
		$delete_2 = $this->db->delete("transaksi_perangkat", array("id_token_transaksi" => $id));
		if($delete && $delete_2){
			$this->GeneralModel->generatePesan("Berhasil hapus data","berhasil");
		}else{
			$this->GeneralModel->generatePesan("Gagal hapus data","gagal");
		}
		redirect('admin/token_transaksi');

	}

}
