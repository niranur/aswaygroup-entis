<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_template extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['subject'] = 'Email';
        $this->data['body'] = 'Anda melakukan Lupa Password, silahkan klik link dibawah ini apabila';
        $this->data['link'] = base_url();
        $this->data['link_label'] = 'Lupa Password';
        $this->load->view($this->uri->rsegment(1) . '/default', $this->data);
    }
}