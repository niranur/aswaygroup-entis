<?php

class Ap_employee_m extends MY_Model
{

    protected $_table_name = 'ap_employee';

    protected $_primary_key = 'employee_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $variabel = new stdClass();
        $variabel->employee_id = '';
        $variabel->employee_name = '';
        $variabel->employee_age = '';
        $variabel->employee_address = '';

        return $variabel;
    }

    public $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),
        'age' => array(
            'field' => 'age',
            'label' => 'Age',
            'rules' => 'trim|required'
        ),
         'address' => array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|required'
        )
    );


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
    }

}