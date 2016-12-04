<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DemandController extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $content['demand'] = $this->DataSupply();
        $this->load->view('demand/index', $content);
    }

    function transaction_demand() {
        $data = $this->db->get('transaction_demand');
        $records = [];
        foreach ($data->result() as $each) {
            $getdetail = $this->db->select('m.nama as material_name ,m.satuan , d.qty as qty')
                    ->from('demand as d')
                    ->join('material as m', 'd.fk_material = m.id')
                    ->where('d.code_transaction_demand', $each->code);
            $query = $getdetail->get();
            $result = $query->result();
            $record[] = array(
                "id" => $each->id,
                "code" => $each->code,
                "title" => $each->title,
                "notes" => $each->notes,
                "status" => $each->status,
                "materials_count" => count($query->result()),
                "materials_detail" => $result,
                "request_date" => $each->request_date,
                "update_date" => $each->update_date
            );
            $records = $record;
        }
        $content = [];
        $content['records'] = $records;
        $this->load->view('demand/transactions', $content);
    }

    function transaction_change_status(){
        $input = $this->input->post();
        $id = $input->id;
        $new_status = $input->status;
        
    }
    
    function DataSupply() {
        $arrdata = array();
        $res = $this->db->select('d.id, m.nama as nama_material, d.qty as qty')
                ->from('demand as d')
                ->join('material as m', 'd.fk_material = m.id');
        $query = $res->get();
        $result = $query->result();
        foreach ($result as $key) {
            $record[] = array(
                "id" => $key->id,
                "material" => $key->nama_material,
                "qty" => $key->qty,
            );
        }
        return $record;
    }

    function get_by_attribute($table, $attribute, $value) {
        $this->db->select($attribute);
        $this->db->where('id', $value);
        $res = $this->db->get($table);
        return $res->row()->$attribute;
    }

    function create() {
        $content['material'] = $this->DataMaterial();
        $content['supplier'] = $this->DataSupplier();
        $this->load->view('demand/create', $content);
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

        $res = $this->db->insert('demand', $data);
        redirect('demand/index');
    }

    function delete() {
        $id = $this->uri->segment(3);

        $data = array(
            'id' => $id,
        );

        $res = $this->db->delete('demand', $data);
        redirect('demand/index');
    }

    function edit() {
        $content['material'] = $this->DataMaterial();
        $content['supplier'] = $this->DataSupplier();
        $this->load->view('demand/edit', $content);
    }

    function show() {
        $arr = array();
        $where['id'] = $this->input->post('id');
        $res = $this->db->get_where('demand', $where);
        foreach ($res->result() as $key) {
            $arr['id'] = $key->id;
            $arr['fk_supplier'] = $key->fk_supplier;
            $arr['fk_material'] = $key->fk_material;
            $arr['supplier'] = $this->db->get_where('supplier', array('id' => $key->fk_supplier))->row()->nama;
            $arr['material'] = $this->get_by_attribute('material', 'nama', $key->fk_material);
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

        $res = $this->db->update('demand', $data, $where);
        redirect('demand/index');
    }

}
