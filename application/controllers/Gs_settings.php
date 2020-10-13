<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gs_settings extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('gs_province_m');
        $this->load->model('gs_city_m');
        $this->load->model('gs_subdistrict_m');
    }

    public function index()
    {
        $this->data['content'] = $this->gs_settings_m->get(1);
        count_valid($this->data['content']) || redirect('error_404');
        $data = array(
            'app_name' => $this->input->post('nama'),
            'app_desc' => $this->input->post('desc'),
            'app_ver' => $this->input->post('ver'),
            'company' => $this->input->post('company'),
            'copy_right' => $this->input->post('copy_right'),
            'copy_right_url' => $this->input->post('copy_right_url'),
            'address' => $this->input->post('address'),
            'open_registration' => $this->input->post('open_registration'),
            'multi_language' => $this->input->post('multi_language')
        );
        
        $rules = $this->gs_settings_m->rules;
        $this->form_validation->set_rules($rules);
        
        if ($this->form_validation->run() == TRUE) {
            $this->gs_settings_m->save($data, 1);
            if (1) {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_edit_success']);
            } else {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
            }
            redirect($this->uri->rsegment(1));
        }
        
        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->load->view('_layout_main', $this->data);
    }

    public function backup_db()
    {
        $this->load->dbutil();
        $backup = $this->dbutil->backup();
        
        $this->load->helper('file');
        write_file('./database/db.gz', $backup);
        
        $data = array(
            'database_last_backup' => date('Y-m-d H:i:s')
        );
        $this->gs_settings_m->save($data, 1);
        
        $this->session->set_flashdata('status_title', 'success');
        $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
        redirect($this->uri->rsegment(1));
    }

    public function ajax_province()
    {
        $this->db->truncate('gs_province');
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: d6b2eb5b01af6332b7b200ad3974b7f1"
            )
        ));
        
        $response = curl_exec($curl);
        $response = json_decode($response);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            foreach ($response->rajaongkir->results as $val) :
                $data = array(
                    'province_id' => $val->province_id,
                    'province' => $val->province
                );
                $this->gs_province_m->save($data);
            endforeach
            ;
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
            redirect($this->uri->rsegment(1));
        }
    }

    public function ajax_city()
    {
        $this->db->truncate('gs_city');
        $this->db->truncate('gs_subdistrict');
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: d6b2eb5b01af6332b7b200ad3974b7f1"
            )
        ));
        
        $response = curl_exec($curl);
        $response = json_decode($response);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            foreach ($response->rajaongkir->results as $val) :
                $data = array(
                    'city_id' => $val->city_id,
                    'province_id' => $val->province_id,
                    'province' => $val->province,
                    'type' => $val->type,
                    'city_name' => $val->city_name,
                    'postal_code' => $val->postal_code
                );
                $this->gs_city_m->save($data);
                $this->ajax_subdistrict($val->city_id);
            endforeach
            ;
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
            redirect($this->uri->rsegment(1));
        }
    }

    public function ajax_subdistrict($city_id)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=" . $city_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: d6b2eb5b01af6332b7b200ad3974b7f1"
            )
        ));
        
        $response = curl_exec($curl);
        $response = json_decode($response);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            foreach ($response->rajaongkir->results as $val) :
                $data = array(
                    'subdistrict_id' => $val->subdistrict_id,
                    'province_id' => $val->province_id,
                    'province' => $val->province,
                    'city_id' => $val->city_id,
                    'city' => $val->city,
                    'type' => $val->type,
                    'subdistrict_name' => $val->subdistrict_name
                );
                $this->gs_subdistrict_m->save($data);
            endforeach
            ;
        }
    }
}