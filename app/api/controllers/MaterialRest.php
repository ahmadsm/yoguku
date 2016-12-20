<?php

defined('BASEPATH') OR exit('No direct script access allowed');

include 'rest.php';

class MaterialRest extends rest {
    
    function __construct() {
        parent::__construct();       
       
    }

    public function data() {                
        $data = json_decode($this->curl->simple_get(WAREHOUSE . '/materialrest/data'));
        echo json_encode($data);
    }

}
