<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$home_template['page'] = "welcome_message";
			/*$home_template['courses'] =$this->Welcome_Model->get_all_course();
			$home_template['notvalide_courses'] = $this->Welcome_Model->get_notvalide_course();
			$home_template['ecues'] =$this->Welcome_Model->get_all_ecue();
			*/
			$this->load->view('home_template', $home_template);
		//$this->load->view('welcome_message');
	}
}
