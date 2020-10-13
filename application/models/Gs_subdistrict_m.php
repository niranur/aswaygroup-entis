<?php

class Gs_subdistrict_m extends MY_Model
{

    protected $_table_name = 'gs_subdistrict';

    protected $_order_by = 'subdistrict_id';

    protected $_primary_key = 'subdistrict_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}