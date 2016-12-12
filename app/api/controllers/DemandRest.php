<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DemandRest extends CI_Controller {

    var $warehouse = "";

    function __construct() {
        parent::__construct();
        $this->load->library('curl');
    }

    function new_demand() {
        $input = file_get_contents("php://input");
        $post = $this->curl->simple_post(WAREHOUSE . '/DemandRest/create', $input);
        echo $post;
    }

    function show_demand() {
        $get = $this->curl->simple_get(WAREHOUSE . '/DemandRest/data');
        echo $get;
    }

}
