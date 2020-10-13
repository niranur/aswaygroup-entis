<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_language extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'users_lang' => $this->input->get('lang')
        );
        $this->gs_users_m->save($data, $this->session->userdata('id'));
        redirect($this->input->get('redirect'));
    }
}