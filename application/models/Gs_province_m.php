<?php

class Gs_province_m extends MY_Model
{

    protected $_table_name = 'gs_province';

    protected $_order_by = 'province_id';

    protected $_primary_key = 'province_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}