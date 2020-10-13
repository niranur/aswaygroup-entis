<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checking_users()
    {
        $users = $this->gs_users_m->get_by(array(
            'users_active' => 1
        ));
        foreach ($users as $val) :
            if ($val->users_date_due != NULL) {
                if (str_replace('-', '', $val->users_date_due) < date('Ymd')) {
                    $data = array(
                        'users_date_due' => NULL,
                        'users_active' => 2
                    );
                    $this->gs_users_m->save($data, $val->users_id);
                }
            }
        endforeach
        ;
    }
}