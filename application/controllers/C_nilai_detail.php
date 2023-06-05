<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_nilai_detail extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_nilai');
		$this->load->model('M_resaller');
		$this->load->model('M_kriteria');
	}

	public function index()
	{
		$data['title'] = "Nilai Detail";
		$data['nilai'] = $this->M_nilai->tampil_data();
		$data['resaller'] = $this->M_resaller->tampil_data()->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_nilai_detail', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_nilai()
	{
		$data['title'] = "nilai";

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_tambah_nilai', $data);
		$this->load->view('templates/footer');
	}

	public function simpan_nilai()
	{

		$nama_nilai = $this->input->post('nama_nilai');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');

		$data = [
			'nama_nilai' => $nama_nilai,
			'email' => $email,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		];

		$this->M_nilai->input_nilai($data, 'tbl_nilai');
		$this->session->set_flashdata('flashdata', 'Data nilai berhasil ditambahkan!');
		redirect('C_nilai');
	}

	public function hapus_nilai($id_nilai)
	{
		$where = array('id_nilai' => $id_nilai);
		$this->M_nilai->hapus_nilai($where, 'tbl_nilai');
		$this->session->set_flashdata('flashdata', 'Data nilai berhasil dihapus!');
		redirect('C_nilai');
	}

	public function edit_nilai($id_nilai)
	{
		$where = array('id_nilai' => $id_nilai);
		$data['edit'] = $this->M_nilai->edit_nilai($where, 'tbl_nilai')->result();
		$data["title"] = "Edit nilai ";
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_edit_nilai', $data);
		$this->load->view('templates/footer');
	}

	public function update_nilai()
	{
		$id_nilai = $this->input->post('id_nilai');
		$nama_nilai = $this->input->post('nama_nilai');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');

		$data = [
			'nama_nilai' => $nama_nilai,
			'email' => $email,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		];

		$where = array('id_nilai' => $id_nilai);

		$this->M_nilai->update_nilai($where, $data, 'tbl_nilai');
		$this->session->set_flashdata('flashdata', 'Data nilai berhasil Diupdate!');
		redirect(base_url("C_nilai"));
	}
}
