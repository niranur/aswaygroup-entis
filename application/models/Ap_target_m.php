<?php

class Ap_target_m extends MY_Model
{

    protected $_table_name = 'ap_target_category';

    protected $_primary_key = 'target_category_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;


    function __construct()
    {
        parent::__construct();
    }

}