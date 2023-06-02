<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan_pernikahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_undangan', 'undangan');
    }
    public function index()
    {
        $this->output->set_status_header('404');
        $data['content'] = 'error_404';
        $this->load->view('web/404.php', $data);
    }
    public function pengantin()
    {
        if ($id = $this->uri->segment('3') === null) {
            $this->index();
        } else {
            $id = $this->uri->segment('3');
            $nama = $this->uri->segment('4');
            $data['undangan'] = $this->undangan->get_undangan($id)->result_array();
            if ($data['undangan'] != null) {
                $this->load->view('undangan/template/header.php', $data);
                $this->load->view('undangan/cover.php', $data);
                $this->load->view('undangan/template/nav.php');
                $this->load->view('undangan/template/footer.php');
            } else {
                $this->index();
            }
        }
    }
    public function halaman()
    {
        $menu = $this->uri->segment('3');
        $id_undangan = $this->uri->segment('4');


        $data['undangan'] = $this->undangan->get_undangan($id_undangan)->result_array();
        foreach ($data['undangan'] as $key) {
            $id_users = $key['id_users'];
        }
        $data['ucapan'] = $this->undangan->get_ucapan($id_users)->result_array();
        $data['mengundang'] = $this->undangan->get_mengundang($id_users)->result_array();
        if ($menu === 'cover') {
            $this->load->view('undangan/home.php', $data);
        } elseif ($menu === 'mempelai') {
            $this->load->view('undangan/mempelai.php', $data);
        } elseif ($menu === 'acara') {
            $this->load->view('undangan/acara.php', $data);
        } elseif ($menu === 'mengundang') {
            $this->load->view('undangan/mengundang.php', $data);
        } elseif ($menu === 'lokasi') {
            $this->load->view('undangan/lokasi.php', $data);
        } elseif ($menu === null) {
            $this->load->view('undangan/home.php', $data);
        }
    }
    public function ucapan_masuk()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[ucapan.email]',
            array(
                'required' => 'E-mail tidak boleh kosong!',
                'is_unique'     => '%s sudah pernah digunakan.'
            )
        );
        $this->form_validation->set_rules('nama_ucapan', 'Nama', 'required', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('pesan', 'Pesan', 'required', array('required' => 'Pesan tidak boleh kosong!'));
        if ($this->form_validation->run() == FALSE) {
            $json = array(
                'nama_ucapan' => form_error('nama_ucapan', '<p class=" text-danger">', '</p>'),
                'email' => form_error('email', '<p class=" text-danger">', '</p>'),
                'pesan' => form_error('pesan', '<p class=" text-danger">', '</p>')
            );
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        } else {
            $data = array(
                'nama_ucapan' => $this->input->post('nama_ucapan', true),
                'email' => $this->input->post('email', true),
                'pesan' => $this->input->post('pesan', true),
                'id_users' => $this->input->post('id_users', true)
            );
            $this->undangan->addUcapan($data);
            echo json_encode('sukses');
        }
    }
}
