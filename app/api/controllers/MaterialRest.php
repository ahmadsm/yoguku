<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialRest extends CI_Controller {

	var $warehouse = "";

	function __construct() {
		parent::__construct();
		$this->load->library('curl');
		$this->warehouse = "http://localhost/restapi/public/warehouse";
	}

	function data() {
		// get data from warehouse
		$data = json_decode($this->curl->simple_get($this->warehouse.'/MaterialRest/data'));
		echo json_encode($data);
	}

}