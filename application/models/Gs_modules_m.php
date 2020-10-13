<?php

class Gs_modules_m extends MY_Model
{

    protected $_table_name = 'gs_modules';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}