<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class authentication extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('jwt_helper');
        $this->load->helper('rest_response_helper');
       
    }

    public function client_login() {
        $get = file_get_contents("php://input");
        $input = json_decode($get);
        $check = $this->db->select('*')->from('user')->where('username', $input->username)->where('password', $input->password);
        $get_check = $check->get();
        $res = count($get_check->result());
        if ($res != '0') {
            $now_date = date("Y-m-d");
            $expired_date = date('Y-m-d', strtotime('+1 day', strtotime($now_date)));
            $fill = array("role" => $input->username, "expired_date" => $expired_date);
            $token = JWT::encode($fill, SECRETKEY);
            $output = array("response" => "OK", "token" => $token);
            echo json_encode($output);
        } else {
            $output = array("response" => "FAIL", "token" => "");
            echo json_encode($output);
        }
    }

    
}
