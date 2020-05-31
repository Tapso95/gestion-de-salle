<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Salle_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'salle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'salle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'salle/index.html';
            $config['first_url'] = base_url() . 'salle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Salle_model->total_rows($q);
        $salle = $this->Salle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'salle_data' => $salle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $home_template['page'] = "salle/salle_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('salle/Salle_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Salle_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idSalle' => $row->idSalle,
		'nomSalle' => $row->nomSalle,
		'codeSalle' => $row->codeSalle,
		'nombrePlaceSalle' => $row->nombrePlaceSalle,
		'idTypeSalle' => $row->idTypeSalle,
	    );
            $this->load->view('salle/Salle_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salle'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('salle/create_action'),
	    'idSalle' => set_value('idSalle'),
	    'nomSalle' => set_value('nomSalle'),
	    'codeSalle' => set_value('codeSalle'),
	    'nombrePlaceSalle' => set_value('nombrePlaceSalle'),
	    'idTypeSalle' => set_value('idTypeSalle'),
	);
        $this->load->view('salle/Salle_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomSalle' => $this->input->post('nomSalle',TRUE),
		'codeSalle' => $this->input->post('codeSalle',TRUE),
		'nombrePlaceSalle' => $this->input->post('nombrePlaceSalle',TRUE),
		'idTypeSalle' => $this->input->post('idTypeSalle',TRUE),
	    );

            $this->Salle_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('salle'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Salle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('salle/update_action'),
		'idSalle' => set_value('idSalle', $row->idSalle),
		'nomSalle' => set_value('nomSalle', $row->nomSalle),
		'codeSalle' => set_value('codeSalle', $row->codeSalle),
		'nombrePlaceSalle' => set_value('nombrePlaceSalle', $row->nombrePlaceSalle),
		'idTypeSalle' => set_value('idTypeSalle', $row->idTypeSalle),
	    );
            $this->load->view('salle/Salle_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salle'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idSalle', TRUE));
        } else {
            $data = array(
		'nomSalle' => $this->input->post('nomSalle',TRUE),
		'codeSalle' => $this->input->post('codeSalle',TRUE),
		'nombrePlaceSalle' => $this->input->post('nombrePlaceSalle',TRUE),
		'idTypeSalle' => $this->input->post('idTypeSalle',TRUE),
	    );

            $this->Salle_model->update($this->input->post('idSalle', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('salle'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Salle_model->get_by_id($id);

        if ($row) {
            $this->Salle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('salle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('salle'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomSalle', 'nomsalle', 'trim|required');
	$this->form_validation->set_rules('codeSalle', 'codesalle', 'trim|required');
	$this->form_validation->set_rules('nombrePlaceSalle', 'nombreplacesalle', 'trim|required');
	$this->form_validation->set_rules('idTypeSalle', 'idtypesalle', 'trim|required');

	$this->form_validation->set_rules('idSalle', 'idSalle', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Salle.php */
/* Location: ./application/controllers/Salle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */