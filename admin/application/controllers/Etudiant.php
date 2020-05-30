<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Etudiant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Etudiant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'etudiant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'etudiant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'etudiant/index.html';
            $config['first_url'] = base_url() . 'etudiant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Etudiant_model->total_rows($q);
        $etudiant = $this->Etudiant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'etudiant_data' => $etudiant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('etudiant/Etudiant_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Etudiant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idEtudiant' => $row->idEtudiant,
		'idNiveau' => $row->idNiveau,
		'matriculeEtudiant' => $row->matriculeEtudiant,
		'nomEtudiant' => $row->nomEtudiant,
		'prenomEtudiant' => $row->prenomEtudiant,
		'dateNaissEtudiant' => $row->dateNaissEtudiant,
		'lieuNaissEtudiant' => $row->lieuNaissEtudiant,
		'telephoneEtudiant' => $row->telephoneEtudiant,
		'emailEtudiant' => $row->emailEtudiant,
		'passwordEtudiant' => $row->passwordEtudiant,
	    );
            $this->load->view('etudiant/Etudiant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('etudiant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('etudiant/create_action'),
	    'idEtudiant' => set_value('idEtudiant'),
	    'idNiveau' => set_value('idNiveau'),
	    'matriculeEtudiant' => set_value('matriculeEtudiant'),
	    'nomEtudiant' => set_value('nomEtudiant'),
	    'prenomEtudiant' => set_value('prenomEtudiant'),
	    'dateNaissEtudiant' => set_value('dateNaissEtudiant'),
	    'lieuNaissEtudiant' => set_value('lieuNaissEtudiant'),
	    'telephoneEtudiant' => set_value('telephoneEtudiant'),
	    'emailEtudiant' => set_value('emailEtudiant'),
	    'passwordEtudiant' => set_value('passwordEtudiant'),
	);
        $this->load->view('etudiant/Etudiant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idNiveau' => $this->input->post('idNiveau',TRUE),
		'matriculeEtudiant' => $this->input->post('matriculeEtudiant',TRUE),
		'nomEtudiant' => $this->input->post('nomEtudiant',TRUE),
		'prenomEtudiant' => $this->input->post('prenomEtudiant',TRUE),
		'dateNaissEtudiant' => $this->input->post('dateNaissEtudiant',TRUE),
		'lieuNaissEtudiant' => $this->input->post('lieuNaissEtudiant',TRUE),
		'telephoneEtudiant' => $this->input->post('telephoneEtudiant',TRUE),
		'emailEtudiant' => $this->input->post('emailEtudiant',TRUE),
		'passwordEtudiant' => $this->input->post('passwordEtudiant',TRUE),
	    );

            $this->Etudiant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('etudiant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Etudiant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('etudiant/update_action'),
		'idEtudiant' => set_value('idEtudiant', $row->idEtudiant),
		'idNiveau' => set_value('idNiveau', $row->idNiveau),
		'matriculeEtudiant' => set_value('matriculeEtudiant', $row->matriculeEtudiant),
		'nomEtudiant' => set_value('nomEtudiant', $row->nomEtudiant),
		'prenomEtudiant' => set_value('prenomEtudiant', $row->prenomEtudiant),
		'dateNaissEtudiant' => set_value('dateNaissEtudiant', $row->dateNaissEtudiant),
		'lieuNaissEtudiant' => set_value('lieuNaissEtudiant', $row->lieuNaissEtudiant),
		'telephoneEtudiant' => set_value('telephoneEtudiant', $row->telephoneEtudiant),
		'emailEtudiant' => set_value('emailEtudiant', $row->emailEtudiant),
		'passwordEtudiant' => set_value('passwordEtudiant', $row->passwordEtudiant),
	    );
            $this->load->view('etudiant/Etudiant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('etudiant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idEtudiant', TRUE));
        } else {
            $data = array(
		'idNiveau' => $this->input->post('idNiveau',TRUE),
		'matriculeEtudiant' => $this->input->post('matriculeEtudiant',TRUE),
		'nomEtudiant' => $this->input->post('nomEtudiant',TRUE),
		'prenomEtudiant' => $this->input->post('prenomEtudiant',TRUE),
		'dateNaissEtudiant' => $this->input->post('dateNaissEtudiant',TRUE),
		'lieuNaissEtudiant' => $this->input->post('lieuNaissEtudiant',TRUE),
		'telephoneEtudiant' => $this->input->post('telephoneEtudiant',TRUE),
		'emailEtudiant' => $this->input->post('emailEtudiant',TRUE),
		'passwordEtudiant' => $this->input->post('passwordEtudiant',TRUE),
	    );

            $this->Etudiant_model->update($this->input->post('idEtudiant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('etudiant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Etudiant_model->get_by_id($id);

        if ($row) {
            $this->Etudiant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('etudiant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('etudiant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idNiveau', 'idniveau', 'trim|required');
	$this->form_validation->set_rules('matriculeEtudiant', 'matriculeetudiant', 'trim|required');
	$this->form_validation->set_rules('nomEtudiant', 'nometudiant', 'trim|required');
	$this->form_validation->set_rules('prenomEtudiant', 'prenometudiant', 'trim|required');
	$this->form_validation->set_rules('dateNaissEtudiant', 'datenaissetudiant', 'trim|required');
	$this->form_validation->set_rules('lieuNaissEtudiant', 'lieunaissetudiant', 'trim|required');
	$this->form_validation->set_rules('telephoneEtudiant', 'telephoneetudiant', 'trim|required');
	$this->form_validation->set_rules('emailEtudiant', 'emailetudiant', 'trim|required');
	$this->form_validation->set_rules('passwordEtudiant', 'passwordetudiant', 'trim|required');

	$this->form_validation->set_rules('idEtudiant', 'idEtudiant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Etudiant.php */
/* Location: ./application/controllers/Etudiant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */