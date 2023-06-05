<?php

class M_login extends CI_Model
{

    function cek_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    function hitung_user()
    {
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
