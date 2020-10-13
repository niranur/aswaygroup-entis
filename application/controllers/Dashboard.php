<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->join('gs_modules', 'gs_modules.id=gs_roles_modules.modules_id', 'left');
        $this->data['list_module'] = $this->gs_roles_modules_m->get_by(array(
            'roles_id' => $this->data['users']->roles_id,
            'slug<>' => 'javascript:;'
        ));
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }
}