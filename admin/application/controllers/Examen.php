<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Examen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'examen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'examen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'examen/index.html';
            $config['first_url'] = base_url() . 'examen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Examen_model->total_rows($q);
        $examen = $this->Examen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'examen_data' => $examen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('examen/Examen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Examen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idExamen' => $row->idExamen,
		'nomExamen' => $row->nomExamen,
		'dateDebutExamen' => $row->dateDebutExamen,
		'dateFinExamen' => $row->dateFinExamen,
	    );
            $this->load->view('examen/Examen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('examen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('examen/create_action'),
	    'idExamen' => set_value('idExamen'),
	    'nomExamen' => set_value('nomExamen'),
	    'dateDebutExamen' => set_value('dateDebutExamen'),
	    'dateFinExamen' => set_value('dateFinExamen'),
	);
        $this->load->view('examen/Examen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomExamen' => $this->input->post('nomExamen',TRUE),
		'dateDebutExamen' => $this->input->post('dateDebutExamen',TRUE),
		'dateFinExamen' => $this->input->post('dateFinExamen',TRUE),
	    );

            $this->Examen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('examen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Examen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('examen/update_action'),
		'idExamen' => set_value('idExamen', $row->idExamen),
		'nomExamen' => set_value('nomExamen', $row->nomExamen),
		'dateDebutExamen' => set_value('dateDebutExamen', $row->dateDebutExamen),
		'dateFinExamen' => set_value('dateFinExamen', $row->dateFinExamen),
	    );
            $this->load->view('examen/Examen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('examen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idExamen', TRUE));
        } else {
            $data = array(
		'nomExamen' => $this->input->post('nomExamen',TRUE),
		'dateDebutExamen' => $this->input->post('dateDebutExamen',TRUE),
		'dateFinExamen' => $this->input->post('dateFinExamen',TRUE),
	    );

            $this->Examen_model->update($this->input->post('idExamen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('examen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Examen_model->get_by_id($id);

        if ($row) {
            $this->Examen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('examen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('examen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomExamen', 'nomexamen', 'trim|required');
	$this->form_validation->set_rules('dateDebutExamen', 'datedebutexamen', 'trim|required');
	$this->form_validation->set_rules('dateFinExamen', 'datefinexamen', 'trim|required');

	$this->form_validation->set_rules('idExamen', 'idExamen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Examen.php */
/* Location: ./application/controllers/Examen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */