<?php

class Gs_sessions_m extends MY_Model
{

    protected $_table_name = 'gs_sessions';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}