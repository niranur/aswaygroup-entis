<?php

class Gs_settings_m extends MY_Model
{

    protected $_table_name = 'gs_settings';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'nama' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        ),
        'desc' => array(
            'field' => 'desc',
            'label' => 'Desc',
            'rules' => 'trim|required'
        )
    );

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $variabel = new stdClass();
        $variabel->id = '';
        $variabel->app_name = '';
        $variabel->app_desc = '';
        $variabel->app_ver = '';
        $variabel->company = '';
        $variabel->copy_right = '';
        $variabel->copy_right_link = '';
        $variabel->address = '';
        $variabel->support_by = '';
        $variabel->support_by_link = '';
        
        return $variabel;
    }
}