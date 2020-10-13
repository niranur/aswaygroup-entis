<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_general extends General_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['modules_title'] = $this->data['lang_dashboard'];
        $this->data['header'] = TRUE;
    }

    public function index()
    {
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_general', $this->data);
    }
}