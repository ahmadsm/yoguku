<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialController extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $content['material'] = $this->DataMaterial();
        $this->load->view('material/index', $content);
    }

    function sync() {
        $query = $this->db->select('id')->from('material');
        $get = $query->get();
        $data = $get->result();
        foreach ($get->result() as $each) {
            $total_in_sum = $this->db->select_sum('qty')->from('supply')->where('fk_material', $each->id);
            $total_in_get = $total_in_sum->get();
            $in = $total_in_get->row();
            $total_out_sum = $this->db->select_sum('qty')->from('demand as d')->join('transaction_demand as td', 'd.code_transaction_demand = td.code')->where('d.fk_material', $each->id)->where('td.status = "A"');
            $total_out_get = $total_out_sum->get();
            $out = $total_out_get->row();
            $total_now = (int)$in->qty - (int)$out->qty;
            $update[] = $this->db->update('material', array('total' => $total_now), array('id' => $each->id));
        }        
        redirect('material/index');
    }

    function DataMaterial() {
        $res = $this->db->get('material');
        $arrdata = [];
        if ($res != "") {
            foreach ($res->result() as $key) {
                if ($key->total < 10) {
                    $status = "Kurang";
                } else {
                    $status = "Cukup";
                }
                $arrdata[] = array(
                    "id" => $key->id,
                    "kode" => $key->kode,
                    "nama" => $key->nama,
                    "satuan" => $key->satuan,
                    "total" => $key->total,
                    "status" => $status,
                    "last_update" => $key->updated_at,
                );
            }
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

        $res = $this->db->insert('material', $data);
        redirect('material/index');
    }

    function delete() {
        $id = $this->uri->segment(3);

        $data = array(
            'id' => $id,
        );

        $res = $this->db->delete('material', $data);
        redirect('material/index');
    }

    function edit() {
        $this->load->view('material/edit');
    }

    function show() {
        $arr = array();
        $where['id'] = $this->input->post('id');
        $res = $this->db->get_where('material', $where);
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

        $res = $this->db->update('material', $data, $where);
        redirect('material/index');
    }

}
