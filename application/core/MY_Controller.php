<?php

class MY_Controller extends CI_Controller
{

    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['errors'] = array();
        $this->load->model('gs_captcha_m');
        $this->load->model('gs_dictionary_m');
        $this->load->model('gs_languages_m');
        $this->load->model('gs_modules_m');
        $this->load->model('gs_reset_password_m');
        $this->load->model('gs_roles_m');
        $this->load->model('gs_roles_modules_m');
        $this->load->model('gs_sessions_m');
        $this->load->model('gs_settings_m');
        $this->load->model('gs_users_m');
        $this->data['app'] = $this->gs_settings_m->get(1);
        $this->data['default_image'] = 'favicon/apple-icon.png';
        $this->data['transaction'] = array(
            'invoice' => 'INV'
        );
    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function upload_all($nama)
    {
        $date = date('Ym');
        if (! is_dir('uploads/' . $date)) {
            mkdir('./uploads/' . $date, 0777, TRUE);
        }
        
        $this->load->library('upload');
        
        $config['upload_path'] = './uploads/' . $date . '/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|gif|png|bmp';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
        
        $nama_file = $date . '/' . $this->upload->data('file_name');
        
        return $nama_file;
    }

    public function upload_doc($nama)
    {
        $date = date('Ym');
        if (! is_dir('uploads/' . $date)) {
            mkdir('./uploads/' . $date, 0777, TRUE);
        }
        
        $this->load->library('upload');
        
        $config['upload_path'] = './uploads/' . $date . '/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $this->upload->do_upload($nama);
        
        $nama_file = $date . '/' . $this->upload->data('file_name');
        
        return $nama_file;
    }

    public function upload_img($nama, $compress = FALSE, $width = NULL)
    {
        $date = date('Ym');
        if (! is_dir('uploads/' . $date)) {
            mkdir('./uploads/' . $date, 0777, TRUE);
        }
        
        $this->load->library('upload');
        
        $config['upload_path'] = './uploads/' . $date . '/';
        $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
        $config['encrypt_name'] = TRUE;
        
        $this->upload->initialize($config);
        
        $this->upload->do_upload($nama);
        
        $nama_file = $date . '/' . $this->upload->data('file_name');
        
        if ($compress) {
            // Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/' . $nama_file;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '80%';
            $config['width'] = $width;
            $config['new_image'] = './uploads/' . $nama_file;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        
        return $nama_file;
    }

    public function upload_avatar($nama, $compress = FALSE, $width = NULL)
    {
        $this->load->library('upload');
        
        $config['upload_path'] = './uploads/avatar/';
        $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
        $config['encrypt_name'] = TRUE;
        
        $this->upload->initialize($config);
        
        $this->upload->do_upload($nama);
        
        $nama_file = 'avatar/' . $this->upload->data('file_name');
        
        if ($compress) {
            // Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/' . $nama_file;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '80%';
            $config['width'] = $width;
            $config['new_image'] = './uploads/' . $nama_file;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        
        return $nama_file;
    }

    public function convert_img_to_base64($files)
    {
        $type = $files['type'];
        $data = file_get_contents($files['tmp_name']);
        $base64 = 'data:' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public function convert_base64_to_img($img, $compress = FALSE, $width = NULL)
    {
        $date = date('Ym');
        if (! is_dir('uploads/' . $date)) {
            mkdir('./uploads/' . $date, 0777, TRUE);
        }
        
        $data = base64_decode($img);
        $nama_file = $date . '/' . md5(uniqid(mt_rand())) . '.png';
        $file = './uploads/' . $nama_file;
        $success = file_put_contents($file, $data);
        
        if ($compress) {
            // Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/' . $nama_file;
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '80%';
            $config['width'] = $width;
            $config['new_image'] = './uploads/' . $nama_file;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        
        return $nama_file;
    }

    public function generate_captcha()
    {
        // start captcha
        $vals = array(
            'img_path' => './uploads/captcha/',
            'img_url' => base_url('uploads/captcha'),
            'img_width' => 250,
            'img_height' => 32,
            'word_length' => 3,
            'expiration' => 7200,
            'img_id' => 'Imageid',
            'pool' => '0123456789',
            'colors' => array(
                'background' => array(
                    255,
                    255,
                    255
                ),
                'border' => array(
                    255,
                    255,
                    255
                ),
                'text' => "#5867dd",
                'grid' => "#ffb822"
            )
        );
        $cap = create_captcha($vals);
        $data = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $this->input->ip_address(),
            'word' => $cap['word']
        );
        $query = $this->db->insert_string('gs_captcha', $data);
        $this->db->query($query);
        return $cap['image'];
        // end captcha
    }

    public function cek_captcha()
    {
        $status = FALSE;
        // First, delete old captchas
        $expiration = time() - 7200; // Two hour limit
        $this->db->where('captcha_time < ', $expiration)->delete('gs_captcha');
        // Then see if a captcha exists:
        $sql = 'SELECT COUNT(*) AS count FROM gs_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array(
            $_POST['captcha'],
            $this->input->ip_address(),
            $expiration
        );
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        
        if ($row->count == 0) {
            $status = TRUE;
        }
        return $status;
    }

    public function transaction($model, $field, $code)
    {
        $this->load->model($model);
        $no = 1;
        $thn = date('Y');
        $bln = date('m');
        $tgl = date('d');
        $this->db->limit(1);
        $this->db->order_by($field . ' DESC');
        $cek = $this->$model->get_by(array(), TRUE);
        if ($cek) {
            $part = explode('-', $cek->$field);
            $bulan = substr($part[1], 4, 2);
            if (intval($bln) == intval($bulan)) {
                $no = intval($part[2]) + 1;
            }
        }
        
        $id = $code . "-" . $thn . "" . $bln . "-" . sprintf("%04s", $no);
        return $id;
    }

    public function send_email($subject, $message, $to, $link = NULL, $link_label = NULL)
    {
        $this->load->library('email');
        
        $message = '<p><img width="64px" src="cid:logo_src" /></p><p>' . $message . '</p>';
        
        $this->data['subject'] = $subject;
        $this->data['body'] = $message;
        $this->data['link'] = $link;
        $this->data['link_label'] = $link_label;
        
        $body = $this->load->view('email_template/default', $this->data, TRUE);
        
        // Attaching the logo first.
        $file_logo = FCPATH . 'uploads/' . $this->data['default_image'];
        $this->email->attach($file_logo, 'inline', null, '', true);
        $cid_logo = $this->email->get_attachment_cid($file_logo);
        $body = str_replace('cid:logo_src', 'cid:' . $cid_logo, $body);
        // End attaching the logo.
        
        $result = $this->email->from('noreply@goodsyst.co.id', 'GoodSyst')
            ->reply_to('noreply@goodsyst.co.id')
            ->to($to)
            ->subject($subject)
            ->message($body)
            ->send();
        
        // var_dump($result);
        // echo '<br />';
        // echo $this->email->print_debugger();
        
        // exit();
    }
}