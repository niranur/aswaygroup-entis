<?php

class Ap_todolist_m extends MY_Model
{

    protected $_table_name = 'ap_todolist';

    protected $_primary_key = 'todolist_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }


    public $rules = array(
        'date' => array(
            'field' => 'todo_list_dateline',
            'label' => 'todo list dateline',
            'rules' => 'trim|required'
        ),
        'title' => array(
            'field' => 'todo_list_title',
            'label' => 'todo list title',
            'rules' => 'trim|required'
        ),
        'division' => array(
            'field' => 'todo_list_division',
            'label' => 'todo list division',
            'rules' => 'trim|required'
        ),
        'staff' => array(
            'field' => 'todo_list_staff',
            'label' => 'todo list staff',
            'rules' => 'trim|required'
        )
    );

    public function get_new()
    {
        $variabel = new stdClass();
        $variabel->todo_list_id = '';
        $variabel->todo_list_dateline= '';
        $variabel->todo_list_detail= '';
        $variabel->todo_list_file= '';
        $variabel->employee_departement_id= '';
        $variabel->employee_position_id= '';
        $variabel->todo_list_reason= '';
        $variabel->todo_list_start_total= '';
        $variabel->todo_list_x_total= '';
        $variabel->todo_list_status= '';
        $variabel->employee_id= '';

        return $variabel;
    }

}