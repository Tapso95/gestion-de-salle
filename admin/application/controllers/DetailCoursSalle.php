<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class DetailCoursSalle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DetailCoursSalle_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detailcourssalle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detailcourssalle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detailcourssalle/index.html';
            $config['first_url'] = base_url() . 'detailcourssalle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->DetailCoursSalle_model->total_rows($q);
        $detailcourssalle = $this->DetailCoursSalle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailcourssalle_data' => $detailcourssalle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detailcourssalle/DetailCoursSalle_list', $data);
    }

    public function read($id) 
    {
        $row = $this->DetailCoursSalle_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idDetailCoursSalle' => $row->idDetailCoursSalle,
		'idCours' => $row->idCours,
		'idSalle' => $row->idSalle,
	    );
            $this->load->view('detailcourssalle/DetailCoursSalle_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailcourssalle'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailcourssalle/create_action'),
	    'idDetailCoursSalle' => set_value('idDetailCoursSalle'),
	    'idCours' => set_value('idCours'),
	    'idSalle' => set_value('idSalle'),
	);
        $this->load->view('detailcourssalle/DetailCoursSalle_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idCours' => $this->input->post('idCours',TRUE),
		'idSalle' => $this->input->post('idSalle',TRUE),
	    );

            $this->DetailCoursSalle_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailcourssalle'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->DetailCoursSalle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailcourssalle/update_action'),
		'idDetailCoursSalle' => set_value('idDetailCoursSalle', $row->idDetailCoursSalle),
		'idCours' => set_value('idCours', $row->idCours),
		'idSalle' => set_value('idSalle', $row->idSalle),
	    );
            $this->load->view('detailcourssalle/DetailCoursSalle_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailcourssalle'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idDetailCoursSalle', TRUE));
        } else {
            $data = array(
		'idCours' => $this->input->post('idCours',TRUE),
		'idSalle' => $this->input->post('idSalle',TRUE),
	    );

            $this->DetailCoursSalle_model->update($this->input->post('idDetailCoursSalle', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailcourssalle'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->DetailCoursSalle_model->get_by_id($id);

        if ($row) {
            $this->DetailCoursSalle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailcourssalle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailcourssalle'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idCours', 'idcours', 'trim|required');
	$this->form_validation->set_rules('idSalle', 'idsalle', 'trim|required');

	$this->form_validation->set_rules('idDetailCoursSalle', 'idDetailCoursSalle', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file DetailCoursSalle.php */
/* Location: ./application/controllers/DetailCoursSalle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */