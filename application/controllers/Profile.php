<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_register');
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->session->userdata('id') == NULL) {
            redirect('home');
        }
    }
    public function index()
    {
        $id = $this->session->userdata('id');
        $data['users'] = $this->M_register->get_data($id)->result();
        $this->load->view('web/template/header.php');
        $this->load->view('web/profile.php', $data);
        $this->load->view('web/template/footer.php');
    }
    public function ubah_password()
    {
        $id = $this->session->userdata('id');
        $data['users'] = $this->M_register->get_data($id)->result();
        $this->load->view('web/template/header.php');
        $this->load->view('web/ubah_password.php', $data);
        $this->load->view('web/template/footer.php');
    }
    public function update_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password tidak boleh kosong!'));
        $this->form_validation->set_rules('password_baru', 'Password', 'required|min_length[6]|max_length[25]|xss_clean|callback_is_password_strong', array(
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password minimal 6 karakter',
            'max_length' => 'Password maksimal 25 karakter',
        ));
        $this->form_validation->set_rules('repassword', 'Password', 'required|matches[password_baru]', array(
            'required' => 'Password tidak boleh kosong!',
            'matches'     => 'Password tidak sama'
        ));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->ubah_password();
        } else {
            $id = $this->session->userdata('id');
            $pass = htmlspecialchars($this->input->post('password', true));
            $cek_password = $this->M_register->cek_password($id);

            if (password_verify($pass, $cek_password->password)) {
                $pb = password_hash($this->input->post('password_baru', true), PASSWORD_DEFAULT);
                $data = array(
                    'password' => $pb,
                );
                $this->M_register->update_password($data, $id);
                $this->session->set_flashdata('profile', 'Password berhasil diubah.');
                redirect('profile');
            } else {
                $this->session->set_flashdata('error', 'Password yang Anda masukan salah.');
                redirect('profile/ubah_password');
            }
        }
    }
    public function users()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('no_hp', 'Nomer HP', 'required', array('required' => 'No hp tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id = $this->session->userdata('id');
            $data = array(
                'nama' => $this->input->post('nama', true),
                'no_hp' => $this->input->post('no_hp', true)
            );
            $this->M_register->update($data, $id);
            $this->session->set_flashdata('profile', 'Data berhasil diupdate');
            redirect('profile');
        }
    }
    public function is_password_strong($password_baru)
    {
        if (preg_match('#[0-9]#', $password_baru) && preg_match('#[a-zA-Z]#', $password_baru)) {
            return TRUE;
        }
        $this->form_validation->set_message('is_password_strong', 'Password harus terdiri dari kombinasi huruf besar, kecil dan angka.');
        return FALSE;
    }
}
