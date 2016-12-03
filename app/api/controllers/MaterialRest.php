<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MaterialRest extends CI_Controller {

	var $warehouse = "";

	function __construct() {
		parent::__construct();
		$this->load->library('curl');
	}

	function data() {		
		$data = json_decode($this->curl->simple_get(WAREHOUSE.'/MaterialRest/data'));
		echo json_encode($data);
	}

}