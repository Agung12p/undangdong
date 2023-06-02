<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_undangan extends CI_Model
{
    public function save_batch($data)
    {
        return $this->db->insert_batch('mengundang', $data);
    }
    public function save_akad($lokasi_akad)
    {
        return $this->db->insert('lokasi_akad', $lokasi_akad);
    }
    public function addUcapan($data)
    {
        return $this->db->insert('ucapan', $data);
    }
    public function save_resepsi($lokasi_resepsi)
    {
        return $this->db->insert('lokasi_resepsi', $lokasi_resepsi);
    }
    public function save_undangan($data)
    {
        return $this->db->insert('undangan', $data);
    }
    public function save_waktu($data)
    {
        return $this->db->insert('waktu', $data);
    }
    public function get_data($id)
    {
        $this->db->select('*');
        $this->db->from('undangan');
        $this->db->join('users', 'users.id_users=undangan.id_users');
        $this->db->join('theme', 'theme.id_theme=undangan.id_theme');
        $this->db->join('lokasi_akad', 'lokasi_akad.id_undangan=undangan.id_undangan');
        $this->db->join('lokasi_resepsi', 'lokasi_resepsi.id_undangan=undangan.id_undangan');
        $this->db->join('waktu', 'waktu.id_undangan=undangan.id_undangan');
        $this->db->where('undangan.id_users', $id);
        return $this->db->get();
    }
    public function get_theme()
    {
        return $this->db->get('theme');
    }
    public function get_mengundang($id_users)
    {
        return $this->db->get_where('mengundang', array('id_users' => $id_users));
    }
    public function get_id_undangan($id)
    {
        return $this->db->get_where('undangan', array('id_users' => $id));
    }
    public function get_undangan($id)
    {
        $this->db->select('*');
        $this->db->from('undangan');
        $this->db->join('users', 'users.id_users=undangan.id_users');
        $this->db->join('theme', 'theme.id_theme=undangan.id_theme');
        $this->db->join('lokasi_akad', 'lokasi_akad.id_undangan=undangan.id_undangan');
        $this->db->join('lokasi_resepsi', 'lokasi_resepsi.id_undangan=undangan.id_undangan');
        $this->db->join('waktu', 'waktu.id_undangan=undangan.id_undangan');
        $this->db->where('undangan.id_undangan', $id);
        return $this->db->get();
    }

    public function get_ucapan($id)
    {
        $this->db->select('*');
        $this->db->from('ucapan');
        $this->db->join('users', 'users.id_users=ucapan.id_users');
        $this->db->where('ucapan.id_users', $id);
        return $this->db->get();
    }

    public function get_cek($id)
    {
        $this->db->select('*');
        $this->db->from('cek_undangan');
        $this->db->join('users', 'users.id_users=cek_undangan.id_users');
        $this->db->where('cek_undangan.id_users', $id);
        return $this->db->get();
    }
    public function update_status($data1, $id)
    {
        $this->db->update('cek_undangan', $data1, array('id_users' => $id));
    }
    public function hapus_undangan($id_undangan)
    {
        $this->db->where('id_undangan', $id_undangan);
        $this->db->delete('undangan');
    }
    public function hapus_ucapan($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('ucapan');
    }
    public function hapus_mengundang($id)
    {
        $this->db->where('id_users', $id);
        $this->db->delete('mengundang');
    }
    public function hapus_akad($id)
    {
        $this->db->where('id_undangan', $id);
        $this->db->delete('lokasi_akad');
    }
    public function hapus_resepsi($id)
    {
        $this->db->where('id_undangan', $id);
        $this->db->delete('lokasi_resepsi');
    }
    public function hapus_waktu($id)
    {
        $this->db->where('id_undangan', $id);
        $this->db->delete('waktu');
    }
}
