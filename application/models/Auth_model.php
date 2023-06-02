<?php

class Auth_model extends CI_Model
{

    public function cek_login($email)
    {

        $hasil = $this->db->where('email', $email)->limit(1)->get('users');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
    public function cek_login_admin($username)
    {

        $hasil = $this->db->where('username', $username)->limit(1)->get('user');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    function daftar($data)
    {
        $this->db->insert('users', $data);
    }

    //Start: method tambahan untuk reset code  
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('id_users' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($id_users)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'id_users' => $id_users,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $id_users;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.id_users' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->id_users);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('id_users', $post['id_users']);
        $this->db->update('users', array('password' => $post['password']));
        return true;
    }
}
