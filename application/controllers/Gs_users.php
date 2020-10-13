<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_users extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->order_by('users_active');
        $this->db->join('gs_languages', 'gs_languages.lang=gs_users.users_lang', 'left');
        $this->db->join('gs_roles', 'gs_roles.id=gs_users.roles_id', 'left');
        $this->db->join('gs_status', 'gs_status.status_id=gs_users.users_active', 'left');
        $this->data['content'] = $this->gs_users_m->get_by(array(
            'users_id<>' => 1
        ));

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['language'] = $this->gs_languages_m->get();

        $this->data['roles'] = $this->gs_roles_m->get_by(array(
            'id<>' => 1
        ));

        if ($id) {
            $this->data['content'] = $this->gs_users_m->get($id);
            count_valid($this->data['content']) || redirect('error_404');
            $data = array(
                'users_email' => $this->input->post('email'),
                'users_name' => $this->input->post('nama'),
                'users_mobile_number' => $this->input->post('hp'),
                'users_lang' => $this->input->post('lang'),
                'roles_id' => $this->input->post('role'),
                'users_active' => $this->input->post('active')
            );
        } else {
            $this->data['content'] = $this->gs_users_m->get_new();
            $data = array(
                'users_id' => $this->gs_users_m->increment(),
                'users_email' => $this->input->post('email'),
                'users_password' => $this->hash($this->input->post('password')),
                'users_name' => $this->input->post('nama'),
                'users_mobile_number' => $this->input->post('hp'),
                'users_lang' => $this->input->post('lang'),
                'roles_id' => $this->input->post('role'),
                'users_date_join' => date('Y-m-d H:i:s'),
                'users_active' => $this->input->post('active')
            );
        }

        $rules = $this->gs_users_m->rules_profile;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            if ($this->input->post('due') != NULL) {
                $data['users_date_due'] = $this->input->post('due');
            } else {
                $data['users_date_due'] = NULL;
            }

            if (! empty($_FILES['avatar']['name'])) {
                // upload
                $avatar = $this->upload_avatar('avatar', TRUE, 256);
                $data['users_avatar'] = $avatar;
                // hapus
                if ($id) {
                    if ($this->data['content']->users_avatar != $this->data['default_image']) {
                        unlink('./uploads/' . $this->data['users']->users_avatar);
                    }
                }
            }

            $this->gs_users_m->save($data, $id);
            if ($id) {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_edit_success']);
            } else {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
            }
            redirect($this->uri->rsegment(1));
        }

        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function delete($id)
    {
        $cek = $this->gs_users_m->get($id);
        if ($this->gs_users_m->delete($id) == TRUE) {
            if ($cek->users_avatar != $this->data['default_image']) {
                unlink('./uploads/' . $cek->users_avatar);
            }
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_delete_success']);
        } else {
            $this->session->set_flashdata('status_title', 'error');
            $this->session->set_flashdata('status', $this->data['lang_status_error']);
        }

        redirect($this->uri->rsegment(1));
    }
}