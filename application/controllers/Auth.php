<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Pinnacle_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('captcha');
    }

    public function index()
    {
        $dashboard = 'dashboard';
        $this->gs_users_m->loggedin() == FALSE || redirect($dashboard);
    }

    public function login()
    {
        $this->data['modules_title'] = $this->data['lang_login'];
        $this->data['captcha_img'] = $this->generate_captcha();
        $dashboard = 'dashboard';
        
        $this->gs_users_m->loggedin() == FALSE || redirect($dashboard);
        
        $rules = $this->gs_users_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            
            if ($this->cek_captcha()) {
                $this->session->set_flashdata('status_title', 'danger');
                $this->session->set_flashdata('status', $this->data['lang_wrong_captcha']);
                redirect('auth/login');
            } else {
                // We can login and redirect
                if ($this->gs_users_m->login() == TRUE) {
                    redirect($dashboard);
                } else {
                    $this->session->set_flashdata('status_title', 'danger');
                    $this->session->set_flashdata('status', $this->data['lang_login_failed']);
                    redirect('auth/login');
                }
            }
        }
        
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['base'] = $this->uri->rsegment(1) . '/login';
        $this->load->view('_layout_auth', $this->data);
    }

    public function forgot()
    {
        $this->data['modules_title'] = $this->data['lang_forgot'];
        
        $this->data['captcha_img'] = $this->generate_captcha();
        $dashboard = 'dashboard';
        
        $this->gs_users_m->loggedin() == FALSE || redirect($dashboard);
        
        $rules = $this->gs_users_m->rules_forgot;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            
            if ($this->cek_captcha()) {
                $this->session->set_flashdata('status_title', 'danger');
                $this->session->set_flashdata('status', $this->data['lang_wrong_captcha']);
                redirect('auth/forgot');
            } else {
                $user = $this->gs_users_m->get_by(array(
                    'users_email' => $this->input->post('email'),
                    'users_active' => '1'
                ), TRUE);
                if (count_valid($user)) {
                    $token = $this->gs_users_m->hash(date('Y-m-d H:i:s') . $this->input->post('email'));
                    $this->load->model('gs_reset_password_m');
                    $data = array(
                        'token' => $token,
                        'users_id' => $user->users_id,
                        'date_req' => date('Y-m-d H:i:s'),
                        'date_done' => NULL,
                        'done' => 0
                    );
                    $this->gs_reset_password_m->save($data, NULL);
                    $this->session->set_flashdata('status_title', 'success');
                    $this->session->set_flashdata('status', $this->data['lang_forgot_success'] . ' ' . $this->input->post('email'));
                    $subject = strip_tags($this->data['app']->app_name) . ' - ' . $this->data['lang_forgot_password'];
                    $body = 'Hai <strong>' . $user->users_name . '</strong>, berikut tombol reset password Anda:';
                    $this->send_email($subject, $body, $user->users_email, base_url('auth/recover?token=' . $token), $this->data['lang_recover_password']);
                    $this->session->set_flashdata('success', TRUE);
                    redirect('auth/forgot');
                } else {
                    $this->session->set_flashdata('status_title', 'danger');
                    $this->session->set_flashdata('status', $this->data['lang_forgot_failed']);
                    redirect('auth/forgot');
                }
            }
        }
        
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['base'] = $this->uri->rsegment(1) . '/forgot';
        $this->load->view('_layout_auth', $this->data);
    }

    public function recover()
    {
        $this->data['modules_title'] = $this->data['lang_recover_password'];
        
        $this->data['valid_token'] = TRUE;
        $this->load->model('gs_reset_password_m');
        
        $this->data['captcha_img'] = $this->generate_captcha();
        
        $dashboard = 'dashboard';
        
        $this->gs_users_m->loggedin() == FALSE || redirect($dashboard);
        
        $user = $this->gs_reset_password_m->get_by(array(
            'token' => $this->input->get('token'),
            'done' => 0
        ), TRUE);
        if (count_valid($user) == 0) {
            $this->data['valid_token'] = FALSE;
            $this->session->set_flashdata('status_title', 'danger');
            $this->session->set_flashdata('status', $this->data['lang_token_invalid']);
        }
        
        $rules = $this->gs_users_m->rules_change_password;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            
            if ($this->cek_captcha()) {
                $this->session->set_flashdata('status_title', 'danger');
                $this->session->set_flashdata('status', $this->data['lang_wrong_captcha']);
                redirect('auth/recover?token=' . $this->input->get('token'));
            } else {
                $data = array(
                    'users_password' => $this->gs_users_m->hash($this->input->post('password'))
                );
                $this->gs_users_m->save($data, $user->users_id);
                $data = array(
                    'date_done' => date('Y-m-d H:i:s'),
                    'done' => 1
                );
                $this->gs_reset_password_m->save($data, $user->token);
                $this->session->set_flashdata('status_title', 'success');
                $this->session->set_flashdata('status', $this->data['lang_recover_success']);
                
                redirect('auth/login');
            }
        }
        
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['base'] = $this->uri->rsegment(1) . '/recover';
        $this->load->view('_layout_auth', $this->data);
    }

    public function register()
    {
        $this->data['modules_title'] = $this->data['lang_register'];
        
        $this->data['captcha_img'] = $this->generate_captcha();
        $dashboard = 'dashboard';
        
        $this->gs_users_m->loggedin() == FALSE || redirect($dashboard);
        
        $rules = $this->gs_users_m->rules_register;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            
            if ($this->cek_captcha()) {
                $this->session->set_flashdata('status_title', 'danger');
                $this->session->set_flashdata('status', $this->data['lang_wrong_captcha']);
                redirect('auth/register');
            } else {
                $user = $this->gs_users_m->get_by(array(
                    'users_email' => $this->input->post('email'),
                    'users_active' => '1'
                ), TRUE);
                if (count_valid($user)) {
                    $this->session->set_flashdata('status_title', 'danger');
                    $this->session->set_flashdata('status', $this->data['lang_register_failed']);
                    redirect('auth/register');
                } else {
                    $data = array(
                        'users_id' => $this->gs_users_m->increment(),
                        'users_email' => $this->input->post('email'),
                        'users_password' => $this->hash($this->input->post('password')),
                        'users_name' => $this->input->post('nama'),
                        'users_mobile_number' => $this->input->post('hp'),
                        'roles_id' => 5,
                        'users_date_join' => date('Y-m-d H:i:s'),
                        'users_date_due' => NULL,
                        'users_active' => 1
                    );
                    $this->gs_users_m->save($data);
                    
                    $user = $this->gs_users_m->get($data['users_id']);
                    
                    // email notification
                    $subject = strip_tags($this->data['app']->app_name) . ' - ' . $this->data['lang_register'];
                    $body = 'Hai <strong>' . $user->users_name . '</strong>, berikut detail akun Anda:<br>Username : ' . $user->users_email . '<br>Password : ' . $this->input->post('password') . '<br><br>Silahkan login ke portal dengan username dan password Anda, klik tombol berikut:';
                    $this->send_email($subject, $body, $user->users_email, base_url('auth/login'), $this->data['lang_login']);
                    
                    $this->session->set_flashdata('status_title', 'success');
                    $this->session->set_flashdata('status', $this->data['lang_register_success']);
                    redirect('auth/login');
                }
            }
        }
        
        $this->data['css'] = $this->uri->rsegment(1) . '/css';
        $this->data['js'] = $this->uri->rsegment(1) . '/js';
        $this->data['base'] = $this->uri->rsegment(1) . '/register';
        $this->load->view('_layout_auth', $this->data);
    }

    public function logout()
    {
        $this->gs_users_m->logout();
        redirect('auth/login');
    }

    public function ajax_generate_captcha()
    {
        $captcha_img = $this->generate_captcha();
        echo $captcha_img;
    }
}
