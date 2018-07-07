<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index(){
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['v_content'] = 'admin/dashboard/content';

		$query_tp1 = $this->db->query("SELECT ((SUM(penambahan_daya)-SUM(penggunaan_daya))/SUM(penambahan_daya)*100) AS prosentase, SUM(penambahan_daya)-SUM(penggunaan_daya) AS sisa_daya FROM transaksi_perangkat");
		$result_tp1 = $query_tp1->row();

		$query_tp2 = $this->db->query("SELECT SUM(((TIME_TO_SEC(TIMEDIFF(B.waktu_akhir, B.waktu_awal))/(60*60))*A.penggunaan_daya)/1000) AS penggunaan_daya_total FROM perangkat AS A INNER JOIN perangkat_detail AS B ON(A.id_perangkat = B.id_perangkat) WHERE status = 'JALAN'");
		$result_tp2 = $query_tp2->row();

		$sisa_jam 		= $result_tp1->sisa_daya/$result_tp2->penggunaan_daya_total;
		$estimate_hari 	= $sisa_jam/24;
		$hari 			= floor($estimate_hari);
		$jam 			= ($estimate_hari-$hari)*24;

		$data['prosentase'] = $result_tp1->prosentase;
		$data['hari'] = $hari;
		$data['jam'] = $jam;

		$this->load->view('admin/layout',$data);
	}

	function decryptIt($q){
		$cryptKey	= 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded	= rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return($qDecoded);
	}

}
