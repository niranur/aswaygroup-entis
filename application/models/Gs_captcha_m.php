<?php

class Gs_captcha_m extends MY_Model
{

    protected $_table_name = 'gs_captcha';

    protected $_primary_key = 'captcha_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array();

    function __construct()
    {
        parent::__construct();
    }
}