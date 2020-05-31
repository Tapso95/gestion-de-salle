<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ecue extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ecue_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ecue/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ecue/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ecue/index.html';
            $config['first_url'] = base_url() . 'ecue/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ecue_model->total_rows($q);
        $ecue = $this->Ecue_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ecue_data' => $ecue,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $home_template['page'] = "ecue/ecue_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('ecue/Ecue_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Ecue_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idEcue' => $row->idEcue,
		'idUe' => $row->idUe,
		'creditEcue' => $row->creditEcue,
		'nomEcue' => $row->nomEcue,
		'heureCmEcue' => $row->heureCmEcue,
		'heureTdEcue' => $row->heureTdEcue,
		'heureTpEcue' => $row->heureTpEcue,
	    );
            $this->load->view('ecue/Ecue_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ecue'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ecue/create_action'),
	    'idEcue' => set_value('idEcue'),
	    'idUe' => set_value('idUe'),
	    'creditEcue' => set_value('creditEcue'),
	    'nomEcue' => set_value('nomEcue'),
	    'heureCmEcue' => set_value('heureCmEcue'),
	    'heureTdEcue' => set_value('heureTdEcue'),
	    'heureTpEcue' => set_value('heureTpEcue'),
	);
        $this->load->view('ecue/Ecue_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idUe' => $this->input->post('idUe',TRUE),
		'creditEcue' => $this->input->post('creditEcue',TRUE),
		'nomEcue' => $this->input->post('nomEcue',TRUE),
		'heureCmEcue' => $this->input->post('heureCmEcue',TRUE),
		'heureTdEcue' => $this->input->post('heureTdEcue',TRUE),
		'heureTpEcue' => $this->input->post('heureTpEcue',TRUE),
	    );

            $this->Ecue_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ecue'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ecue_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ecue/update_action'),
		'idEcue' => set_value('idEcue', $row->idEcue),
		'idUe' => set_value('idUe', $row->idUe),
		'creditEcue' => set_value('creditEcue', $row->creditEcue),
		'nomEcue' => set_value('nomEcue', $row->nomEcue),
		'heureCmEcue' => set_value('heureCmEcue', $row->heureCmEcue),
		'heureTdEcue' => set_value('heureTdEcue', $row->heureTdEcue),
		'heureTpEcue' => set_value('heureTpEcue', $row->heureTpEcue),
	    );
            $this->load->view('ecue/Ecue_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ecue'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idEcue', TRUE));
        } else {
            $data = array(
		'idUe' => $this->input->post('idUe',TRUE),
		'creditEcue' => $this->input->post('creditEcue',TRUE),
		'nomEcue' => $this->input->post('nomEcue',TRUE),
		'heureCmEcue' => $this->input->post('heureCmEcue',TRUE),
		'heureTdEcue' => $this->input->post('heureTdEcue',TRUE),
		'heureTpEcue' => $this->input->post('heureTpEcue',TRUE),
	    );

            $this->Ecue_model->update($this->input->post('idEcue', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ecue'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ecue_model->get_by_id($id);

        if ($row) {
            $this->Ecue_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ecue'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ecue'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idUe', 'idue', 'trim|required');
	$this->form_validation->set_rules('creditEcue', 'creditecue', 'trim|required');
	$this->form_validation->set_rules('nomEcue', 'nomecue', 'trim|required');
	$this->form_validation->set_rules('heureCmEcue', 'heurecmecue', 'trim|required');
	$this->form_validation->set_rules('heureTdEcue', 'heuretdecue', 'trim|required');
	$this->form_validation->set_rules('heureTpEcue', 'heuretpecue', 'trim|required');

	$this->form_validation->set_rules('idEcue', 'idEcue', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ecue.php */
/* Location: ./application/controllers/Ecue.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */