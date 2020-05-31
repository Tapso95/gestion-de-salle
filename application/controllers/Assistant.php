<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assistant extends CI_Controller {	
	public function __construct() {
		parent::__construct();
		$this->load->model('Assistant_model');	
 	}	
	public function index(){

		$home_template['page'] = "Homepage";
		$this->load->view('home_template', $home_template);
	}
	public function validate_course($id_cours)
	{
		$result = $this->Assistant_model->validate_course($id_cours);
		redirect(site_url('welcome'));
			//$this->form_validation->set_message('check_database', 'Email ou mot de passe incorrect');
		//var_dump($result);
		
	}
	public function booking()
	{
		$data = array('idSalle' => $this->input->post('id_salle',TRUE));

         $this->Welcome_Model->insert("Cours",$data);
         redirect(site_url('assistant/get_all_salle'));
	}

	public function booking_form()
	{

		//$home_template['salles'] = $this->Assistant_model->get_all_salle();
		$home_template['courses'] = $this->Assistant_model->get_courses();
		$home_template['left_menu'] = "assistant/left-menu-assistant";
		$home_template['page'] = "assistant/booking_form";
		$this->load->view('home_template', $home_template);
	}
	public function get_all_salle()
	{

		$home_template['salles'] = $this->Assistant_model->get_all_salle();
		$home_template['left_menu'] = "assistant/left-menu-assistant";
		$home_template['page'] = "assistant/salle_list";
		$this->load->view('home_template', $home_template);
	}
	public function get_salle($id_salle)
	{
	}
 
}
?>