<?php

class GeneralModel extends CI_Model {
	function __construct() {
		parent::__construct();
		/*if(!$this->session->userdata('loginData')){
			redirect('login');
		}*/

	}

	function checkLogin($username,$password){
		$this->db->select('A.status_user, B.id_karyawan, B.nama');
		$this->db->from('user AS A');
		$this->db->join('karyawan AS B','A.usernames = B.id_karyawan');
		$this->db->where('A.usernames', $username);
		$this->db->where('A.passwords', md5($password));
		$query = $this->db->get();
		if($query->num_rows()>0){
			$querycheck = $query->row();
			$dataArr = array(
				'StatusUser'   	=> $querycheck->status_user,
				'IdKaryawan'    => $querycheck->id_karyawan,
				'namaKaryawan'  => $querycheck->nama,
				'project_name' 	=> "Lisa V.1.0",
				'copyright' 	=> "&copy;".date("Y")
			);
			$this->session->set_userdata('loginData',$dataArr);
			return true;    
		}else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
			return false;
		}  
	}


	function generatePesan($pesan, $type){
		switch ($type) {
			case 'berhasil':
				$str = '
					<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
						'.$pesan.'
					</div>
					';
				break;

			case 'gagal':
				$str = '
					<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
						'.$pesan.'
					</div>
					';
				break;
			
			default:
				$str = '
					<div class="alert alert-block alert-warning">
						<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
						'.$pesan.'
					</div>
					';
				break;
		}

		$this->session->set_flashdata('msgbox',$str);
		return $str;
	}
	
	function formatTanggal($datetime,$format='d/m/Y'){

		$time = strtotime($datetime);
		$myFormatForView = date($format, $time);
		return $myFormatForView;

	}

	/**
	 * Load master data
	 * Agar lebih mudah ketika query di controller
	 */
	
	public function getAllDivisi(){
		$this->db->select("*");
		$this->db->from("divisi");
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getAllPerangkatKategori($id = ''){
		$this->db->select("*");
		$this->db->from("perangkat_kategori");
		if($id != ''){
			$this->db->where("id_perangkat_kategori", $id);
		}
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getAllPerangkat($id = ''){
		$this->db->select("A.*, B.nama AS kategori");
		$this->db->from("perangkat AS A");
		$this->db->join("perangkat_kategori AS B", "A.id_perangkat_kategori = B.id_perangkat_kategori");
		$this->db->order_by("A.nama", "ASC");
		if($id != ''){
			$this->db->where("A.id_perangkat", $id);
		}
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getAllPerangkatDetail($id = ''){
		$this->db->select("*");
		$this->db->from("perangkat_detail");
		if($id != ''){
			$this->db->where("id_perangkat", $id);
		}
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function getAllTokenTransaksi($id = ''){
		$this->db->select("*");
		$this->db->from("token_transaksi");
		if($id != ''){
			$this->db->where("id_token_transaksi", $id);
		}
		$query  = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
