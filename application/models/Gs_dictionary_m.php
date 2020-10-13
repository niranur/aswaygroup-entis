<?php

class Gs_dictionary_m extends MY_Model
{

    protected $_table_name = 'gs_dictionary';

    protected $_primary_key = 'slug';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}