<?php

defined('BASEPATH') OR exit('access denied');

//require APPPATH.'/libraries/REST_Controller.php';

class DemandRest extends CI_Controller {

    function __construct() {
        parent::__construct();
//		$this->load->config('rest');
        $this->load->library('curl');
    }

    function generatecode($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function create() {
        $input = json_decode(file_get_contents("php://input"));
        $code = $this->generatecode();
        $date = date("Y-m-d");
        $data = array(
            "id" => '',
            "code" => $code,
            "title" => $input->title,
            "notes" => $input->notes,
            "status" => 'N',
            "request_date" => $input->reqdate,
            "created_date" => $date,
        );
        $insert = $this->db->insert('transaction_demand', $data);
        if ($insert == TRUE) {
            foreach ($input->material as $each) {
                $record = array(
                    "code_transaction_demand" => $code,
                    "fk_material" => $each->id,
                    "qty" => $each->qty,
                );
                $insert_detail[] = $this->db->insert('demand', $record);
            }
            if ($insert_detail == TRUE) {
                $output = array("status" => 'OK', "message" => "Process Success", "code" => $code);
            } else {
                $output = array("status" => 'FAILED', "message" => "Input Error");
            }
        } else {
            $output = array("status" => 'FAILED', "message" => "Process Failed");
        }
        echo json_encode($output);
    }

    function data() {
        $data = $this->db->get('transaction_demand');             
        foreach ($data->result() as $each) {
            if ($each != "") {
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
            } else {
                $record = get_not_found();
            }            
        }
        echo json_encode($record);
    }

}
