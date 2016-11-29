<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function login() {
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('app/login');
		} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = array(
				'username' => $username,
				'password' => sha1($password),
			);
			$res = $this->db->get_where('user',$data);
			if ($res->num_rows() != 0) {
				redirect('app/welcome');
			} else if ($res->num_rows() == 0) {
				$this->load->view('app/login');
			}
		}
	}

	function welcome() {
		$this->load->view('app/welcome');
	}

	function profile() {
		$this->load->view('app/profile');
	}

	function logout() {
		$this->load->view('app/login');
	}

}