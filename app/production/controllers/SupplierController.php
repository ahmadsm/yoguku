<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$content['supplier'] = $this->DataSupplier();
		$this->load->view('supplier/index',$content);
	}

	function DataSupplier() {
		$arrdata = array();
		
		$res = $this->db->get('supplier');
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['nama'] = $key->nama;
			$arr['alamat'] = $key->alamat;
			$arr['telepon'] = $key->telepon;
			array_push($arrdata, $arr);
		}

		return $arrdata;
	}

	function create() {
		$this->load->view('supplier/create');
	}

	function store() {
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'telepon' => $telepon,
		);

		$res = $this->db->insert('supplier',$data);
		redirect('supplier/index');
	}

	function delete() {
		$id = $this->uri->segment(3);
		
		$data = array(
			'id' => $id,
		);

		$res = $this->db->delete('supplier',$data);
		redirect('supplier/index');
	}

	function edit() {
		$this->load->view('supplier/edit');
	}

	function show() {
		$arr = array();
		$where['id'] = $this->input->post('id');
		$res = $this->db->get_where('supplier',$where);
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['nama'] = $key->nama;
			$arr['alamat'] = $key->alamat;
			$arr['telepon'] = $key->telepon;
		}

		echo json_encode($arr);
	}

	function update() {
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');
		$telepon = $this->input->post('telepon');
		$id = $this->input->post('id');
		
		$data = array(
			'alamat' => $alamat,
			'nama' => $nama,
			'telepon' => $telepon,
		);
		$where['id'] = $id;

		$res = $this->db->update('supplier',$data,$where);
		redirect('supplier/index');
	}

}