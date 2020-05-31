<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Horaire extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Horaire_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'horaire/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'horaire/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'horaire/index.html';
            $config['first_url'] = base_url() . 'horaire/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Horaire_model->total_rows($q);
        $horaire = $this->Horaire_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'horaire_data' => $horaire,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $home_template['page'] = "horaire/horaire_list";
        $home_template['data'] = $data;
        $this->load->view('home_template', $home_template);
        /*$this->load->view('horaire/Horaire_list', $data);*/
    }

    public function read($id) 
    {
        $row = $this->Horaire_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idHoraire' => $row->idHoraire,
		'heureDebut' => $row->heureDebut,
		'heureFin' => $row->heureFin,
		'nomJour' => $row->nomJour,
	    );
            $this->load->view('horaire/Horaire_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('horaire'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('horaire/create_action'),
	    'idHoraire' => set_value('idHoraire'),
	    'heureDebut' => set_value('heureDebut'),
	    'heureFin' => set_value('heureFin'),
	    'nomJour' => set_value('nomJour'),
	);
        $this->load->view('horaire/Horaire_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'heureDebut' => $this->input->post('heureDebut',TRUE),
		'heureFin' => $this->input->post('heureFin',TRUE),
		'nomJour' => $this->input->post('nomJour',TRUE),
	    );

            $this->Horaire_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('horaire'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Horaire_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('horaire/update_action'),
		'idHoraire' => set_value('idHoraire', $row->idHoraire),
		'heureDebut' => set_value('heureDebut', $row->heureDebut),
		'heureFin' => set_value('heureFin', $row->heureFin),
		'nomJour' => set_value('nomJour', $row->nomJour),
	    );
            $this->load->view('horaire/Horaire_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('horaire'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idHoraire', TRUE));
        } else {
            $data = array(
		'heureDebut' => $this->input->post('heureDebut',TRUE),
		'heureFin' => $this->input->post('heureFin',TRUE),
		'nomJour' => $this->input->post('nomJour',TRUE),
	    );

            $this->Horaire_model->update($this->input->post('idHoraire', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('horaire'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Horaire_model->get_by_id($id);

        if ($row) {
            $this->Horaire_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('horaire'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('horaire'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('heureDebut', 'heuredebut', 'trim|required');
	$this->form_validation->set_rules('heureFin', 'heurefin', 'trim|required');
	$this->form_validation->set_rules('nomJour', 'nomjour', 'trim|required');

	$this->form_validation->set_rules('idHoraire', 'idHoraire', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Horaire.php */
/* Location: ./application/controllers/Horaire.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-25 19:24:37 */
/* http://harviacode.com */