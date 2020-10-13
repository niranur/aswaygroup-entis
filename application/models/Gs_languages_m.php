<?php

class Gs_languages_m extends MY_Model
{

    protected $_table_name = 'gs_languages';

    protected $_primary_key = 'lang';

    protected $_primary_filter = 'strval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}