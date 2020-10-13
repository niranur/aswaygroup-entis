<?php

class Gs_users_m extends MY_Model
{

    protected $_table_name = 'gs_users';

    protected $_primary_key = 'users_id';

    protected $_primary_filter = 'intval';

    protected $_timestamps = FALSE;

    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

    public $rules_register = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        ),
        'nama' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        ),
        'hp' => array(
            'field' => 'hp',
            'label' => 'HP',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

    public $rules_forgot = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        )
    );

    public $rules_profile = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        ),
        'nama' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'trim|required'
        ),
        'hp' => array(
            'field' => 'hp',
            'label' => 'HP',
            'rules' => 'trim|required'
        )
    );

    public $rules_change_password = array(
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
        'password_confirm' => array(
            'field' => 'password_confirm',
            'label' => 'Confirm Password',
            'rules' => 'trim|required|matches[password]'
        )
    );

    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $response = FALSE;
        $this->db->where(array(
            'users_email' => $this->input->post('email'),
            'users_password' => $this->hash($this->input->post('password')),
            'users_active' => '1'
        ));
        $this->db->or_where(array(
            'users_mobile_number' => $this->input->post('email')
        ));
        $this->db->where(array(
            'users_password' => $this->hash($this->input->post('password')),
            'users_active' => '1'
        ));
        $user = $this->get_by(array(), TRUE);

        if (count_valid($user)) {
            if ($user->users_date_due == NULL) {
                $data = array(
                    'id' => $user->users_id,
                    'loggedin' => TRUE
                );
                $this->session->set_userdata($data);
                $response = TRUE;
            } else {
                if (str_replace('-', '', $user->users_date_due) >= date('Ymd')) {
                    $data = array(
                        'id' => $user->users_id,
                        'loggedin' => TRUE
                    );
                    $this->session->set_userdata($data);
                    $response = TRUE;
                } else {
                    $data = array(
                        'users_date_due' => NULL,
                        'users_active' => 2
                    );
                    $this->save($data, $user->users_id);
                }
            }
        }

        return $response;
    }

    public function loggedin()
    {
        return (bool) $this->session->userdata('loggedin');
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function get_new()
    {
        $variabel = new stdClass();
        $variabel->users_id = '';
        $variabel->users_email = '';
        $variabel->users_password = '';
        $variabel->users_name = '';
        $variabel->users_mobile_number = '';
        $variabel->users_avatar = 'favicon/apple-icon.png';
        $variabel->users_lang = '';
        $variabel->users_date_due = '';
        $variabel->roles_id = '';
        $variabel->users_active = '';

        return $variabel;
    }
}