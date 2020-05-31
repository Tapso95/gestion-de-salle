<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enseignant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Enseignant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'enseignant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'enseignant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'enseignant/index.html';
            $config['first_url'] = base_url() . 'enseignant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Enseignant_model->total_rows($q);
        $enseignant = $this->Enseignant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'enseignant_data' => $enseignant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $home_template['page'] = "enseignant/enseignant_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('enseignant/Enseignant_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Enseignant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idEnseignant' => $row->idEnseignant,
		'idGrade' => $row->idGrade,
		'idDepartement' => $row->idDepartement,
		'matriculeEnseignant' => $row->matriculeEnseignant,
		'passwordEnseignant' => $row->passwordEnseignant,
		'nomEnseignant' => $row->nomEnseignant,
		'prenomEnseignant' => $row->prenomEnseignant,
		'dateNaissEnseignant' => $row->dateNaissEnseignant,
		'telephoneEnseignant' => $row->telephoneEnseignant,
		'emailEnseignant' => $row->emailEnseignant,
	    );
            $this->load->view('enseignant/Enseignant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enseignant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('enseignant/create_action'),
	    'idEnseignant' => set_value('idEnseignant'),
	    'idGrade' => set_value('idGrade'),
	    'idDepartement' => set_value('idDepartement'),
	    'matriculeEnseignant' => set_value('matriculeEnseignant'),
	    'passwordEnseignant' => set_value('passwordEnseignant'),
	    'nomEnseignant' => set_value('nomEnseignant'),
	    'prenomEnseignant' => set_value('prenomEnseignant'),
	    'dateNaissEnseignant' => set_value('dateNaissEnseignant'),
	    'telephoneEnseignant' => set_value('telephoneEnseignant'),
	    'emailEnseignant' => set_value('emailEnseignant'),
	);
        $this->load->view('enseignant/Enseignant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idGrade' => $this->input->post('idGrade',TRUE),
		'idDepartement' => $this->input->post('idDepartement',TRUE),
		'matriculeEnseignant' => $this->input->post('matriculeEnseignant',TRUE),
		'passwordEnseignant' => $this->input->post('passwordEnseignant',TRUE),
		'nomEnseignant' => $this->input->post('nomEnseignant',TRUE),
		'prenomEnseignant' => $this->input->post('prenomEnseignant',TRUE),
		'dateNaissEnseignant' => $this->input->post('dateNaissEnseignant',TRUE),
		'telephoneEnseignant' => $this->input->post('telephoneEnseignant',TRUE),
		'emailEnseignant' => $this->input->post('emailEnseignant',TRUE),
	    );

            $this->Enseignant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('enseignant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Enseignant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('enseignant/update_action'),
		'idEnseignant' => set_value('idEnseignant', $row->idEnseignant),
		'idGrade' => set_value('idGrade', $row->idGrade),
		'idDepartement' => set_value('idDepartement', $row->idDepartement),
		'matriculeEnseignant' => set_value('matriculeEnseignant', $row->matriculeEnseignant),
		'passwordEnseignant' => set_value('passwordEnseignant', $row->passwordEnseignant),
		'nomEnseignant' => set_value('nomEnseignant', $row->nomEnseignant),
		'prenomEnseignant' => set_value('prenomEnseignant', $row->prenomEnseignant),
		'dateNaissEnseignant' => set_value('dateNaissEnseignant', $row->dateNaissEnseignant),
		'telephoneEnseignant' => set_value('telephoneEnseignant', $row->telephoneEnseignant),
		'emailEnseignant' => set_value('emailEnseignant', $row->emailEnseignant),
	    );
            $this->load->view('enseignant/Enseignant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enseignant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idEnseignant', TRUE));
        } else {
            $data = array(
		'idGrade' => $this->input->post('idGrade',TRUE),
		'idDepartement' => $this->input->post('idDepartement',TRUE),
		'matriculeEnseignant' => $this->input->post('matriculeEnseignant',TRUE),
		'passwordEnseignant' => $this->input->post('passwordEnseignant',TRUE),
		'nomEnseignant' => $this->input->post('nomEnseignant',TRUE),
		'prenomEnseignant' => $this->input->post('prenomEnseignant',TRUE),
		'dateNaissEnseignant' => $this->input->post('dateNaissEnseignant',TRUE),
		'telephoneEnseignant' => $this->input->post('telephoneEnseignant',TRUE),
		'emailEnseignant' => $this->input->post('emailEnseignant',TRUE),
	    );

            $this->Enseignant_model->update($this->input->post('idEnseignant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('enseignant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Enseignant_model->get_by_id($id);

        if ($row) {
            $this->Enseignant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('enseignant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enseignant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idGrade', 'idgrade', 'trim|required');
	$this->form_validation->set_rules('idDepartement', 'iddepartement', 'trim|required');
	$this->form_validation->set_rules('matriculeEnseignant', 'matriculeenseignant', 'trim|required');
	$this->form_validation->set_rules('passwordEnseignant', 'passwordenseignant', 'trim|required');
	$this->form_validation->set_rules('nomEnseignant', 'nomenseignant', 'trim|required');
	$this->form_validation->set_rules('prenomEnseignant', 'prenomenseignant', 'trim|required');
	$this->form_validation->set_rules('dateNaissEnseignant', 'datenaissenseignant', 'trim|required');
	$this->form_validation->set_rules('telephoneEnseignant', 'telephoneenseignant', 'trim|required');
	$this->form_validation->set_rules('emailEnseignant', 'emailenseignant', 'trim|required');

	$this->form_validation->set_rules('idEnseignant', 'idEnseignant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Enseignant.php */
/* Location: ./application/controllers/Enseignant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */