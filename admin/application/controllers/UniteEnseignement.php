<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UniteEnseignement extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UniteEnseignement_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'uniteenseignement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'uniteenseignement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'uniteenseignement/index.html';
            $config['first_url'] = base_url() . 'uniteenseignement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->UniteEnseignement_model->total_rows($q);
        $uniteenseignement = $this->UniteEnseignement_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'uniteenseignement_data' => $uniteenseignement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('uniteenseignement/UniteEnseignement_list', $data);
    }

    public function read($id) 
    {
        $row = $this->UniteEnseignement_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idUe' => $row->idUe,
		'codeUe' => $row->codeUe,
		'nomUe' => $row->nomUe,
		'creditUe' => $row->creditUe,
		'idNiveau' => $row->idNiveau,
	    );
            $this->load->view('uniteenseignement/UniteEnseignement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uniteenseignement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('uniteenseignement/create_action'),
	    'idUe' => set_value('idUe'),
	    'codeUe' => set_value('codeUe'),
	    'nomUe' => set_value('nomUe'),
	    'creditUe' => set_value('creditUe'),
	    'idNiveau' => set_value('idNiveau'),
	);
        $this->load->view('uniteenseignement/UniteEnseignement_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'codeUe' => $this->input->post('codeUe',TRUE),
		'nomUe' => $this->input->post('nomUe',TRUE),
		'creditUe' => $this->input->post('creditUe',TRUE),
		'idNiveau' => $this->input->post('idNiveau',TRUE),
	    );

            $this->UniteEnseignement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('uniteenseignement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->UniteEnseignement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('uniteenseignement/update_action'),
		'idUe' => set_value('idUe', $row->idUe),
		'codeUe' => set_value('codeUe', $row->codeUe),
		'nomUe' => set_value('nomUe', $row->nomUe),
		'creditUe' => set_value('creditUe', $row->creditUe),
		'idNiveau' => set_value('idNiveau', $row->idNiveau),
	    );
            $this->load->view('uniteenseignement/UniteEnseignement_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uniteenseignement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idUe', TRUE));
        } else {
            $data = array(
		'codeUe' => $this->input->post('codeUe',TRUE),
		'nomUe' => $this->input->post('nomUe',TRUE),
		'creditUe' => $this->input->post('creditUe',TRUE),
		'idNiveau' => $this->input->post('idNiveau',TRUE),
	    );

            $this->UniteEnseignement_model->update($this->input->post('idUe', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('uniteenseignement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->UniteEnseignement_model->get_by_id($id);

        if ($row) {
            $this->UniteEnseignement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('uniteenseignement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('uniteenseignement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('codeUe', 'codeue', 'trim|required');
	$this->form_validation->set_rules('nomUe', 'nomue', 'trim|required');
	$this->form_validation->set_rules('creditUe', 'creditue', 'trim|required');
	$this->form_validation->set_rules('idNiveau', 'idniveau', 'trim|required');

	$this->form_validation->set_rules('idUe', 'idUe', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file UniteEnseignement.php */
/* Location: ./application/controllers/UniteEnseignement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */