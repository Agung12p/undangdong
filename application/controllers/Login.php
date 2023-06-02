<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model('auth_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('web/template/header.php');
        $this->load->view('web/login.php');
        $this->load->view('web/template/footer.php');
    }
    public function login_admin()
    {
        $this->session->sess_destroy();
        $this->load->view('web/login_admin');
    }
    public function forget()
    {
        $data['web'] = $this->M_web->get_web()->result();
        $data['judul'] = 'Lupa Password - CUCIIN Laundry';
        $this->load->view('web/header', $data);
        $this->load->view('web/lupa_password');
        $this->load->view('web/footer', $data);
    }
    public function input_password()
    {
        if ($this->base64url_decode($this->uri->segment(4)) == NULL) {
            redirect('login');
        }
        $data['web'] = $this->M_web->get_web()->result();
        $data['judul'] = 'Reset Password - CUCIIN Laundry';
        $this->load->view('web/header', $data);
        $this->load->view('web/reset_password');
        $this->load->view('web/footer', $data);
    }

    public function auth_admin()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required' => 'Username tidak boleh kosong!')
        );
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->login_admin();
        } else {

            $username = htmlspecialchars($this->input->post('username'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->auth_model->cek_login_admin($username);

            if ($cek_login == FALSE) {
                $this->session->set_flashdata('error_login', 'Username yang Anda masukan tidak terdaftar.');
                redirect('login/login_admin');
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    $this->session->set_userdata('id_admin', $cek_login->id_user);
                    $this->session->set_userdata('username_admin', $cek_login->username);
                    $this->session->set_userdata('name_admin', $cek_login->nama);
                    $this->session->set_userdata('level_admin', $cek_login->id_role);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('error_login', 'Username atau password yang Anda masukan salah.');
                    redirect('login/login_admin');
                }
            }
        }
    }
    public function auth()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array('required' => 'E-mail tidak boleh kosong!')
        );
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $email = htmlspecialchars($this->input->post('email', true));
            $pass = htmlspecialchars($this->input->post('password', true));
            $cek_login = $this->auth_model->cek_login($email);

            if ($cek_login == FALSE) {
                $this->session->set_flashdata('error_login', 'Email yang Anda masukan tidak terdaftar.');
                redirect('login');
            } else {

                if (password_verify($pass, $cek_login->password)) {
                    $this->session->set_userdata('id', $cek_login->id_users);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('nama', $cek_login->nama);
                    $this->session->set_userdata('no_hp', $cek_login->no_hp);
                    redirect('undangan');
                } else {
                    $this->session->set_flashdata('error_login', 'Username atau password yang Anda masukan salah.');
                    redirect('login');
                }
            }
        }
    }
    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->forget();
        } else {
            $email = $this->input->post('email', true);
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->auth_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('err', 'email address salah, silakan coba lagi.');
                redirect('login/forget');
            }

            //build token   
            $email = $this->input->post('email', true);
            $this->load->library('email'); //panggil library email codeigniter
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'muchtarahehe@gmail.com', //alamat email gmail
                'smtp_pass' => 'hehehe12P', //password email 
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $token = $this->auth_model->insertToken($userInfo->id_users);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . 'login/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . 'Reset Password' . '</a>';
            $message =  "
            <html>
            <head>
            <title>Verification Code</title>
            </head>
            <body>
            <h2>Verifikasi akun anda</h2>
            <p>Your Account:</p>
            <p>Email: " . $email . "</p>
            <p>klink link untuk reset password akun anda.</p>
            <h4>" . $link . "</h4>
            </body>
            </html>
            ";

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject('Email verifikasi'); //subjek email
            $this->email->message($message);
            if (!$this->email->send()) {
                echo $this->email->print_debugger();
            } else {
                $this->session->set_flashdata('msg', 'Silahkan cek email anda');
                redirect('login/forget');
            }
        }
    }
    public function reset_password()
    {

        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->auth_model->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('error', 'Token tidak valid atau kadaluarsa');
            redirect('login/forget');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));
            $this->form_validation->set_rules('repassword', 'Password', 'required|matches[password]', array(
                'required' => 'Password tidak boleh kosong!',
                'matches'     => 'Password tidak sama'
            ));
            $data['web'] = $this->M_web->get_web()->result();
            $data['token'] = array(
                'judul' => 'Reset Password - CUCIIN Laundry',
                'nama' => $user_info->nama_users,
                'email' => $user_info->email,
                'token' => $this->base64url_encode($token)
            );
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('web/header', $data);
                $this->load->view('web/reset_password', $data);
                $this->load->view('web/footer');
            } else {
                $post = $this->input->post(NULL, TRUE);
                $cleanPost = $this->security->xss_clean($post);
                $hashed = password_hash($cleanPost['password'], PASSWORD_DEFAULT);
                $cleanPost['password'] = $hashed;
                $cleanPost['id_users'] = $user_info->id_users;
                unset($cleanPost['passconf']);
                if (!$this->auth_model->updatePassword($cleanPost)) {
                    $this->session->set_flashdata('error', 'Update password gagal.');
                    redirect('login/forget');
                } else {
                    $this->session->set_flashdata('regis', 'Password anda sudah diperbaharui. Silakan login.');
                    redirect('login');
                }
            }
        }
    }
    public function update()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->reset_password();
        } else {






            // $post = $this->input->post(NULL, TRUE);
            // $cleanPost = $this->security->xss_clean($post);
            // $hashed = md5($cleanPost['password']);
            // $cleanPost['password'] = $hashed;
            // $cleanPost['id_users'] = $user_info->id_users;
            // unset($cleanPost['passconf']);
            // if (!$this->auth_model->updatePassword($cleanPost)) {
            //     $this->session->set_flashdata('sukses', 'Update password gagal.');
            // } else {
            //     $this->session->set_flashdata('sukses', 'Password anda sudah  
            //  diperbaharui. Silakan login.');
            // }
            // redirect(site_url('login'), 'refresh');
        }
    }
    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
