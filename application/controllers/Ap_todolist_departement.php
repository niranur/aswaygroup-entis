<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ap_todolist_departement extends Pinnacle_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_todolist_m');
    }

    public function index()
    {

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

}