<?php

class M_login extends CI_Model {

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
}
