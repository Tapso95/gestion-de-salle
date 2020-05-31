<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Evaluation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'evaluation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'evaluation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'evaluation/index.html';
            $config['first_url'] = base_url() . 'evaluation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Evaluation_model->total_rows($q);
        $evaluation = $this->Evaluation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'evaluation_data' => $evaluation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $home_template['page'] = "evaluation/evaluation_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('evaluation/Evaluation_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Evaluation_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idEvaluation' => $row->idEvaluation,
		'idEtudiant' => $row->idEtudiant,
		'idCours' => $row->idCours,
		'noteEvaluation' => $row->noteEvaluation,
	    );
            $this->load->view('evaluation/Evaluation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('evaluation/create_action'),
	    'idEvaluation' => set_value('idEvaluation'),
	    'idEtudiant' => set_value('idEtudiant'),
	    'idCours' => set_value('idCours'),
	    'noteEvaluation' => set_value('noteEvaluation'),
	);
        $this->load->view('evaluation/Evaluation_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idEtudiant' => $this->input->post('idEtudiant',TRUE),
		'idCours' => $this->input->post('idCours',TRUE),
		'noteEvaluation' => $this->input->post('noteEvaluation',TRUE),
	    );

            $this->Evaluation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('evaluation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Evaluation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('evaluation/update_action'),
		'idEvaluation' => set_value('idEvaluation', $row->idEvaluation),
		'idEtudiant' => set_value('idEtudiant', $row->idEtudiant),
		'idCours' => set_value('idCours', $row->idCours),
		'noteEvaluation' => set_value('noteEvaluation', $row->noteEvaluation),
	    );
            $this->load->view('evaluation/Evaluation_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idEvaluation', TRUE));
        } else {
            $data = array(
		'idEtudiant' => $this->input->post('idEtudiant',TRUE),
		'idCours' => $this->input->post('idCours',TRUE),
		'noteEvaluation' => $this->input->post('noteEvaluation',TRUE),
	    );

            $this->Evaluation_model->update($this->input->post('idEvaluation', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('evaluation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Evaluation_model->get_by_id($id);

        if ($row) {
            $this->Evaluation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('evaluation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluation'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idEtudiant', 'idetudiant', 'trim|required');
	$this->form_validation->set_rules('idCours', 'idcours', 'trim|required');
	$this->form_validation->set_rules('noteEvaluation', 'noteevaluation', 'trim|required');

	$this->form_validation->set_rules('idEvaluation', 'idEvaluation', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Evaluation.php */
/* Location: ./application/controllers/Evaluation.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */