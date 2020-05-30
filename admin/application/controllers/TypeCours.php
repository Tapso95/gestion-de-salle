<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TypeCours extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TypeCours_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'typecours/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'typecours/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'typecours/index.html';
            $config['first_url'] = base_url() . 'typecours/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->TypeCours_model->total_rows($q);
        $typecours = $this->TypeCours_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'typecours_data' => $typecours,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('typecours/TypeCours_list', $data);
    }

    public function read($id) 
    {
        $row = $this->TypeCours_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idTypeCours' => $row->idTypeCours,
		'codeTypeCours' => $row->codeTypeCours,
		'nomTypeCours' => $row->nomTypeCours,
	    );
            $this->load->view('typecours/TypeCours_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typecours'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('typecours/create_action'),
	    'idTypeCours' => set_value('idTypeCours'),
	    'codeTypeCours' => set_value('codeTypeCours'),
	    'nomTypeCours' => set_value('nomTypeCours'),
	);
        $this->load->view('typecours/TypeCours_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'codeTypeCours' => $this->input->post('codeTypeCours',TRUE),
		'nomTypeCours' => $this->input->post('nomTypeCours',TRUE),
	    );

            $this->TypeCours_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('typecours'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->TypeCours_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('typecours/update_action'),
		'idTypeCours' => set_value('idTypeCours', $row->idTypeCours),
		'codeTypeCours' => set_value('codeTypeCours', $row->codeTypeCours),
		'nomTypeCours' => set_value('nomTypeCours', $row->nomTypeCours),
	    );
            $this->load->view('typecours/TypeCours_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typecours'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idTypeCours', TRUE));
        } else {
            $data = array(
		'codeTypeCours' => $this->input->post('codeTypeCours',TRUE),
		'nomTypeCours' => $this->input->post('nomTypeCours',TRUE),
	    );

            $this->TypeCours_model->update($this->input->post('idTypeCours', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('typecours'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->TypeCours_model->get_by_id($id);

        if ($row) {
            $this->TypeCours_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('typecours'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typecours'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('codeTypeCours', 'codetypecours', 'trim|required');
	$this->form_validation->set_rules('nomTypeCours', 'nomtypecours', 'trim|required');

	$this->form_validation->set_rules('idTypeCours', 'idTypeCours', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file TypeCours.php */
/* Location: ./application/controllers/TypeCours.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */