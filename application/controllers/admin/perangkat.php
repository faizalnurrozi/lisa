<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class perangkat extends MY_Controller {
	var $config_upload;
	var $path_upload;
	var $title;

	function __construct(){
		parent::__construct();

		$this->load->database();

		$this->path_upload 						= './uploads/';
		$this->config_upload['upload_path'] 	= $this->path_upload;
		$this->config_upload['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$this->config_upload['encrypt_name'] 	= TRUE;

		$this->config_upload['image_library']	= 'gd2';
		$this->config_upload['create_thumb']	= FALSE;
		$this->config_upload['maintain_ratio']	= FALSE;
		$this->config_upload['quality']			= '50%';
		$this->config_upload['width']			= 600;
		$this->config_upload['height']			= 600;

		$this->title = 'Perangkat';
	}

	public function index(){
		
		$data['userLogin'] 			= $this->session->userdata('loginData');
		$data['v_content'] 			= 'admin/perangkat/list';
		$data['data']['title']		= $this->title;

		$data['data_list']			= $this->GeneralModel->getAllPerangkat();

		$this->load->view('admin/layout',$data);

	}

	public function add(){
		
		$data['userLogin'] 					= $this->session->userdata('loginData');
		$data['v_content'] 					= 'admin/perangkat/add';
		$data['data']['title']				= $this->title;
		$data['data_perangkat_kategori'] 	= $this->GeneralModel->getAllPerangkatKategori();

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);

		$data['csrf'] = $csrf;

		$this->load->view('admin/layout', $data);

	}

	public function edit($id){
		
		$data['userLogin'] 					= $this->session->userdata('loginData');
		$data['v_content'] 					= 'admin/perangkat/add';
		$data['data']['title']				= $this->title;
		$data['data_perangkat_kategori'] 	= $this->GeneralModel->getAllPerangkatKategori();
		$data['data_list']					= $this->GeneralModel->getAllPerangkat($id);
		$data['data_perangkat_detail']		= $this->GeneralModel->getAllPerangkatDetail($id);

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

		/**
		 * Import library form_validation
		 * Import library upload
		 */
		
		$this->load->library('form_validation');
		$this->load->library('upload', $this->config_upload);

		/**
		 * Validation Form
		 */
		
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('id_perangkat_kategori', 'id_perangkat_kategori', 'required');
		$this->form_validation->set_rules('penggunaan_daya', 'penggunaan_daya', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/perangkat/add'); 
		}else{			

			/**
			 * Proses input data ke database
			 */
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->GeneralModel->generatePesan($this->upload->display_errors(), "gagal");
				redirect('admin/perangkat/add');
			}else{

				$id_perangkat = strtoupper(uniqid());

				$gambar = $this->upload->data();

				//Compress Image
				$this->config_upload['source_image']	= $this->path_upload.$gambar['file_name'];
				$this->config_upload['new_image']		= $this->path_upload.$gambar['file_name'];

				$this->load->library('image_lib', $this->config_upload);
				$this->image_lib->resize();

				$data_master = array(
					"id_perangkat"				=> $id_perangkat,
					"nama"						=> $post['nama'],
					"id_perangkat_kategori"		=> $post['id_perangkat_kategori'],
					"penggunaan_daya"			=> $post['penggunaan_daya'],
					"gambar"					=> $this->path_upload.$gambar['file_name'],
					"status"					=> $post['status']
				);
				$insert = $this->db->insert("perangkat",$data_master);

				/**
				 * Pengolahan data inputan array
				 */
				
				$i = 0;
				foreach($post['waktu_awal'] as $waktu_awal){
					$waktu_akhir = $post['waktu_akhir'][$i];

					if($waktu_awal != '' && $waktu_akhir != ''){
						$data_detail = array(
							"id_perangkat" 	=> $id_perangkat,
							"waktu_awal" 	=> $waktu_awal,
							"waktu_akhir" 	=> $waktu_akhir,
						);
						$insert_detail = $this->db->insert("perangkat_detail", $data_detail);
					}

					$i++;
				}


				/**
				 * Pengecekan status berhasil atau tidak saat simpan
				 */
				
				if($insert){
					$this->GeneralModel->generatePesan("Berhasil menambahkan data","berhasil");
					redirect('admin/perangkat');
				}else{
					$this->GeneralModel->generatePesan("Gagal menambahkan data","gagal");
					redirect('admin/perangkat/add'); 
				}
			}
		}
	}

	public function process_edit($id){
		$post = $this->input->post();

		/**
		 * Import library form_validation
		 * Import library upload
		 */
		
		$this->load->library('form_validation');
		$this->load->library('upload', $this->config_upload);

		/**
		 * Validation Form
		 */
		
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('id_perangkat_kategori', 'id_perangkat_kategori', 'required');
		$this->form_validation->set_rules('penggunaan_daya', 'penggunaan_daya', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->GeneralModel->generatePesan("Data tidak boleh diisi spasi","gagal");
			redirect('admin/perangkat/add'); 
		}else{			

			/**
			 * Proses input data ke database
			 */
			
			$dataArray = array(
				"nama"						=> $post['nama'],
				"id_perangkat_kategori"		=> $post['id_perangkat_kategori'],
				"penggunaan_daya"			=> $post['penggunaan_daya'],
				"status"					=> $post['status']
			);

			if ($this->upload->do_upload('gambar')){
				$gambar = $this->upload->data();
				$dataArray['gambar'] = $this->path_upload.$gambar['file_name'];

				$query_perangkat = $this->db->query("SELECT gambar FROM perangkat WHERE id_perangkat = '$id'");
				$result_perangkat = $query_perangkat->row();
				unlink(@$result_perangkat->gambar);

			}

			$update = $this->db->update("perangkat", $dataArray, array("id_perangkat" => $id));

			/**
			 * Pengolahan data inputan array
			 */
			
			$this->db->delete("perangkat_detail", array("id_perangkat" => $id));
			
			$i = 0;
			foreach($post['waktu_awal'] as $waktu_awal){
				$waktu_akhir = $post['waktu_akhir'][$i];

				if($waktu_awal != '' && $waktu_akhir != ''){
					$data_detail = array(
						"id_perangkat" 	=> $id,
						"waktu_awal" 	=> $waktu_awal,
						"waktu_akhir" 	=> $waktu_akhir,
					);
					$insert_detail = $this->db->insert("perangkat_detail", $data_detail);
				}

				$i++;
			}


			/**
			 * Pengecekan status berhasil atau tidak saat simpan
			 */
			
			if($update){
				$this->GeneralModel->generatePesan("Data berhasil diubah.","berhasil");
				redirect('admin/perangkat');
			}else{
				$this->GeneralModel->generatePesan("Data gagal diubah.","gagal");
				redirect('admin/perangkat/edit/'.$id); 
			}

		}
	}
	
	public function process_delete($id){

		$query_perangkat = $this->db->query("SELECT gambar FROM perangkat WHERE id_perangkat = '$id'");
		$result_perangkat = $query_perangkat->row();
		unlink(@$result_perangkat->gambar);

		$delete = $this->db->delete("perangkat", array("id_perangkat" => $id));
		$delete_detail = $this->db->delete("perangkat_detail", array("id_perangkat" => $id));
		if($delete && $delete_detail){
			$this->GeneralModel->generatePesan("Berhasil hapus data","berhasil");
		}else{
			$this->GeneralModel->generatePesan("Gagal hapus data","gagal");
		}
		redirect('admin/perangkat');
	}

}
