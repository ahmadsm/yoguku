<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DemandController extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$content['demand'] = $this->DataSupply();
		$this->load->view('demand/index',$content);
	}

	function DataSupply() {
		$arrdata = array();
		
		$res = $this->db->get('demand');
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['supplier'] = $this->db->get_where('supplier',array('id'=>$key->fk_supplier))->row()->nama;
			$arr['material'] = $this->get_by_attribute('material','nama',$key->fk_material);
			$arr['qty'] = $key->qty;
			array_push($arrdata, $arr);
		}

		return $arrdata;
	}

	function get_by_attribute($table,$attribute,$value) {
		$this->db->select($attribute);
		$this->db->where('id',$value);
		$res = $this->db->get($table);
		return $res->row()->$attribute;
	}

	function create() {
		$content['material'] = $this->DataMaterial();
		$content['supplier'] = $this->DataSupplier();
		$this->load->view('demand/create',$content);
	}

	function DataMaterial() {
		$arrdata = array();
		
		$res = $this->db->get('material');
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['kode'] = $key->kode;
			$arr['nama'] = $key->nama;
			$arr['satuan'] = $key->satuan;
			array_push($arrdata, $arr);
		}

		return $arrdata;
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

	function store() {
		$supplier = $this->input->post('supplier');
		$material = $this->input->post('material');
		$qty = $this->input->post('qty');
		
		$data = array(
			'fk_supplier' => $supplier,
			'fk_material' => $material,
			'qty' => $qty,
		);

		$res = $this->db->insert('demand',$data);
		redirect('demand/index');
	}

	function delete() {
		$id = $this->uri->segment(3);
		
		$data = array(
			'id' => $id,
		);

		$res = $this->db->delete('demand',$data);
		redirect('demand/index');
	}

	function edit() {
		$content['material'] = $this->DataMaterial();
		$content['supplier'] = $this->DataSupplier();
		$this->load->view('demand/edit',$content);
	}

	function show() {
		$arr = array();
		$where['id'] = $this->input->post('id');
		$res = $this->db->get_where('demand',$where);
		foreach ($res->result() as $key) {
			$arr['id'] = $key->id;
			$arr['fk_supplier'] = $key->fk_supplier;
			$arr['fk_material'] = $key->fk_material;
			$arr['supplier'] = $this->db->get_where('supplier',array('id'=>$key->fk_supplier))->row()->nama;
			$arr['material'] = $this->get_by_attribute('material','nama',$key->fk_material);
			$arr['qty'] = $key->qty;
		}

		echo json_encode($arr);
	}

	function update() {
		$fk_supplier = $this->input->post('fk_supplier');
		$fk_material = $this->input->post('fk_material');
		$qty = $this->input->post('qty');
		$id = $this->input->post('id');
		
		$data = array(
			'fk_supplier' => $fk_supplier,
			'fk_material' => $fk_material,
			'qty' => $qty,
		);
		$where['id'] = $id;

		$res = $this->db->update('demand',$data,$where);
		redirect('demand/index');
	}

}