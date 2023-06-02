<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_register');
        $this->load->helper('security');
        $this->load->library('form_validation');
        if ($this->session->userdata('id') != NULL) {
            redirect('home');
        }
    }
    public function index()
    {
        $this->load->view('web/template/header.php');
        $this->load->view('web/register.php');
        $this->load->view('web/template/footer.php');
    }
    function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('wilayah_kabupaten', array('provinsi_id' => $id_prov));
        $data = "<option selected disabled value=''>Pilih Kabupaten/Kota</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('wilayah_kecamatan', array('kabupaten_id' => $id_kab));
        $data = "<option selected disabled value=''>Pilih Kecamatan</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }

    function add_ajax_des($id_kec)
    {
        $query = $this->db->get_where('wilayah_desa', array('kecamatan_id' => $id_kec));
        $data = "<option selected disabled value=''>Pilih Desa</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->nama . "'>" . $value->nama . "</option>";
        }
        echo $data;
    }
    // public function get_daerah()
    // {
    //     $data = $this->input->post('wil', true);
    //     $id = $this->input->post('id', true);
    //     // var_dump($data);
    //     // exit;

    //     $n = strlen($id);
    //     $m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));

    //     if ($data == "kabupaten") {
    //         echo
    //         '
    //         <select name="kabupaten" class="form-control" id="form_kab">
    //         <option value="">Pilih Kabupaten/Kota</option>';
    //         $kabupaten = $this->M_register->get_kabupaten($n, $id, $m);
    //         foreach ($kabupaten as $wi) {
    //             echo '<option value="' . $wi->kode . '"> ' . $wi->nama . '</option>';
    //         };
    //         echo '</select>';
    //         // $csrf_name = $this->security->get_csrf_token_name();
    //         // $csrf_hash = $this->security->get_csrf_hash();
    //         // $reponse[$csrf_name] = $csrf_hash;
    //         // echo json_encode($reponse);
    //     } else if ($data == "kecamatan") {
    //         echo
    //         '
    //         <select class="select form-control" id="form_kec">
    //         <option value="">Pilih Kecamatan</option>';
    //         $kecamatan = $this->M_register->get_kabupaten($n, $id, $m);
    //         foreach ($kecamatan as $wi) {
    //             echo '<option value="' . $wi->kode . '"> ' . $wi->nama . '</option>';
    //         };
    //         echo '</select>';
    //         // $csrf_name = $this->security->get_csrf_token_name();
    //         // $csrf_hash = $this->security->get_csrf_hash();
    //         // $reponse[$csrf_name] = $csrf_hash;
    //         // echo json_encode($reponse);
    //     } else if ($data == "desa") {
    //         echo
    //         '
    //         <select class="select form-control" id="form_des">
    //         <option value="">Pilih Desa</option>';
    //         $desa = $this->M_register->get_kabupaten($n, $id, $m);
    //         foreach ($desa as $wi) {
    //             echo '<option value="' . $wi->kode . '"> ' . $wi->nama . '</option>';
    //         };
    //         echo '</select>';
    //         // $csrf_name = $this->security->get_csrf_token_name();
    //         // $csrf_hash = $this->security->get_csrf_hash();
    //         // $reponse[$csrf_name] = $csrf_hash;
    //         // echo json_encode($reponse);
    //     }
    // }

    public function create_user()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[users.email]|xss_clean',
            array(
                'required' => 'E-mail tidak boleh kosong!',
                'is_unique'     => '%s sudah pernah digunakan.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]|xss_clean|callback_is_password_strong', array(
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password minimal 6 karakter',
            'max_length' => 'Password maksimal 25 karakter',
        ));
        $this->form_validation->set_rules('repassword', 'Password', 'required|matches[password]|xss_clean', array(
            'required' => 'Password tidak boleh kosong!',
            'matches'     => 'Password tidak sama'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('no_hp', 'Nomer HP', 'required', array('required' => 'No hp tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            $data = array(
                'nama' => $this->input->post('nama', true),
                'no_hp' => $this->input->post('no_hp', true),
                'email' => $this->input->post('email', true),
                'password' => $password
            );
            $this->M_register->save($data);
            $id_users = $this->db->insert_id();

            $data1 = array(
                'status' => 0,
                'id_users' => $id_users
            );

            $this->M_register->save_cek($data1);
            $this->session->set_flashdata('regis', 'Yeayy!, Berhasil membuat akun.');
            redirect('login');
        }
    }
    public function is_password_strong($password)
    {
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
            return TRUE;
        }
        $this->form_validation->set_message('is_password_strong', 'Password harus terdiri dari kombinasi huruf besar, kecil dan angka.');
        return FALSE;
    }
}
