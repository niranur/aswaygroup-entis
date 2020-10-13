<?php

class Pinnacle_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (! empty($this->session->userdata('id'))) {
            
            // user info
            $this->db->join('gs_languages', 'gs_languages.lang=gs_users.users_lang', 'left');
            $this->db->join('gs_roles', 'gs_roles.id=gs_users.roles_id', 'left');
            $this->data['users'] = $this->gs_users_m->get($this->session->userdata('id'));
            
            // list modules
            $this->data['modules'] = $this->gs_modules_m->get();
            
            // languages
            $this->data['list_lang'] = $this->gs_languages_m->get();
            $check_lang = $this->gs_languages_m->get($this->data['users']->users_lang);
            $this->data['mylanguages_field'] = $check_lang->field;
            $mylanguages_field_x = $check_lang->field;
            
            // set language
            $this->config->set_item('language', $this->data['users']->users_lang);
            
            // dictionary
            $dictionary = $this->gs_dictionary_m->get();
            foreach ($dictionary as $value) {
                $this->data[$value->slug] = $value->$mylanguages_field_x;
            }
            
            // user roles
            $this->db->join('gs_modules', 'gs_modules.id=gs_roles_modules.modules_id', 'left');
            $this->data['main_menu'] = $this->gs_roles_modules_m->get_by(array(
                'roles_id' => $this->data['users']->roles_id,
                'parent_modules_id' => 0
            ));
            
            $this->db->join('gs_modules', 'gs_modules.id=gs_roles_modules.modules_id', 'left');
            $this->db->where('parent_modules_id<>0');
            $this->data['main_menu_tree'] = $this->gs_roles_modules_m->get_by(array(
                'roles_id' => $this->data['users']->roles_id
            ));
            
            $this->db->join('gs_modules', 'gs_modules.id=gs_roles_modules.modules_id', 'left');
            $hak_akses = $this->gs_roles_modules_m->get_by(array(
                'roles_id' => $this->data['users']->roles_id,
                'slug' => $this->uri->rsegment(1)
            ));
            
            $this->data['main_menu_active'] = '';
            $this->data['main_menu_open'] = '';
            $this->data['modules_icon'] = '';
            $this->data['modules_title'] = '';
            $this->data['modules_parent'] = '';
            if ($this->uri->rsegment(1) == 'dashboard' or $this->uri->rsegment(1) == '') {
                $this->data['main_menu_active'] = 'dashboard';
                $this->data['modules_icon'] = '';
                $this->data['modules_title'] = $this->data['lang_dashboard'];
            } elseif ($this->uri->rsegment(1) == 'error_404') {
                $this->data['main_menu_active'] = 'error_404';
                $this->data['modules_icon'] = '';
                $this->data['modules_title'] = 'Error 404';
            } else {
                $this->db->join('gs_modules', 'gs_modules.id=gs_roles_modules.modules_id', 'left');
                $active_item = $this->gs_roles_modules_m->get_by(array(
                    'slug' => $this->uri->rsegment(1)
                ), TRUE);
                if ($active_item) {
                    $this->data['main_menu_active'] = $active_item->slug;
                    $this->data['main_menu_open'] = $active_item->parent_modules_id;
                    $this->data['modules_icon'] = $active_item->icon;
                    $this->data['modules_title'] = $active_item->$mylanguages_field_x;
                    if ($active_item->parent_modules_id != 0) {
                        $par = $this->gs_modules_m->get($active_item->parent_modules_id);
                        $this->data['modules_parent'] = $par->$mylanguages_field_x;
                    }
                }
            }
            
            $pengecualian = array();
            
            $pengecualian = array(
                'dashboard',
                'auth',
                'gs_language',
                'error_404',
                ''
            );
            
            if (in_array($this->uri->rsegment(1), $pengecualian) == FALSE) {
                if (count_valid($hak_akses) == 0) {
                    redirect('error_404');
                }
            }
        } else {
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
        
        // Login check
        $exception_uris = array(
            'auth/login',
            'auth/forgot',
            'auth/recover',
            'auth/register',
            'auth/logout',
            'auth/ajax_generate_captcha',
        );
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->gs_users_m->loggedin() == FALSE) {
                redirect('auth/login');
            }
        }
    }
}