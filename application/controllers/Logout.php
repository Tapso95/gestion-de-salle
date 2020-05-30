<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_user')) {
			redirect(base_url());
		}
 	}
	
	function index() {
		$this->session->unset_userdata('logged_user');
		session_destroy();
		redirect(base_url());
	}
}