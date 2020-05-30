<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$session_data = $this->session->userdata('logged_user');
		$this->load->helper('url','form');	
		$this->load->model('Welcome_Model');

		// if(!$this->session->userdata('logged_user')) { 
		// 	redirect(base_url());
		//  }
 	}

	/* === Dashboard Redirection === */
	public function index(){

		$session_data = $this->session->userdata('logged_user');
		//var_dump($session_data);
	/***=== Super Persons Role ===***/
		/***=== NO: 1. Student Redirection ===***/
		if ($this->session->userdata('super_person') == 1){	
			$id = $this->session->userdata['logged_user']['id'];
			$home_template['page'] = "student/Welcome_student";
			$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
			$home_template['salles'] =$this->Welcome_Model->get_salle($id);
			$home_template['typeCourses'] =$this->Welcome_Model->get_type_cours($id);
			$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);
		}
		/***=== NO: 2. Teacher Redirection ===***/
		elseif ($this->session->userdata('super_person') == 2){

			/***=== NO: 1. Teacher Redirection ===***/
			if ($this->session->userdata('sub_person') == 0) {
				$id = $this->session->userdata['logged_user']['id'];
				$home_template['page'] = "teacher/Welcome_teacher";
				$home_template['left_menu'] = "teacher/left-menu-teacher";
				$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
				$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);
			} 
			/***=== NO: 2. Assistant Redirection ===***/
			elseif($this->session->userdata('sub_person') == 2) {
				$home_template['page'] = "assistant/Welcome_assistant";
				$home_template['left_menu'] = "assistant/left-menu-assistant";
				$home_template['courses'] =$this->Welcome_Model->get_all_course();
				$home_template['notvalide_courses'] = $this->Welcome_Model->get_notvalide_course();
				$home_template['ecues'] =$this->Welcome_Model->get_all_ecue();

			}
			/***=== NO: 3. Head Of Department Redirection ===***/
			elseif ($this->session->userdata('sub_person') == 1) {
				$home_template['page'] = "manager/Welcome_manager";
				$home_template['left_menu'] = "manager/left-menu-manager";
				//$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
				//$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);

			}
			
			$id = $this->session->userdata['logged_user']['id'];
			$home_template['salles'] =$this->Welcome_Model->get_salle();
			$home_template['typeCourses'] =$this->Welcome_Model->get_type_cours();
		}
		$this->load->view('home_template', $home_template);	
	}

	 public function create_course() 
    {
        //$this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {

            $data = array(
		'idEcue' => $this->input->post('nom_ecue',TRUE),
		'idTypeCours' => $this->input->post('type_cours',TRUE),
		'idSalle' => $this->input->post('id_salle',TRUE),
		'dateCours' => $this->input->post('date_cours',TRUE),
		'heureDebutCours' => $this->input->post('heure_debut_cours',TRUE),
		'heureFinCours' => $this->input->post('heure_fin_cours',TRUE),
	     );
            if($this->session->userdata('sub_person') == 2){
            	$data['acceptedCours'] = 1;
            	$data['enabledCours'] = 1;
            }else{
            	$data['acceptedCours'] = 0;
            	$data['enabledCours'] = 1;

            }

            $this->Welcome_Model->insert("Cours",$data);
            // $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('welcome'));
    }
    public function Student()
    {
    	if ($this->session->userdata('super_person') == 1){	
			$id = $this->session->userdata['logged_user']['id'];
			$home_template['page'] = "student/Welcome_student";
			$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
			$home_template['salles'] =$this->Welcome_Model->get_salle($id);
			$home_template['typeCourses'] =$this->Welcome_Model->get_type_cours($id);
			$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);
		}
    }
    public function Teacher()
    {
    	if ($this->session->userdata('sub_person') == 0) {
				$id = $this->session->userdata['logged_user']['id'];
				$home_template['page'] = "teacher/Welcome_teacher";
				$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
				$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);
			} 
    	if ($this->session->userdata('super_person') == 1){	
			$id = $this->session->userdata['logged_user']['id'];
			$home_template['page'] = "student/Welcome_student";
			$home_template['courses'] =$this->Welcome_Model->get_teacher_prop($id);
			$home_template['salles'] =$this->Welcome_Model->get_salle($id);
			$home_template['typeCourses'] =$this->Welcome_Model->get_type_cours($id);
			$home_template['ecues'] =$this->Welcome_Model->get_teacher_ecue($id);
		}
    }
    public function Assistant()
    {
    	if($this->session->userdata('sub_person') == 2) {
			$home_template['page'] = "assistant/Welcome_assistant";
			$home_template['courses'] =$this->Welcome_Model->get_all_course();
			$home_template['notvalide_courses'] = $this->Welcome_Model->get_notvalide_course();
			$home_template['ecues'] =$this->Welcome_Model->get_all_ecue();
		}
    }
    public function get_calendar()
    {
			$home_template['page'] = "calendar";
			$home_template['courses'] =$this->Welcome_Model->get_all_course();
			$home_template['notvalide_courses'] = $this->Welcome_Model->get_notvalide_course();
			$home_template['ecues'] =$this->Welcome_Model->get_all_ecue();
			$this->load->view('home_template', $home_template);
    }
}
