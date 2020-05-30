<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RapportSurveillance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('RapportSurveillance_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rapportsurveillance/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rapportsurveillance/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rapportsurveillance/index.html';
            $config['first_url'] = base_url() . 'rapportsurveillance/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->RapportSurveillance_model->total_rows($q);
        $rapportsurveillance = $this->RapportSurveillance_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rapportsurveillance_data' => $rapportsurveillance,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('rapportsurveillance/RapportSurveillance_list', $data);
    }

    public function read($id) 
    {
        $row = $this->RapportSurveillance_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idSurveillant' => $row->idSurveillant,
		'idCours' => $row->idCours,
		'idRapportSurveillance' => $row->idRapportSurveillance,
		'dateRapportSurveillance' => $row->dateRapportSurveillance,
		'commentaireRapportSurveillance' => $row->commentaireRapportSurveillance,
	    );
            $this->load->view('rapportsurveillance/RapportSurveillance_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapportsurveillance'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rapportsurveillance/create_action'),
	    'idSurveillant' => set_value('idSurveillant'),
	    'idCours' => set_value('idCours'),
	    'idRapportSurveillance' => set_value('idRapportSurveillance'),
	    'dateRapportSurveillance' => set_value('dateRapportSurveillance'),
	    'commentaireRapportSurveillance' => set_value('commentaireRapportSurveillance'),
	);
        $this->load->view('rapportsurveillance/RapportSurveillance_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idSurveillant' => $this->input->post('idSurveillant',TRUE),
		'idCours' => $this->input->post('idCours',TRUE),
		'dateRapportSurveillance' => $this->input->post('dateRapportSurveillance',TRUE),
		'commentaireRapportSurveillance' => $this->input->post('commentaireRapportSurveillance',TRUE),
	    );

            $this->RapportSurveillance_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rapportsurveillance'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->RapportSurveillance_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rapportsurveillance/update_action'),
		'idSurveillant' => set_value('idSurveillant', $row->idSurveillant),
		'idCours' => set_value('idCours', $row->idCours),
		'idRapportSurveillance' => set_value('idRapportSurveillance', $row->idRapportSurveillance),
		'dateRapportSurveillance' => set_value('dateRapportSurveillance', $row->dateRapportSurveillance),
		'commentaireRapportSurveillance' => set_value('commentaireRapportSurveillance', $row->commentaireRapportSurveillance),
	    );
            $this->load->view('rapportsurveillance/RapportSurveillance_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapportsurveillance'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idRapportSurveillance', TRUE));
        } else {
            $data = array(
		'idSurveillant' => $this->input->post('idSurveillant',TRUE),
		'idCours' => $this->input->post('idCours',TRUE),
		'dateRapportSurveillance' => $this->input->post('dateRapportSurveillance',TRUE),
		'commentaireRapportSurveillance' => $this->input->post('commentaireRapportSurveillance',TRUE),
	    );

            $this->RapportSurveillance_model->update($this->input->post('idRapportSurveillance', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rapportsurveillance'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->RapportSurveillance_model->get_by_id($id);

        if ($row) {
            $this->RapportSurveillance_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rapportsurveillance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapportsurveillance'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idSurveillant', 'idsurveillant', 'trim|required');
	$this->form_validation->set_rules('idCours', 'idcours', 'trim|required');
	$this->form_validation->set_rules('dateRapportSurveillance', 'daterapportsurveillance', 'trim|required');
	$this->form_validation->set_rules('commentaireRapportSurveillance', 'commentairerapportsurveillance', 'trim|required');

	$this->form_validation->set_rules('idRapportSurveillance', 'idRapportSurveillance', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file RapportSurveillance.php */
/* Location: ./application/controllers/RapportSurveillance.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */