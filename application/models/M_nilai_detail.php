<?php

class M_nilai_detail extends CI_Model
{

    function tampil_data()
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai_detail');
        $query = $this->db->get();
        return $query->result();
    }

    function input_nilai_detail($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function getNilai($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }

    function getTotalNilai($where, $table)
    {
        return $this->db->get_where($table, $where)->result_array();
    }

    function hapus_nilai_detail()
    {
        return $this->db->query("TRUNCATE TABLE tbl_nilai_detail");
    }
}
