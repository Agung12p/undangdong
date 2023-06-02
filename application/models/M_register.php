<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Register extends CI_Model
{

    function get_data($id)
    {
        $query = $this->db->get_where('users', array('id_users' => $id));
        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function save($data)
    {
        $this->db->insert('users', $data);
    }
    public function save_cek($data1)
    {
        $this->db->insert('cek_undangan', $data1);
    }
    public function cek_password($id)
    {

        $hasil = $this->db->where('id_users', $id)->limit(1)->get('users');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
    public function update_password($data, $id)
    {
        $this->db->where('id_users', $id);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }
    public function get_wilayah()
    {
        $query = $this->db->select('*')->from('wilayah_provinsi')->get();


        return $query;
    }
    public function get_kabupaten($n, $id, $m)
    {
        $query  = $this->db->query('SELECT kode,nama FROM wilayah_2020 WHERE LEFT(kode,' . $n . ')=' . $id . ' AND CHAR_LENGTH(kode)=' . $m . ' ORDER BY nama');


        return $query->result();
    }
}
