<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ap_target extends Pinnacle_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_target_m');
    }

    public function index()
    {
        $this->data['target_category'] = $this->ap_target_m->get();

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['ajax_detail'] = $this->uri->rsegment(1) . '/ajax_detail';
        $this->load->view('_layout_main', $this->data);
    }

}