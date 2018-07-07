<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perangkat_kategori extends MY_Controller {
	
	var $title;

	function __construct(){
		parent::__construct();

		$this->title = "Perangkat Kategori";
	}

	public function index(){
		
		$data['userLogin'] 			= $this->session->userdata('loginData');
		$data['v_content'] 			= 'admin/perangkat_kategori/list';
		$data['data']['title']		= $this->title;

		$data['data_list']			= $this->GeneralModel->getAllPerangkatKategori();

		$this->load->view('admin/layout',$data);

	}

	public function add(){
		
		$data['userLogin'] 			= $this->session->userdata('loginData');
		$data['v_content'] 			= 'admin/perangkat_kategori/add';
		$data['data']['title']		= $this->title;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$data['csrf'] = $csrf;

		$this->load->view('admin/layout', $data);

	}

	public function edit($id){
		
		$data['userLogin'] 			= $this->session->userdata('loginData');
		$data['v_content'] 			= 'admin/perangkat_kategori/add';
		$data['data']['title']		= $this->title;
		$data['data_list']			= $this->GeneralModel->getAllPerangkatKategori($id);

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
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/perangkat_kategori/add'); 
		}else{
			$dataArray = array(
				"id_perangkat_kategori"	=> strtoupper(uniqid()),
				"nama"					=> $post['nama']
			);
			$insert = $this->db->insert("perangkat_kategori",$dataArray);
			if($insert){
				$this->GeneralModel->generatePesan("Berhasil menambahkan data","berhasil");
				redirect('admin/perangkat_kategori');
			}else{
				$this->GeneralModel->generatePesan("Gagal menambahkan data","gagal");
				redirect('admin/perangkat_kategori/add'); 
			}
		}
	}

	public function process_edit($id){
		$post = $this->input->post();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/perangkat_kategori/add'); 
		}else{
			$dataArray = array(
				"nama" => $post['nama']
			);
			$update = $this->db->update("perangkat_kategori",$dataArray,array("id_perangkat_kategori" => $id));
			if($update){
				$this->GeneralModel->generatePesan("Data berhasil diubah.","berhasil");
				redirect('admin/perangkat_kategori');
			}else{
				$this->GeneralModel->generatePesan("Data gagal diubah.","gagal");
				redirect('admin/perangkat_kategori/edit/'.$id); 
			}
		}
	}
	
	public function process_delete($id){
		$delete = $this->db->delete("perangkat_kategori",array("id_perangkat_kategori" => $id));
		if($delete){
			$this->GeneralModel->generatePesan("Berhasil hapus data","berhasil");
		}else{
			$this->GeneralModel->generatePesan("Gagal hapus data","gagal");
		}
		redirect('admin/perangkat_kategori');
	}

}
