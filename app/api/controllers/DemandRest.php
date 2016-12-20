<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'rest.php';

class DemandRest extends rest {

    var $warehouse = "";

    function __construct() {
        parent::__construct();
    }

    function new_demand() {
        $input = file_get_contents("php://input");
        $post = $this->curl->simple_post(WAREHOUSE . '/demandrest/create', $input);        
        echo $post;
    }

    function show_demand() {        
        $get = $this->curl->simple_get(WAREHOUSE . '/demandrest/data');        
        echo $get;
    }

}
