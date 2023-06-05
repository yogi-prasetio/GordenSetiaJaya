<?php

class M_resaller extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    function tampil_data()
    {
        return $this->db->get('tbl_resaller');
    }

    function input_resaller($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_resaller($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_resaller($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_resaller($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hitung_resaller()
    {
        $query = $this->db->get('tbl_resaller');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function get_count_all()
    {
        return $this->db->get('tbl_resaller')->num_rows();
    }

    public function get_resaller($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('tbl_resaller');
        return $query->result();
    }
}
