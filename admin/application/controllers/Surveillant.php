<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surveillant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surveillant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surveillant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surveillant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surveillant/index.html';
            $config['first_url'] = base_url() . 'surveillant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surveillant_model->total_rows($q);
        $surveillant = $this->Surveillant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surveillant_data' => $surveillant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );


        $home_template['page'] = "surveillant/surveillant_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('surveillant/Surveillant_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Surveillant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idSurveillant' => $row->idSurveillant,
		'nomSurveillant' => $row->nomSurveillant,
		'prenomSurveillant' => $row->prenomSurveillant,
		'telephoneSurveillant' => $row->telephoneSurveillant,
		'passwordSurveillant' => $row->passwordSurveillant,
	    );
            $this->load->view('surveillant/Surveillant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveillant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surveillant/create_action'),
	    'idSurveillant' => set_value('idSurveillant'),
	    'nomSurveillant' => set_value('nomSurveillant'),
	    'prenomSurveillant' => set_value('prenomSurveillant'),
	    'telephoneSurveillant' => set_value('telephoneSurveillant'),
	    'passwordSurveillant' => set_value('passwordSurveillant'),
	);
        $this->load->view('surveillant/Surveillant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomSurveillant' => $this->input->post('nomSurveillant',TRUE),
		'prenomSurveillant' => $this->input->post('prenomSurveillant',TRUE),
		'telephoneSurveillant' => $this->input->post('telephoneSurveillant',TRUE),
		'passwordSurveillant' => $this->input->post('passwordSurveillant',TRUE),
	    );

            $this->Surveillant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surveillant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surveillant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surveillant/update_action'),
		'idSurveillant' => set_value('idSurveillant', $row->idSurveillant),
		'nomSurveillant' => set_value('nomSurveillant', $row->nomSurveillant),
		'prenomSurveillant' => set_value('prenomSurveillant', $row->prenomSurveillant),
		'telephoneSurveillant' => set_value('telephoneSurveillant', $row->telephoneSurveillant),
		'passwordSurveillant' => set_value('passwordSurveillant', $row->passwordSurveillant),
	    );
            $this->load->view('surveillant/Surveillant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveillant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idSurveillant', TRUE));
        } else {
            $data = array(
		'nomSurveillant' => $this->input->post('nomSurveillant',TRUE),
		'prenomSurveillant' => $this->input->post('prenomSurveillant',TRUE),
		'telephoneSurveillant' => $this->input->post('telephoneSurveillant',TRUE),
		'passwordSurveillant' => $this->input->post('passwordSurveillant',TRUE),
	    );

            $this->Surveillant_model->update($this->input->post('idSurveillant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surveillant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surveillant_model->get_by_id($id);

        if ($row) {
            $this->Surveillant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surveillant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surveillant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomSurveillant', 'nomsurveillant', 'trim|required');
	$this->form_validation->set_rules('prenomSurveillant', 'prenomsurveillant', 'trim|required');
	$this->form_validation->set_rules('telephoneSurveillant', 'telephonesurveillant', 'trim|required');
	$this->form_validation->set_rules('passwordSurveillant', 'passwordsurveillant', 'trim|required');

	$this->form_validation->set_rules('idSurveillant', 'idSurveillant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surveillant.php */
/* Location: ./application/controllers/Surveillant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */