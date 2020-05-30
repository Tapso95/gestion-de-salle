<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TypeSalle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TypeSalle_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'typesalle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'typesalle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'typesalle/index.html';
            $config['first_url'] = base_url() . 'typesalle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->TypeSalle_model->total_rows($q);
        $typesalle = $this->TypeSalle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'typesalle_data' => $typesalle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('typesalle/TypeSalle_list', $data);
    }

    public function read($id) 
    {
        $row = $this->TypeSalle_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idTypeSalle' => $row->idTypeSalle,
		'codeTypeSalle' => $row->codeTypeSalle,
		'nomTypeSalle' => $row->nomTypeSalle,
		'statusTypeSalle' => $row->statusTypeSalle,
	    );
            $this->load->view('typesalle/TypeSalle_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typesalle'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('typesalle/create_action'),
	    'idTypeSalle' => set_value('idTypeSalle'),
	    'codeTypeSalle' => set_value('codeTypeSalle'),
	    'nomTypeSalle' => set_value('nomTypeSalle'),
	    'statusTypeSalle' => set_value('statusTypeSalle'),
	);
        $this->load->view('typesalle/TypeSalle_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'codeTypeSalle' => $this->input->post('codeTypeSalle',TRUE),
		'nomTypeSalle' => $this->input->post('nomTypeSalle',TRUE),
		'statusTypeSalle' => $this->input->post('statusTypeSalle',TRUE),
	    );

            $this->TypeSalle_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('typesalle'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->TypeSalle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('typesalle/update_action'),
		'idTypeSalle' => set_value('idTypeSalle', $row->idTypeSalle),
		'codeTypeSalle' => set_value('codeTypeSalle', $row->codeTypeSalle),
		'nomTypeSalle' => set_value('nomTypeSalle', $row->nomTypeSalle),
		'statusTypeSalle' => set_value('statusTypeSalle', $row->statusTypeSalle),
	    );
            $this->load->view('typesalle/TypeSalle_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typesalle'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idTypeSalle', TRUE));
        } else {
            $data = array(
		'codeTypeSalle' => $this->input->post('codeTypeSalle',TRUE),
		'nomTypeSalle' => $this->input->post('nomTypeSalle',TRUE),
		'statusTypeSalle' => $this->input->post('statusTypeSalle',TRUE),
	    );

            $this->TypeSalle_model->update($this->input->post('idTypeSalle', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('typesalle'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->TypeSalle_model->get_by_id($id);

        if ($row) {
            $this->TypeSalle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('typesalle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('typesalle'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('codeTypeSalle', 'codetypesalle', 'trim|required');
	$this->form_validation->set_rules('nomTypeSalle', 'nomtypesalle', 'trim|required');
	$this->form_validation->set_rules('statusTypeSalle', 'statustypesalle', 'trim|required');

	$this->form_validation->set_rules('idTypeSalle', 'idTypeSalle', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file TypeSalle.php */
/* Location: ./application/controllers/TypeSalle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */