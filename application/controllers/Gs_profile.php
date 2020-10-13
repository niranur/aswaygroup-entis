<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_profile extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'users_name' => $this->input->post('nama'),
            'users_email' => $this->input->post('email'),
            'users_mobile_number' => $this->input->post('hp')
        );
        
        $rules = $this->gs_users_m->rules_profile;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            if (! empty($_FILES['avatar']['name'])) {
                // upload
                $avatar = $this->upload_avatar('avatar', TRUE, 256);
                $data['users_avatar'] = $avatar;
                // hapus
                if ($this->data['users']->users_avatar != $this->data['default_image']) {
                    unlink('./uploads/' . $this->data['users']->users_avatar);
                }
            }
            $this->gs_users_m->save($data, $this->session->userdata('id'));
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_edit_success']);
            redirect($this->uri->rsegment(1));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}