<?php

class Gs_city_m extends MY_Model
{

    protected $_table_name = 'gs_city';

    protected $_order_by = 'city_id';

    protected $_primary_key = 'city_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}