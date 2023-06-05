<?php

class M_penjualan extends CI_Model
{

    function tampil_data()
    {
        $this->db->select("*");
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_penjualan.id_resaller');
        $query = $this->db->get();
        return $query->result();
    }

    function input_penjualan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_penjualan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function get_jumlah_beli($id_resaller)
    {
        $blnprediksi = strtotime("2022-12");
        $bulan = date('Y-m');
        for ($i = 0; $i < 6; $i++) {
            $bln[$i] = new DateTime($bulan);
            $interval[$i] = new DateInterval('P' . $i . 'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT * FROM tbl_penjualan WHERE id_resaller='$id_resaller' AND mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $result = 0;
        for ($j = 0; $j < 6; $j++) {
            $result += $query[$j]->num_rows();
        }

        return $result;
    }

    function get_total_harga($id_resaller)
    {
        $blnprediksi = strtotime("2022-12");
        $bulan = date('Y-m');
        for ($i = 0; $i < 6; $i++) {
            $bln[$i] = new DateTime($bulan);
            $interval[$i] = new DateInterval('P' . $i . 'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT SUM(total_harga) AS total FROM tbl_penjualan WHERE id_resaller='$id_resaller' AND mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $jumlah = 0;
        for ($j = 0; $j < 6; $j++) {
            foreach ($query[$j]->result() as $data) {
                $jumlah += $data->total;
            }
        }

        return $jumlah;
    }

    public function get_tipe($id_resaller)
    {
        $blnprediksi = strtotime("2022-12");
        $bulan = date('Y-m');
        for ($i = 0; $i < 6; $i++) {
            $bln[$i] = new DateTime($bulan);
            $interval[$i] = new DateInterval('P' . $i . 'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT tipe FROM tbl_penjualan WHERE id_resaller='$id_resaller' AND mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $tipe_barang = array();
        for ($j = 1; $j < 6; $j++) {
            foreach ($query[$j]->result() as $data) {
                array_push($tipe_barang, $data->tipe);
            }
        }

        return $tipe_barang;
    }

    public function get_pembayaran($id_resaller)
    {
        $blnprediksi = strtotime("2022-12");
        $bulan = date('Y-m');
        for ($i = 0; $i < 6; $i++) {
            $bln[$i] = new DateTime($bulan);
            $interval[$i] = new DateInterval('P' . $i . 'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT pembayaran FROM tbl_penjualan WHERE id_resaller='$id_resaller' AND mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $jenis_bayar = array();
        for ($j = 0; $j < 6; $j++) {
            foreach ($query[$j]->result() as $data) {
                array_push($jenis_bayar, $data->pembayaran);
            }
        }

        return $jenis_bayar;
    }

    public function get_count_all()
    {
        return $this->db->get('tbl_penjualan')->num_rows();
    }

    public function get_penjualann($limit, $start)
    {
        $this->db->select("*");
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_penjualan.id_resaller');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    function detail_penjualan($id_resaller)
    {
        $this->db->select("*");
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_resaller', 'tbl_resaller.id_resaller=tbl_penjualan.id_resaller');
        $this->db->where('tbl_resaller.id_resaller', $id_resaller);
        return $this->db->get()->result();
    }

    function hitung_penjualan()
    {
        $query = $this->db->get('tbl_penjualan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    function cek_penjualan($where)
    {
        return $this->db->get_where('tbl_penjualan', $where);
    }
    function cekPenjualanTerakhir()
    {
        $blnprediksi = strtotime("2022-12");
        $bulan = date('Y-m');
        for ($i = 0; $i < 6; $i++) {
            $bln[$i] = new DateTime($bulan);
            $interval[$i] = new DateInterval('P' . $i . 'M');

            $bln[$i]->sub($interval[$i]);
            $data[$i] = $bln[$i]->format('Y-m');
            $query[$i] = $this->db->query("SELECT * FROM tbl_penjualan WHERE mid(tgl_penjualan, 1,7) = '$data[$i]'");
        }

        $jumlah = 0;
        for ($j = 0; $j < 6; $j++) {
            $jumlah += $query[$j]->num_rows();
        }

        return $jumlah;
    }
}
