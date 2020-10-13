<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ap_todolist extends Pinnacle_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ap_todolist_m');
        date_default_timezone_set("Asia/Jakarta");
        $this->dateToday = date("Y-m-d H:i:s");
    }

    public function index()
    {


//         $this->data['todolist'] = $this->ap_todolist_m->get_by(array(
//             'todolist_id' => 1
//         ),TRUE);

        $this->db->order_by('todolist_deadline');
        $this->db->join('gs_users leader', 'leader.users_id=ap_todolist.users_id', 'left');
        $this->db->select('*, ap_todolist.todolist_id');
        $this->data['todolist'] = $this->ap_todolist_m->get_by(array(
            'todolist_status_color' => 1
        ));

        $this->db->order_by('todolist_deadline');
        $this->db->join('gs_users leader', 'leader.users_id=ap_todolist.users_id', 'left');
        $this->db->select('*, ap_todolist.todolist_id');
        $this->data['process'] = $this->ap_todolist_m->get_by(array(
            'todolist_status_color' => 2
        ));

        $this->db->order_by('todolist_deadline');
        $this->db->join('gs_users leader', 'leader.users_id=ap_todolist.users_id', 'left');
        $this->db->select('*, ap_todolist.todolist_id');
        $this->data['review'] = $this->ap_todolist_m->get_by(array(
            'todolist_status_color' => 3
        ));

        $this->db->order_by('todolist_deadline');
        $this->db->join('gs_users leader', 'leader.users_id=ap_todolist.users_id', 'left');
        $this->db->select('*, ap_todolist.todolist_id');
        $this->data['done'] = $this->ap_todolist_m->get_by(array(
            'todolist_status_color' => 4
        ));

        $this->data['subview'] = $this->uri->rsegment(1) . '/index';
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['ajax_detail'] = $this->uri->rsegment(1) . '/ajax_detail';
        $this->load->view('_layout_main', $this->data);
    }

    public function ajax_simpan()
    {
        $json = $this->input->post('serial');
        $json = json_decode($json);

        foreach ($json[0] as $val) :
        $data = array(
            'todolist_update' => date("Y-m-d H:i:s"),
            'todolist_status' => status_string(0),
            'todolist_status_color' => 1
        );
        $this->ap_todolist_m->save($data, $val->id);
        endforeach
        ;

        foreach ($json[1] as $val) :
        $data = array(
            'todolist_status' => status_string(1),
            'todolist_status_color' => 2
        );
        $this->ap_todolist_m->save($data, $val->id);
        endforeach
        ;

        foreach ($json[2] as $val) :
        $data = array(
            'todolist_status' => status_string(2),
            'todolist_status_color' => 3
        );
        $this->ap_todolist_m->save($data, $val->id);
        endforeach
        ;

        foreach ($json[3] as $val) :
        $data = array(
            'todolist_status' => status_string(3),
            'todolist_status_color' => 4
        );
        $this->ap_todolist_m->save($data, $val->id);
        endforeach
        ;

        redirect($this->uri->rsegment(1));

    }

}