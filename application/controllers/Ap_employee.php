<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ap_employee extends Pinnacle_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_employee_m');
    }


    public function index()
    {
        $this->db->order_by('employee_id DESC');
        $this->data['content'] = $this->ap_employee_m->get();
       // print_r( $this->data['content']);

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['ajax_detail'] = $this->uri->rsegment(1) . '/ajax_detail';
        $this->load->view('_layout_main', $this->data);
    }


    public function edit($id = NULL)
    {
        $this->data['language'] = $this->gs_languages_m->get();

        $this->data['roles'] = $this->ap_employee_m->get_by(array(
            'employee_id<>' => 1
        ));

        if ($id) {
            $this->data['content'] = $this->ap_employee_m->get($id);
            count_valid($this->data['content']) || redirect('error_404');
            $data = array(
                'employee_name' => $this->input->post('name'),
                'employee_age' => $this->input->post('age'),
                'employee_address' => $this->input->post('address')
            );
        } else {
            $this->data['content'] = $this->ap_employee_m->get_new();
            $data = array(
                'employee_id' => $this->ap_employee_m->increment(),
                'employee_name' => $this->input->post('name'),
                'employee_age' => $this->input->post('age'),
                'employee_address' => $this->input->post('address'),
                'employee_date_created' => date('Y-m-d H:i:s')
            );
        }

        $rules = $this->ap_employee_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {

            $this->ap_employee_m->save($data, $id);
            if ($id) {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_edit_success']);
            } else {
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_status_add_success']);
            }
            redirect($this->uri->rsegment(1));
        }


        $this->data['subview'] = $this->uri->rsegment(1) . '/edit';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['ajax_detail'] = $this->uri->rsegment(1) . '/ajax_detail';
        $this->load->view('_layout_main', $this->data);
    }


     public function delete($id)
    {
       $cek = $this->ap_employee_m->get($id);
        if ($this->ap_employee_m->delete($id) == TRUE) {
            $this->session->set_flashdata('status_title', 'success');
            $this->session->set_flashdata('status', $this->data['lang_status_delete_success']);
        } else {
            $this->session->set_flashdata('status_title', 'error');
            $this->session->set_flashdata('status', $this->data['lang_status_error']);
        }

        redirect($this->uri->rsegment(1));
    }

    public function employee_add()
    {

        $data = array(
            'employee_id' => $this->ap_employee_m->increment(),
            'employee_name' => $this->input->post('name'),
            'employee_age' => $this->input->post('age'),
            'employee_address' => $this->input->post('address'),
            'employee_date_created' => date('Y-m-d H:i:s')
        );
        $this->ap_employee_m->save($data);
       // print_r($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_list()
    {
        $list = $this->ap_employee_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->employee_name;
            $row[] = $person->employee_age;
            $row[] = $person->employee_address;


            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->employee_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->employee_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }



}