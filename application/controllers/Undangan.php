<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Undangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->helper('security');
        $this->load->model('M_undangan', 'undangan');
        $this->load->library('form_validation');
        $this->load->helper('download');
        if ($this->session->userdata('id') == NULL) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['undangan'] = $this->undangan->get_data($this->session->userdata('id'))->result_array();
        // var_dump($data);
        $data['cek'] = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        $cek = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        foreach ($cek as $un) {
            $status = $un['status'];
        }
        $undangan = $this->undangan->get_id_undangan($this->session->userdata('id'))->result_array();
        foreach ($undangan as $un) {
            $id_undangan = $un['id_undangan'];
        }
        if ($status == 1) {
            redirect(base_url() . "undangan/waktu/" . $id_undangan);
        } elseif ($status == 2) {
            redirect(base_url() . "undangan/lokasi/" . $id_undangan);
        } elseif ($status == 3) {
            redirect(base_url() . "undangan/mengundang");
        }
        $this->load->view('web/template/header.php');
        $this->load->view('web/undangan.php', $data);
        $this->load->view('web/template/footer.php');
    }

    public function buat_undangan()
    {
        $undangan = $this->undangan->get_id_undangan($this->session->userdata('id'))->result_array();
        foreach ($undangan as $un) {
            $id_undangan = $un['id_undangan'];
        }
        $cek = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        $data['theme'] = $this->undangan->get_theme()->result_array();
        foreach ($cek as $un) {
            $status = $un['status'];
        }
        if ($status == 1) {
            redirect(base_url() . "undangan/waktu/" . $id_undangan);
        } elseif ($status == 2) {
            redirect(base_url() . "undangan/lokasi/" . $id_undangan);
        } elseif ($status == 3) {
            redirect(base_url() . "undangan/mengundang");
        }
        $this->load->view('web/template/header.php');
        $this->load->view('web/buat_undangan.php', $data);
        $this->load->view('web/template/footer.php');
    }
    public function mengundang()
    {
        $undangan = $this->undangan->get_id_undangan($this->session->userdata('id'))->result_array();
        foreach ($undangan as $un) {
            $id_undangan = $un['id_undangan'];
        }
        $cek = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        foreach ($cek as $un) {
            $status = $un['status'];
        }
        if ($status == 0 || $status == 4) {
            redirect('undangan');
        } elseif ($status == 2) {
            redirect(base_url() . "undangan/lokasi/" . $id_undangan);
        } elseif ($status == 1) {
            redirect(base_url() . "undangan/waktu/" . $id_undangan);
        }
        $this->load->view('web/template/header.php');
        $this->load->view('web/turut_mengundang.php');
        $this->load->view('web/template/footer.php');
    }
    public function lokasi()
    {
        $undangan = $this->undangan->get_id_undangan($this->session->userdata('id'))->result_array();
        foreach ($undangan as $un) {
            $id_undangan = $un['id_undangan'];
        }
        $cek = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        foreach ($cek as $un) {
            $status = $un['status'];
        }
        if ($status == 0 || $status == 4) {
            redirect('undangan');
        } elseif ($status == 3) {
            redirect('undangan/mengundang');
        } elseif ($status == 1) {
            redirect(base_url() . "undangan/waktu/" . $id_undangan);
        }

        $this->load->view('web/template/header.php');
        $this->load->view('web/input_lokasi.php');
        $this->load->view('web/template/footer.php');
    }
    public function waktu()
    {
        $undangan = $this->undangan->get_id_undangan($this->session->userdata('id'))->result_array();
        foreach ($undangan as $un) {
            $id_undangan = $un['id_undangan'];
        }
        $cek = $this->undangan->get_cek($this->session->userdata('id'))->result_array();
        foreach ($cek as $un) {
            $status = $un['status'];
        }
        if ($status == 0 || $status == 4) {
            redirect('undangan');
        } elseif ($status == 3) {
            redirect('undangan/mengundang');
        } elseif ($status == 2) {
            redirect(base_url() . "undangan/lokasi/" . $id_undangan);
        }

        $this->load->view('web/template/header.php');
        $this->load->view('web/waktu.php');
        $this->load->view('web/template/footer.php');
    }
    public function create_lokasi()
    {
        $this->form_validation->set_rules('latitude_akad', 'Latitude', 'required|xss_clean', array('required' => 'Latitude tidak boleh kosong!'));
        $this->form_validation->set_rules('latitude_resepsi', 'Latitude', 'required|xss_clean', array('required' => 'Latitude tidak boleh kosong!'));
        $this->form_validation->set_rules('longitude_resepsi', 'longitude', 'required|xss_clean', array('required' => 'Longitude tidak boleh kosong!'));
        $this->form_validation->set_rules('longitude_akad', 'longitude', 'required|xss_clean', array('required' => 'Longitude tidak boleh kosong!'));
        $this->form_validation->set_rules('alamat_akad', 'Alamat', 'required|xss_clean', array('required' => 'Alamat tidak boleh kosong!'));
        $this->form_validation->set_rules('alamat_resepsi', 'Alamat', 'required|xss_clean', array('required' => 'Alamat tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('val', 'Gagal menambah data');
            redirect('undangan/lokasi');
        } else {

            $lokasi_akad = array(
                'latitude_akad' => $this->input->post('latitude_akad', true),
                'longitude_akad' => $this->input->post('longitude_akad', true),
                'alamat_akad' => $this->input->post('alamat_akad', true),
                'id_undangan' => $this->input->post('id_undangan', true)
            );
            $this->undangan->save_akad($lokasi_akad);
            $lokasi_resepsi = array(
                'latitude_resepsi' => $this->input->post('latitude_resepsi', true),
                'longitude_resepsi' => $this->input->post('longitude_resepsi', true),
                'alamat_resepsi' => $this->input->post('alamat_resepsi', true),
                'id_undangan' => $this->input->post('id_undangan', true)
            );
            $this->undangan->save_resepsi($lokasi_resepsi);
            $id = $this->session->userdata('id');
            $data1 = array(
                'status' => 3
            );
            $this->undangan->update_status($data1, $id);
            $this->session->set_flashdata('regis', 'Lokasi berhasil dibuat');
            redirect('undangan/mengundang');
        }
    }
    public function create_mengundang()
    {
        $nama_mengundang = $this->input->post('nama_mengundang', true);
        $result = array();
        foreach ($nama_mengundang as $key => $val) {
            if (!empty($val)) {
                $result[] = array(
                    'nama_mengundang' => $nama_mengundang[$key],
                    'id_users' => $this->session->userdata('id')
                );
            }
        }
        if ($this->db->insert_batch('mengundang', $result)) {
            $id = $this->session->userdata('id');
            $data1 = array(
                'status' => 4
            );
            $this->undangan->update_status($data1, $id);
            $this->session->set_flashdata('regis', 'Undangan berhasil dibuat');
            redirect('undangan');
        } else {
            $this->session->set_flashdata('msg', 'Data gagal dibuat, silahkan coba lagi');
            redirect('undangan/megundang');
        }
    }
    public function create_waktu()
    {
        $this->form_validation->set_rules('tgl_akad', 'tgl', 'required|xss_clean', array('required' => 'Tanggal tidak boleh kosong!'));
        $this->form_validation->set_rules('tgl_resepsi', 'tgl', 'required|xss_clean', array('required' => 'Tanggal tidak boleh kosong!'));
        $this->form_validation->set_rules('jam_mulai_akad', 'jam', 'required|xss_clean', array('required' => 'Waktu tidak boleh kosong!'));
        $this->form_validation->set_rules('jam_selesai_akad', 'jam', 'required|xss_clean', array('required' => 'Waktu tidak boleh kosong!'));
        $this->form_validation->set_rules('jam_mulai_resepsi', 'jam', 'required|xss_clean', array('required' => 'Waktu tidak boleh kosong!'));
        $this->form_validation->set_rules('jam_selesai_resepsi', 'jam', 'required|xss_clean', array('required' => 'Waktu tidak boleh kosong!'));
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Gagal menambah data');
            redirect('undangan/waktu');
        } else {
            $data = array(
                'tgl_akad' => $this->input->post('tgl_akad', true),
                'tgl_resepsi' => $this->input->post('tgl_resepsi', true),
                'jam_mulai_akad' => $this->input->post('jam_mulai_akad', true),
                'jam_selesai_akad' => $this->input->post('jam_selesai_akad', true),
                'jam_mulai_resepsi' => $this->input->post('jam_mulai_resepsi', true),
                'jam_selesai_resepsi' => $this->input->post('jam_selesai_resepsi', true),
                'id_undangan' => $this->input->post('id_undangan', true)
            );
            $this->undangan->save_waktu($data);
            $id = $this->session->userdata('id');
            $data1 = array(
                'status' => 2
            );
            $this->undangan->update_status($data1, $id);
            $this->session->set_flashdata('regis', 'Waktu berhasil dibuat');
            redirect(base_url() . "undangan/lokasi/" . $this->input->post('id_undangan', true));
        }
    }
    public function create()
    {
        $this->form_validation->set_rules('theme', 'Theme', 'required|xss_clean', array('required' => 'Thema tidak boleh kosong!'));
        $this->form_validation->set_rules('nama_pria', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('nama_wanita', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('ot_pria_p', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('ot_wanita_p', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('ot_pria_w', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));
        $this->form_validation->set_rules('ot_wanita_w', 'Nama', 'required|xss_clean', array('required' => 'Nama tidak boleh kosong!'));

        if (empty($_FILES['foto_pria']['name'])) {
            $this->form_validation->set_rules('foto_pria', 'Foto', 'required|xss_clean', array('required' => 'Foto tidak boleh kosong!'));
        }
        if (empty($_FILES['foto_wanita']['name'])) {
            $this->form_validation->set_rules('foto_wanita', 'Foto', 'required|xss_clean', array('required' => 'Foto tidak boleh kosong!'));
        }
        if (empty($_FILES['foto_bersama']['name'])) {
            $this->form_validation->set_rules('foto_bersama', 'Foto', 'required|xss_clean', array('required' => 'Foto tidak boleh kosong!'));
        }
        $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', 'Gagal menambah data');
            $this->buat_undangan();
        } else {
            $config['upload_path'] = "./assets/img/pengantin";
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '1024';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto_pria")) {
                $gbr = $this->upload->data();
                $foto_pria = $gbr['file_name'];
            } else {
                $this->session->set_flashdata('msg', 'Foto pria gagal diupload, ukuran maksimal 1 mb');
                redirect('undangan/buat_undangan');
            }

            $config['upload_path'] = "./assets/img/pengantin";
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '1024';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto_wanita")) {
                $gbr1 = $this->upload->data();
                $foto_wanita = $gbr1['file_name'];
            } else {
                $this->session->set_flashdata('msg', 'Foto wanita gagal diupload, ukuran maksimal 1 mb');
                redirect('undangan/buat_undangan');
            }

            $config['upload_path'] = "./assets/img/pengantin";
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '1024';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto_bersama")) {
                $gbr2 = $this->upload->data();
                $foto_bersama = $gbr2['file_name'];
            } else {
                $this->session->set_flashdata('msg', 'Foto bersma gagal diupload, ukuran maksimal 1 mb');
                redirect('undangan/buat_undangan');
            }

            $nama_pria = implode(" ", array_slice(explode(" ", $this->input->post('nama_pria', true)), 0, 1));
            $nama_wanita = implode(" ", array_slice(explode(" ", $this->input->post('nama_wanita', true)), 0, 1));
            $rand = $this->session->userdata('id');
            $huruf = $nama_wanita . $nama_pria;
            $kodeUndangan = $huruf . $rand;

            $data = array(
                'id_undangan' => $kodeUndangan,
                'nama_pria' => $this->input->post('nama_pria', true),
                'nama_wanita' => $this->input->post('nama_wanita', true),
                'ot_pria_p' => $this->input->post('ot_pria_p', true),
                'ot_wanita_p' => $this->input->post('ot_wanita_p', true),
                'ot_pria_w' => $this->input->post('ot_pria_w', true),
                'ot_wanita_w' => $this->input->post('ot_wanita_w', true),
                'foto_pria' => $foto_pria,
                'foto_wanita' => $foto_wanita,
                'foto_bersama' => $foto_bersama,
                'id_users' => $this->session->userdata('id'),
                'id_theme' => $this->input->post('theme', true)
            );
            if ($this->undangan->save_undangan($data)) {
                $id = $this->session->userdata('id');
                $data1 = array(
                    'status' => 1
                );
                $this->undangan->update_status($data1, $id);
                $this->session->set_flashdata('regis', 'Data pengantin berhasil dibuat');
                redirect(base_url() . "undangan/waktu/" . $kodeUndangan);
            } else {
                $this->session->set_flashdata('msg', 'Undangan gagal dibuat');
                redirect('undangan/buat_undangan');
            }
        }
    }
    function undangan_check()
    {
        $sitenames =  $this->input->post('nama_mengundang');
    }
    public function cover()
    {
        $data['undangan'] = $this->undangan->get_data($this->session->userdata('id'))->result_array();
        $this->load->view('web/cover.php', $data);
    }

    public function hapus($id)
    {
        if ($id == $this->session->userdata('id')) {
            $undangan = $this->undangan->get_id_undangan($id)->result_array();
            foreach ($undangan as $un) {
                $id_undangan = $un['id_undangan'];
            }
            $this->undangan->hapus_akad($id_undangan);
            $this->undangan->hapus_resepsi($id_undangan);
            $this->undangan->hapus_waktu($id_undangan);
            $this->undangan->hapus_mengundang($id);
            $this->undangan->hapus_ucapan($id);
            $this->undangan->hapus_undangan($id_undangan);

            $data1 = array(
                'status' => 0
            );
            $this->undangan->update_status($data1, $id);
            redirect('undangan');
        } else {
            redirect('error');
        }
    }
    public function halaman()
    {
        $menu = $this->uri->segment('3');
        // var_dump($data);
        // die;

        $data['ucapan'] = $this->undangan->get_ucapan($this->session->userdata('id'))->result_array();
        $data['undangan'] = $this->undangan->get_data($this->session->userdata('id'))->result_array();
        $data['mengundang'] = $this->undangan->get_mengundang($this->session->userdata('id'))->result_array();

        if ($menu === 'cover') {
            $this->load->view('web/cover.php', $data);
        } elseif ($menu === 'mempelai') {
            $this->load->view('web/mempelai.php', $data);
        } elseif ($menu === 'acara') {
            $this->load->view('web/acara.php', $data);
        } elseif ($menu === 'mengundang') {
            $this->load->view('web/mengundang.php', $data);
        } elseif ($menu === 'lokasi') {
            $this->load->view('web/lokasi.php', $data);
        } elseif ($menu === null) {
            $this->load->view('web/cover.php', $data);
        }
    }
}
