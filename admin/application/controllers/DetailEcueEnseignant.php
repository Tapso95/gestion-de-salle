<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DetailEcueEnseignant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DetailEcueEnseignant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detailecueenseignant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detailecueenseignant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detailecueenseignant/index.html';
            $config['first_url'] = base_url() . 'detailecueenseignant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->DetailEcueEnseignant_model->total_rows($q);
        $detailecueenseignant = $this->DetailEcueEnseignant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailecueenseignant_data' => $detailecueenseignant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detailecueenseignant/DetailEcueEnseignant_list', $data);
    }

    public function read($id) 
    {
        $row = $this->DetailEcueEnseignant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idDetail' => $row->idDetail,
		'idEnseignant' => $row->idEnseignant,
		'idEcue' => $row->idEcue,
	    );
            $this->load->view('detailecueenseignant/DetailEcueEnseignant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailecueenseignant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailecueenseignant/create_action'),
	    'idDetail' => set_value('idDetail'),
	    'idEnseignant' => set_value('idEnseignant'),
	    'idEcue' => set_value('idEcue'),
	);
        $this->load->view('detailecueenseignant/DetailEcueEnseignant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idEnseignant' => $this->input->post('idEnseignant',TRUE),
		'idEcue' => $this->input->post('idEcue',TRUE),
	    );

            $this->DetailEcueEnseignant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailecueenseignant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->DetailEcueEnseignant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailecueenseignant/update_action'),
		'idDetail' => set_value('idDetail', $row->idDetail),
		'idEnseignant' => set_value('idEnseignant', $row->idEnseignant),
		'idEcue' => set_value('idEcue', $row->idEcue),
	    );
            $this->load->view('detailecueenseignant/DetailEcueEnseignant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailecueenseignant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idDetail', TRUE));
        } else {
            $data = array(
		'idEnseignant' => $this->input->post('idEnseignant',TRUE),
		'idEcue' => $this->input->post('idEcue',TRUE),
	    );

            $this->DetailEcueEnseignant_model->update($this->input->post('idDetail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailecueenseignant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->DetailEcueEnseignant_model->get_by_id($id);

        if ($row) {
            $this->DetailEcueEnseignant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailecueenseignant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailecueenseignant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idEnseignant', 'idenseignant', 'trim|required');
	$this->form_validation->set_rules('idEcue', 'idecue', 'trim|required');

	$this->form_validation->set_rules('idDetail', 'idDetail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file DetailEcueEnseignant.php */
/* Location: ./application/controllers/DetailEcueEnseignant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */