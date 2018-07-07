<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hitung_penggunaan extends MY_Controller {
	var $title;

	function __construct(){
		parent::__construct();

		$this->load->database();
		$this->title = "Hitung Penggunaan";
	}

	public function index(){
		
		$data['userLogin'] 		= $this->session->userdata('loginData');
		$data['v_content'] 		= 'admin/hitung_penggunaan/main';
		$data['data']['title']	= $this->title;

		$data['data_list']		= $this->GeneralModel->getAllTokenTransaksi();

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;

		$this->load->view('admin/layout', $data);

	}

	public function process_hitung(){

		$this->db->select('A.id_perangkat, B.waktu_awal, B.waktu_akhir, (((TIME_TO_SEC(TIMEDIFF(B.waktu_akhir, B.waktu_awal))/(60*60))*A.penggunaan_daya)/1000) AS penggunaan_daya_total');
		$this->db->from('perangkat AS A');
		$this->db->join('perangkat_detail AS B','A.id_perangkat = B.id_perangkat');
		$this->db->where('status', 'JALAN');
		$query = $this->db->get();
		$resultx = $query->result();

		foreach($resultx as $result_perangkat){
			$insert = $this->db->insert("transaksi_perangkat", array("id_perangkat" => $result_perangkat->id_perangkat, "waktu_awal" => $result_perangkat->waktu_awal, "waktu_akhir" => $result_perangkat->waktu_akhir, "penggunaan_daya" => $result_perangkat->penggunaan_daya_total));
		}

		if($insert){
			$this->GeneralModel->generatePesan("Semua perangkat berhasil di akumulasi dan dianalisis","berhasil");
		}else{
			$this->GeneralModel->generatePesan("Gagal memproses data","gagal");
		}

		redirect('admin/hitung_penggunaan');

	}

}
