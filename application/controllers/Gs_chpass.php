<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_chpass extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'users_password' => $this->hash($this->input->post('password'))
        );
        
        $rules = $this->gs_users_m->rules_change_password;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_edit_success']);
            $this->gs_users_m->save($data, $this->session->userdata('id'));
            redirect($this->uri->rsegment(1));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}