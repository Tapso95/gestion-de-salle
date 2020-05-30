<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();		
        $this->load->helper(array('form'));
        $this->load->model('Login_model');
		if($this->session->userdata('logged_user')) { 
			redirect(base_url().'welcome');
		}		
 	}
	public function index(){
		if(isset($_POST)) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');              
			if($this->form_validation->run() == TRUE) {
				redirect(base_url().'welcome');
			}
		}
		$this->load->view('login');
	}
	function check_database($password) {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->Login_model->Role_login($email, md5($password));
			if ($result){
				$sess_array = array();
				$sess_array = array(
					'id' => $result->id,
					'username' => $result->prenom,				
					'email' => $result->email,
				);

				$this->session->set_userdata('super_person', $result->super_person);
				$this->session->set_userdata('sub_person', $result->sub_person);
				$this->session->set_userdata('logged_user', $sess_array);
				return TRUE;
			}
			else{
				$this->form_validation->set_message('check_database', 'Email ou Mot de passe incorrect');
				return false;
			}
	}

	public function login($value='')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == TRUE)
		{					
			echo "loggedIn";
		}
		else
		{				
			echo "NoStatus";								
		}
	}
}
