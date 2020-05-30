<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cours extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cours_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cours/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cours/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cours/index.html';
            $config['first_url'] = base_url() . 'cours/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cours_model->total_rows($q);
        $cours = $this->Cours_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cours_data' => $cours,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('cours/Cours_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Cours_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idCours' => $row->idCours,
		'idTypeCours' => $row->idTypeCours,
		'statutCours' => $row->statutCours,
		'dateCours' => $row->dateCours,
		'heureDebutCours' => $row->heureDebutCours,
		'heureFinCours' => $row->heureFinCours,
		'enabledCours' => $row->enabledCours,
		'acceptedCours' => $row->acceptedCours,
		'idEcue' => $row->idEcue,
		'idSalle' => $row->idSalle,
	    );
            $this->load->view('cours/Cours_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cours'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cours/create_action'),
	    'idCours' => set_value('idCours'),
	    'idTypeCours' => set_value('idTypeCours'),
	    'statutCours' => set_value('statutCours'),
	    'dateCours' => set_value('dateCours'),
	    'heureDebutCours' => set_value('heureDebutCours'),
	    'heureFinCours' => set_value('heureFinCours'),
	    'enabledCours' => set_value('enabledCours'),
	    'acceptedCours' => set_value('acceptedCours'),
	    'idEcue' => set_value('idEcue'),
	    'idSalle' => set_value('idSalle'),
	);
        $this->load->view('cours/Cours_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idTypeCours' => $this->input->post('idTypeCours',TRUE),
		'statutCours' => $this->input->post('statutCours',TRUE),
		'dateCours' => $this->input->post('dateCours',TRUE),
		'heureDebutCours' => $this->input->post('heureDebutCours',TRUE),
		'heureFinCours' => $this->input->post('heureFinCours',TRUE),
		'enabledCours' => $this->input->post('enabledCours',TRUE),
		'acceptedCours' => $this->input->post('acceptedCours',TRUE),
		'idEcue' => $this->input->post('idEcue',TRUE),
		'idSalle' => $this->input->post('idSalle',TRUE),
	    );

            $this->Cours_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cours'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cours_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cours/update_action'),
		'idCours' => set_value('idCours', $row->idCours),
		'idTypeCours' => set_value('idTypeCours', $row->idTypeCours),
		'statutCours' => set_value('statutCours', $row->statutCours),
		'dateCours' => set_value('dateCours', $row->dateCours),
		'heureDebutCours' => set_value('heureDebutCours', $row->heureDebutCours),
		'heureFinCours' => set_value('heureFinCours', $row->heureFinCours),
		'enabledCours' => set_value('enabledCours', $row->enabledCours),
		'acceptedCours' => set_value('acceptedCours', $row->acceptedCours),
		'idEcue' => set_value('idEcue', $row->idEcue),
		'idSalle' => set_value('idSalle', $row->idSalle),
	    );
            $this->load->view('cours/Cours_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cours'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idCours', TRUE));
        } else {
            $data = array(
		'idTypeCours' => $this->input->post('idTypeCours',TRUE),
		'statutCours' => $this->input->post('statutCours',TRUE),
		'dateCours' => $this->input->post('dateCours',TRUE),
		'heureDebutCours' => $this->input->post('heureDebutCours',TRUE),
		'heureFinCours' => $this->input->post('heureFinCours',TRUE),
		'enabledCours' => $this->input->post('enabledCours',TRUE),
		'acceptedCours' => $this->input->post('acceptedCours',TRUE),
		'idEcue' => $this->input->post('idEcue',TRUE),
		'idSalle' => $this->input->post('idSalle',TRUE),
	    );

            $this->Cours_model->update($this->input->post('idCours', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cours'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cours_model->get_by_id($id);

        if ($row) {
            $this->Cours_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cours'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cours'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idTypeCours', 'idtypecours', 'trim|required');
	$this->form_validation->set_rules('statutCours', 'statutcours', 'trim|required');
	$this->form_validation->set_rules('dateCours', 'datecours', 'trim|required');
	$this->form_validation->set_rules('heureDebutCours', 'heuredebutcours', 'trim|required');
	$this->form_validation->set_rules('heureFinCours', 'heurefincours', 'trim|required');
	$this->form_validation->set_rules('enabledCours', 'enabledcours', 'trim|required');
	$this->form_validation->set_rules('acceptedCours', 'acceptedcours', 'trim|required');
	$this->form_validation->set_rules('idEcue', 'idecue', 'trim|required');
	$this->form_validation->set_rules('idSalle', 'idsalle', 'trim|required');

	$this->form_validation->set_rules('idCours', 'idCours', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Cours.php */
/* Location: ./application/controllers/Cours.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */