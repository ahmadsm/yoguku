<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rest extends CI_Controller {

    var $warehouse = "";

    function __construct() {
        parent::__construct();
        $this->load->library('curl');
        $this->load->helper('jwt_helper');
        $this->load->helper('rest_response_helper');
        $this->checktoken();         
        
    }

    public function checktoken() {
        $datas = $this->input->get_request_header('api_access_token');        
        try {
            $results = JWT::decode($datas, SECRETKEY, JWT_ALGHORITMA);
            if ($results) {
                $data = OK_STATUS;                
            } else {
                $data = FAIL_STATUS;                
            }
        } catch (UnexpectedValueException $e) {
            $data = FAIL_STATUS;                
        } catch (DomainException $e) {
            $data = FAIL_STATUS;                
        }
        if($data != OK_STATUS){
            $data = authentication_fail();
            echo json_encode($data);
            exit();
        }
    }    

}
