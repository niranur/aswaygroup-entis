<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_roles extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->where('id!=', 1);
        $this->data['content'] = $this->gs_roles_m->get();
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function edit($id = NULL)
    {
        $this->data['all_module'] = $this->gs_modules_m->get_by(array(
            'parent' => 0
        ));
        $this->db->where('parent<>', 0);
        $this->data['all_module_child'] = $this->gs_modules_m->get();
        
        $this->data['module_saat_ini'] = array();
        if ($id) {
            $module_now = $this->gs_roles_modules_m->get_by(array(
                'roles_id' => $id
            ));
            foreach ($module_now as $val) :
                array_push($this->data['module_saat_ini'], $val->modules_id);
            endforeach
            ;
            $this->data['content'] = $this->gs_roles_m->get($id);
            count_valid($this->data['content']) || redirect('error_404');
            $data = array(
                'roles' => $this->input->post('nama')
            );
        } else {
            $this->data['content'] = $this->gs_roles_m->get_new();
            $id_baru = $this->gs_roles_m->increment();
            $data = array(
                'id' => $id_baru,
                'roles' => $this->input->post('nama')
            );
        }
        
        $rules = $this->gs_roles_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->gs_roles_m->save($data, $id);
            if ($id) {
                $this->db->delete('gs_roles_modules', array(
                    'roles_id' => $id
                ));
            } else {
                $id = $id_baru;
            }
            $i = 1;
            foreach ($this->input->post('module') as $val) :
                $mod = explode('_', $val);
                $data = array(
                    'roles_id' => $id,
                    'modules_id' => $mod[0],
                    'order' => $i,
                    'parent_modules_id' => $mod[1],
                    'type' => $mod[2]
                );
                $this->gs_roles_modules_m->save($data, NULL);
                $i ++;
            endforeach
            ;
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
        $this->db->delete('gs_roles_modules', array(
            'roles_id' => $id
        ));
        
        if ($this->gs_roles_m->delete($id) == TRUE) {
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_delete_success']);
        } else {
            $this->session->set_flashdata('status_title', 'error');
            $this->session->set_flashdata('status', $this->data['lang_status_error']);
        }
        
        redirect($this->uri->rsegment(1));
    }
}