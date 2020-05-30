<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departement extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Departement_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'departement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'departement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'departement/index.html';
            $config['first_url'] = base_url() . 'departement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Departement_model->total_rows($q);
        $departement = $this->Departement_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'departement_data' => $departement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $home_template['page'] = "departement/Departement_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('departement/Departement_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Departement_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idDepartement' => $row->idDepartement,
		'nomDepartement' => $row->nomDepartement,
		'adresseDepartement' => $row->adresseDepartement,
	    );
            $this->load->view('departement/Departement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('departement/create_action'),
	    'idDepartement' => set_value('idDepartement'),
	    'nomDepartement' => set_value('nomDepartement'),
	    'adresseDepartement' => set_value('adresseDepartement'),
	);
        $this->load->view('departement/Departement_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomDepartement' => $this->input->post('nomDepartement',TRUE),
		'adresseDepartement' => $this->input->post('adresseDepartement',TRUE),
	    );

            $this->Departement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('departement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Departement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('departement/update_action'),
		'idDepartement' => set_value('idDepartement', $row->idDepartement),
		'nomDepartement' => set_value('nomDepartement', $row->nomDepartement),
		'adresseDepartement' => set_value('adresseDepartement', $row->adresseDepartement),
	    );
            $this->load->view('departement/Departement_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idDepartement', TRUE));
        } else {
            $data = array(
		'nomDepartement' => $this->input->post('nomDepartement',TRUE),
		'adresseDepartement' => $this->input->post('adresseDepartement',TRUE),
	    );

            $this->Departement_model->update($this->input->post('idDepartement', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('departement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Departement_model->get_by_id($id);

        if ($row) {
            $this->Departement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('departement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomDepartement', 'nomdepartement', 'trim|required');
	$this->form_validation->set_rules('adresseDepartement', 'adressedepartement', 'trim|required');

	$this->form_validation->set_rules('idDepartement', 'idDepartement', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Departement.php */
/* Location: ./application/controllers/Departement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */