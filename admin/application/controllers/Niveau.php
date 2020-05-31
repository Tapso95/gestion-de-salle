<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Niveau extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Niveau_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'niveau/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'niveau/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'niveau/index.html';
            $config['first_url'] = base_url() . 'niveau/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Niveau_model->total_rows($q);
        $niveau = $this->Niveau_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'niveau_data' => $niveau,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $home_template['page'] = "niveau/niveau_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('niveau/Niveau_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Niveau_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idNiveau' => $row->idNiveau,
		'codeNiveau' => $row->codeNiveau,
		'nomNiveau' => $row->nomNiveau,
	    );
            $this->load->view('niveau/Niveau_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('niveau'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('niveau/create_action'),
	    'idNiveau' => set_value('idNiveau'),
	    'codeNiveau' => set_value('codeNiveau'),
	    'nomNiveau' => set_value('nomNiveau'),
	);
        $this->load->view('niveau/Niveau_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'codeNiveau' => $this->input->post('codeNiveau',TRUE),
		'nomNiveau' => $this->input->post('nomNiveau',TRUE),
	    );

            $this->Niveau_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('niveau'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Niveau_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('niveau/update_action'),
		'idNiveau' => set_value('idNiveau', $row->idNiveau),
		'codeNiveau' => set_value('codeNiveau', $row->codeNiveau),
		'nomNiveau' => set_value('nomNiveau', $row->nomNiveau),
	    );
            $this->load->view('niveau/Niveau_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('niveau'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idNiveau', TRUE));
        } else {
            $data = array(
		'codeNiveau' => $this->input->post('codeNiveau',TRUE),
		'nomNiveau' => $this->input->post('nomNiveau',TRUE),
	    );

            $this->Niveau_model->update($this->input->post('idNiveau', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('niveau'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Niveau_model->get_by_id($id);

        if ($row) {
            $this->Niveau_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('niveau'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('niveau'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('codeNiveau', 'codeniveau', 'trim|required');
	$this->form_validation->set_rules('nomNiveau', 'nomniveau', 'trim|required');

	$this->form_validation->set_rules('idNiveau', 'idNiveau', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Niveau.php */
/* Location: ./application/controllers/Niveau.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */