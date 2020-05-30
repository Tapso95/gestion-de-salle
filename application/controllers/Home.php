<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {	
	public function __construct() {
		parent::__construct();
		check_installer();		
		$this->load->model('Home_Model');	
 	}	
	public function index(){

		/* === Common Homepage Supporting Methods === */		
		// $home_template['footer_cities'] = $this->Home_Model->pull_footer_cities(6);	
		// $home_template['cities'] = $this->Home_Model->pull_cities();			
		// $home_template['languages'] = $this->Home_Model->get_languages();
		// $home_template['specialties'] = $this->Home_Model->get_specialties();
		// $home_template['insurance'] = $this->Home_Model->get_insurance();
		$home_template['page'] = "Homepage";
		$home_template['page_title'] = "Home Page";
		$this->load->view('home_template', $home_template);
	}
 
}
?>