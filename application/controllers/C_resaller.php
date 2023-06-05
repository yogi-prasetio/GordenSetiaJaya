<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_resaller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_resaller');
		$this->load->model('M_penjualan');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pdf');
		$this->load->model('M_nilai');
		$this->load->model('M_nilai_detail');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = "Data Resaller";
		$data['resaller'] = $this->M_resaller->tampil_data()->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_resaller', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_resaller()
	{
		$data['title'] = "Data Resaller";

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_tambah_resaller', $data);
		$this->load->view('templates/footer');
	}

	public function simpan_resaller()
	{

		$nama_resaller = $this->input->post('nama_resaller');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');

		$data = [
			'nama_resaller' => $nama_resaller,
			'email' => $email,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		];

		$this->M_resaller->input_resaller($data, 'tbl_resaller');
		$this->session->set_flashdata('flashdata', 'Data resaller berhasil ditambahkan!');
		// $this->M_nilai->hapus_nilai();
		// $this->M_nilai_detail->hapus_nilai_detail();
		redirect('C_resaller');
	}

	public function hapus_resaller($id_resaller)
	{
		$where = array('id_resaller' => $id_resaller);
		$this->M_resaller->hapus_resaller($where, 'tbl_resaller');
		$this->session->set_flashdata('flashdata', 'Data resaller berhasil dihapus!');
		redirect('C_resaller');
	}

	public function edit_resaller($id_resaller)
	{
		$where = array('id_resaller' => $id_resaller);
		$data['edit'] = $this->M_resaller->edit_resaller($where, 'tbl_resaller')->result();
		$data["title"] = "Data Resaller ";
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_edit_resaller', $data);
		$this->load->view('templates/footer');
	}

	public function update_resaller()
	{
		$id_resaller = $this->input->post('id_resaller');
		$nama_resaller = $this->input->post('nama_resaller');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');

		$data = [
			'nama_resaller' => $nama_resaller,
			'email' => $email,
			'alamat' => $alamat,
			'no_hp' => $no_hp
		];

		$where = array('id_resaller' => $id_resaller);

		$this->M_resaller->update_resaller($where, $data, 'tbl_resaller');
		$this->session->set_flashdata('flashdata', 'Data resaller berhasil Diupdate!');
		redirect(base_url("C_resaller"));
	}

	public function detail_resaller($id_resaller)
	{
		$data['detail'] = $this->M_penjualan->detail_penjualan($id_resaller);
		$data["title"] = "Detail Resaller";
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_detail_penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function cetak_pdf()
	{

		$resaller = $this->M_resaller->tampil_data()->result();

		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Arial', 'B', '16');
		$pdf->Cell(0, 7, 'Data Resaller', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', '', '10');

		$pdf->Cell(12, 20, 'No', 1, 0, 'C');
		// $pdf->Cell(40,20, 'Foto',1,0,'C');
		$pdf->Cell(60, 20, 'Nama Resaller', 1, 0, 'C');
		$pdf->Cell(55, 20, 'Email', 1, 0, 'C');
		$pdf->Cell(90, 20, 'Alamat', 1, 0, 'C');
		$pdf->Cell(45, 20, 'Nomor HP', 1, 1, 'C');

		$no = 1;
		foreach ($resaller as $m) {
			$pdf->Cell(12, 20, $no, 1, 0, 'C');
			// $pdf->Cell(40,20,$pdf->Image('assets/gambar/'.$b->foto, $pdf->GetX()+10, $pdf->GetY()+2,15),1,0,'C');

			$pdf->Cell(60, 20, $m->nama_resaller, 1, 0, 'C');
			$pdf->Cell(55, 20, $m->email, 1, 0, 'C');
			$pdf->Cell(90, 20, $m->alamat, 1, 0, 'C');
			$pdf->Cell(45, 20, $m->no_hp, 1, 1, 'C');

			$no++;
		}
		$pdf->Output();
	}
}
