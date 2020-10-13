<?php

class General_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // languages
        $this->data['list_lang'] = $this->gs_languages_m->get();
        $check_lang = $this->gs_languages_m->get($this->config->item('language'));
        $this->data['mylanguages_field'] = $check_lang->field;
        $mylanguages_field_x = $check_lang->field;
        
        // set language
        $this->config->set_item('language', $this->config->item('language'));
        
        // dictionary
        $dictionary = $this->gs_dictionary_m->get();
        foreach ($dictionary as $value) {
            $this->data[$value->slug] = $value->$mylanguages_field_x;
        }
    }
}