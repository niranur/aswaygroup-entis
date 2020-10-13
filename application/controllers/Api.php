<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function version_post()
    {
        $message = array(
            'version' => '1.0.2'
        );
        $this->set_response($message, REST_Controller::HTTP_OK);
    }
}
