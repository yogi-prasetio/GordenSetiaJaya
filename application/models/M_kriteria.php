<?php

class M_kriteria extends CI_Model
{

    function tampil_data()
    {
        return $this->db->get('tbl_kriteria');
    }

    function input_kriteria($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function getKode($table = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($table)->row_array()[$field];
    }

    function hapus_kriteria($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_kriteria($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_kriteria($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hitung_kriteria()
    {
        $query = $this->db->get('tbl_kriteria');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
