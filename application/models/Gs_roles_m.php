<?php

class Gs_roles_m extends MY_Model
{

    protected $_table_name = 'gs_roles';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'nama' => array(
            'field' => 'nama',
            'label' => 'Roles',
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
        $variabel->roles = '';
        
        return $variabel;
    }
}