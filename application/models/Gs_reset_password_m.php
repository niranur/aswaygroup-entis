<?php

class Gs_reset_password_m extends MY_Model
{

    protected $_table_name = 'gs_reset_password';

    protected $_primary_key = 'token';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}