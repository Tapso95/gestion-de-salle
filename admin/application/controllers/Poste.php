<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Poste extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Poste_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'poste/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'poste/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'poste/index.html';
            $config['first_url'] = base_url() . 'poste/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Poste_model->total_rows($q);
        $poste = $this->Poste_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'poste_data' => $poste,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('poste/Poste_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Poste_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idPoste' => $row->idPoste,
		'idEnseignant' => $row->idEnseignant,
		'codePoste' => $row->codePoste,
		'nomPoste' => $row->nomPoste,
	    );
            $this->load->view('poste/Poste_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poste'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('poste/create_action'),
	    'idPoste' => set_value('idPoste'),
	    'idEnseignant' => set_value('idEnseignant'),
	    'codePoste' => set_value('codePoste'),
	    'nomPoste' => set_value('nomPoste'),
	);
        $this->load->view('poste/Poste_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idEnseignant' => $this->input->post('idEnseignant',TRUE),
		'codePoste' => $this->input->post('codePoste',TRUE),
		'nomPoste' => $this->input->post('nomPoste',TRUE),
	    );

            $this->Poste_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('poste'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Poste_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('poste/update_action'),
		'idPoste' => set_value('idPoste', $row->idPoste),
		'idEnseignant' => set_value('idEnseignant', $row->idEnseignant),
		'codePoste' => set_value('codePoste', $row->codePoste),
		'nomPoste' => set_value('nomPoste', $row->nomPoste),
	    );
            $this->load->view('poste/Poste_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poste'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idPoste', TRUE));
        } else {
            $data = array(
		'idEnseignant' => $this->input->post('idEnseignant',TRUE),
		'codePoste' => $this->input->post('codePoste',TRUE),
		'nomPoste' => $this->input->post('nomPoste',TRUE),
	    );

            $this->Poste_model->update($this->input->post('idPoste', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('poste'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Poste_model->get_by_id($id);

        if ($row) {
            $this->Poste_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('poste'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poste'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idEnseignant', 'idenseignant', 'trim|required');
	$this->form_validation->set_rules('codePoste', 'codeposte', 'trim|required');
	$this->form_validation->set_rules('nomPoste', 'nomposte', 'trim|required');

	$this->form_validation->set_rules('idPoste', 'idPoste', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Poste.php */
/* Location: ./application/controllers/Poste.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */