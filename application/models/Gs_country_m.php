<?php

class Gs_country_m extends MY_Model
{

    protected $_table_name = 'gs_country';

    protected $_primary_key = 'id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}