<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grade_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'grade/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'grade/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'grade/index.html';
            $config['first_url'] = base_url() . 'grade/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Grade_model->total_rows($q);
        $grade = $this->Grade_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'grade_data' => $grade,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('grade/Grade_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Grade_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idGrade' => $row->idGrade,
		'codeGrade' => $row->codeGrade,
		'nomGrade' => $row->nomGrade,
	    );
            $this->load->view('grade/Grade_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grade/create_action'),
	    'idGrade' => set_value('idGrade'),
	    'codeGrade' => set_value('codeGrade'),
	    'nomGrade' => set_value('nomGrade'),
	);
        $this->load->view('grade/Grade_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'codeGrade' => $this->input->post('codeGrade',TRUE),
		'nomGrade' => $this->input->post('nomGrade',TRUE),
	    );

            $this->Grade_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grade'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Grade_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grade/update_action'),
		'idGrade' => set_value('idGrade', $row->idGrade),
		'codeGrade' => set_value('codeGrade', $row->codeGrade),
		'nomGrade' => set_value('nomGrade', $row->nomGrade),
	    );
            $this->load->view('grade/Grade_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idGrade', TRUE));
        } else {
            $data = array(
		'codeGrade' => $this->input->post('codeGrade',TRUE),
		'nomGrade' => $this->input->post('nomGrade',TRUE),
	    );

            $this->Grade_model->update($this->input->post('idGrade', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grade'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grade_model->get_by_id($id);

        if ($row) {
            $this->Grade_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grade'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('codeGrade', 'codegrade', 'trim|required');
	$this->form_validation->set_rules('nomGrade', 'nomgrade', 'trim|required');

	$this->form_validation->set_rules('idGrade', 'idGrade', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Grade.php */
/* Location: ./application/controllers/Grade.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */