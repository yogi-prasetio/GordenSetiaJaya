<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_kriteria');
	}

	public function index()
	{
		$data['title'] = "Data Kriteria";
		$data['kriteria'] = $this->M_kriteria->tampil_data()->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_kriteria', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_kriteria()
	{
		$table = "tbl_kriteria";
		$field = "id_kriteria";

		$laskKode = $this->M_kriteria->getKode($table, $field);
		$noUrut = (int) substr($laskKode, -1, 1);

		$noUrut++;
		$str = "K";
		$newKode = $str . strval($noUrut);

		$data['newKode'] = $newKode;
		$data['title'] = "Kriteria";

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_tambah_kriteria', $data);
		$this->load->view('templates/footer');
	}

	public function simpan_kriteria()
	{

		$id_kriteria = $this->input->post('id_kriteria');
		$nama_kriteria = $this->input->post('nama_kriteria');
		$jenis_kriteria = $this->input->post('jenis_kriteria');
		$bobot = $this->input->post('bobot');

		$data = [
			'id_kriteria' => $id_kriteria,
			'nama_kriteria' => $nama_kriteria,
			'jenis_kriteria' => $jenis_kriteria,
			'bobot' => $bobot
		];

		$this->M_kriteria->input_kriteria($data, 'tbl_kriteria');
		$this->session->set_flashdata('flashdata', 'Data kriteria berhasil ditambahkan!');
		redirect('C_kriteria');
	}

	public function hapus_kriteria($id_kriteria)
	{
		$where = array('id_kriteria' => $id_kriteria);
		$this->M_kriteria->hapus_kriteria($where, 'tbl_kriteria');
		$this->session->set_flashdata('flashdata', 'Data Kriteria berhasil dihapus!');
		redirect('admin/C_kriteria');
	}

	public function edit_kriteria($id_kriteria)
	{
		$where = array('id_kriteria' => $id_kriteria);
		$data['edit'] = $this->M_kriteria->edit_kriteria($where, 'tbl_kriteria')->result();
		$data["title"] = "Edit kriteria ";
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_edit_kriteria', $data);
		$this->load->view('templates/footer');
	}

	public function update_kriteria()
	{
		$id_kriteria = $this->input->post('id_kriteria');
		$nama_kriteria = $this->input->post('nama_kriteria');
		$jenis_kriteria = $this->input->post('jenis_kriteria');
		$bobot = $this->input->post('bobot');

		$data = [
			'nama_kriteria' => $nama_kriteria,
			'jenis_kriteria' => $jenis_kriteria,
			'bobot' => $bobot
		];

		$where = array('id_kriteria' => $id_kriteria);

		$this->M_kriteria->update_kriteria($where, $data, 'tbl_kriteria');
		$this->session->set_flashdata('flashdata', 'Data kriteria berhasil Diupdate!');
		redirect(base_url("C_kriteria"));
	}
}
