<?php
defined('BASEPATH') OR exit('access denied');

//require APPPATH.'/libraries/REST_Controller.php';

class MaterialRest extends CI_Controller {
	function __construct() {
		parent::__construct();
//		$this->load->config('rest');
	}

	function data() {
		$res = $this->db->get('material');
		$arr_data = array();
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['nama'] = $key->nama;
			$arr['satuan'] = $key->satuan;
			$arr['total'] = $key->total;
			array_push($arr_data, $arr);
		}
		echo json_encode($arr_data);
	}

	function getDetail() {
		$data['id'] = $this->uri->segment(3);
		$res = $this->db->get_where('material',$data);
		$arr_data = array();
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['nama'] = $key->nama;
			$arr['satuan'] = $key->satuan;
			$arr['total'] = $key->total;
		}
		echo json_encode($arr);
	}
}