<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialController extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$content['material'] = $this->DataMaterial();
		$this->load->view('material/index',$content);
	}

	function sync() {
		$query = "select supply.fk_material, SUM(supply.qty) as total from supply GROUP BY supply.fk_material";
		$res = $this->db->query($query);
		foreach ($res->result() as $key) {
			$total_out = $this->db->query("SELECT demand.fk_material, sum(demand.qty) as total_out from demand where demand.fk_material='$key->fk_material'")->row()->total_out;
			$total_in = $key->total;
			$total = $total_in - $total_out;
			$this->db->update('material',array('total'=>$total),array('id'=>$key->fk_material));
		}
		redirect('material/index');
	}

	function DataMaterial() {
		$arrdata = array();
		
		$res = $this->db->get('material');
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['kode'] = $key->kode;
			$arr['nama'] = $key->nama;
			$arr['satuan'] = $key->satuan;
			$arr['total'] = $key->total;
			array_push($arrdata, $arr);
		}

		return $arrdata;
	}

	function create() {
		$this->load->view('material/create');
	}

	function store() {
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$satuan = $this->input->post('satuan');
		
		$data = array(
			'kode' => $kode,
			'nama' => $nama,
			'satuan' => $satuan,
		);

		$res = $this->db->insert('material',$data);
		redirect('material/index');
	}

	function delete() {
		$id = $this->uri->segment(3);
		
		$data = array(
			'id' => $id,
		);

		$res = $this->db->delete('material',$data);
		redirect('material/index');
	}

	function edit() {
		$this->load->view('material/edit');
	}

	function show() {
		$arr = array();
		$where['id'] = $this->input->post('id');
		$res = $this->db->get_where('material',$where);
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['kode'] = $key->kode;
			$arr['nama'] = $key->nama;
			$arr['satuan'] = $key->satuan;
		}

		echo json_encode($arr);
	}

	function update() {
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$satuan = $this->input->post('satuan');
		$id = $this->input->post('id');
		
		$data = array(
			'kode' => $kode,
			'nama' => $nama,
			'satuan' => $satuan,
		);
		$where['id'] = $id;

		$res = $this->db->update('material',$data,$where);
		redirect('material/index');
	}
	

}