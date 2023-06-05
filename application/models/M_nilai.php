<?php

class M_nilai extends CI_Model
{

    function tampil_data()
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai');
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_nilai.id_resaller');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function tampil_data_by_periode($where)
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai');
        $this->db->where($where);
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_nilai.id_resaller');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    function input_resaller($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function nilai_tertinggi()
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai');
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_nilai.id_resaller');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->first_row();
    }

    function get_nresaller()
    {
        $this->db->select("*");
        $this->db->from('tbl_resaller');
        return $this->db->get()->result();
    }

    function hapus_nilai()
    {
        return $this->db->query("TRUNCATE TABLE tbl_nilai");
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
    function cekNilaiPeriode()
    {
        $this->db->select("tgl_penilaian");
        $this->db->from('tbl_nilai');
        $this->db->order_by('tgl_penilaian', 'desc');
        $this->db->limit(1);
        $result = $this->db->get()->result();
        if ($result != NULL) {
            return $result[0]->tgl_penilaian;
        } else {
            return '';
        }
    }
    function getPeriode()
    {
        $this->db->select("tgl_penilaian");
        $this->db->distinct();
        $this->db->from('tbl_nilai');
        $this->db->order_by('tgl_penilaian', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function getNilaiPeriode($periode)
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai');
        $this->db->where('tgl_penilaian', $periode);
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_nilai.id_resaller');
        $this->db->order_by('nilai', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function getNilaiReseller($periode)
    {
        $this->db->select("*");
        $this->db->from('tbl_nilai');
        $this->db->where('tgl_penilaian', $periode);
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_nilai.id_resaller');
        $this->db->order_by('nilai', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getResellerbyPeriode($periode)
    {
        $this->db->select('*');
        $this->db->from('tbl_nilai');
        $this->db->where('tgl_penilaian', $periode);
        return $this->db->get()->num_rows();
    }
}
