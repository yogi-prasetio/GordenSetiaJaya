<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_penjualan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_resaller');
		$this->load->model('M_penjualan');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pdf');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['title'] = "Data Penjualan";
		$data['resaller'] = $this->M_resaller->tampil_data()->result();
		$data['penjualan'] = $this->M_penjualan->tampil_data();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_penjualan()
	{
		$data['title'] = "Data Penjualan";
		$data['resaller'] = $this->M_resaller->tampil_data()->result();

		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_tambah_penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function simpan_penjualan()
	{

		$id_resaller = $this->input->post('id_resaller');
		$tipe = $this->input->post('tipe');
		$banyak = $this->input->post('banyak');
		$total_harga = $this->input->post('total_harga');
		$tgl_penjualan = $this->input->post('tgl_penjualan');
		$pembayaran = $this->input->post('jenis');

		$data = [
			'id_resaller' => $id_resaller,
			'tipe' => $tipe,
			'banyak' => $banyak,
			'total_harga' => $total_harga,
			'tgl_penjualan' => $tgl_penjualan,
			'pembayaran' => $pembayaran
		];

		$this->M_penjualan->input_penjualan($data, 'tbl_penjualan');
		$this->session->set_flashdata('flashdata', 'Data penjualan berhasil ditambahkan!');
		redirect('C_penjualan');
	}

	public function hapus_penjualan($id_penjualan)
	{
		$where = array('id_penjualan' => $id_penjualan);
		$this->M_penjualan->hapus_penjualan($where, 'tbl_penjualan');
		$this->session->set_flashdata('flashdata', 'Data penjualan berhasil dihapus!');
		redirect('C_penjualan');
	}

	public function edit_penjualan($id_penjualan)
	{
		$where = array('id_penjualan' => $id_penjualan);
		$data['edit'] = $this->M_penjualan->edit_penjualan($where, 'tbl_penjualan')->result();
		$data['resaller'] = $this->M_resaller->tampil_data()->result();
		$data["title"] = "Edit penjualan ";
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/v_edit_penjualan', $data);
		$this->load->view('templates/footer');
	}

	public function update_penjualan()
	{
		$id_penjualan = $this->input->post('id_penjualan');
		$id_resaller = $this->input->post('id_resaller');
		$tipe = $this->input->post('tipe');
		$banyak = $this->input->post('banyak');
		$total_harga = $this->input->post('total_harga');
		$tgl_penjualan = $this->input->post('tgl_penjualan');

		$data = [
			'id_resaller' => $id_resaller,
			'tipe' => $tipe,
			'banyak' => $banyak,
			'total_harga' => $total_harga,
			'tgl_penjualan' => $tgl_penjualan
		];

		$where = array('id_penjualan' => $id_penjualan);

		$this->M_penjualan->update_penjualan($where, $data, 'tbl_penjualan');
		$this->session->set_flashdata('flashdata', 'Data penjualan berhasil Diupdate!');
		redirect(base_url("C_penjualan"));
	}

	public function cetak_pdf()
	{

		$penjualan = $this->M_penjualan->tampil_data();

		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Arial', 'B', '16');
		$pdf->Cell(0, 7, 'Laporan Data Penjualan', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', '', '10');

		$pdf->Cell(12, 20, 'No', 1, 0, 'C');
		// $pdf->Cell(40,20, 'Foto',1,0,'C');
		$pdf->Cell(55, 20, 'Tanggal Penjualan', 1, 0, 'C');
		$pdf->Cell(60, 20, 'Nama Resaller', 1, 0, 'C');
		$pdf->Cell(45, 20, 'Tipe', 1, 0, 'C');
		$pdf->Cell(45, 20, 'Banyak', 1, 0, 'C');
		$pdf->Cell(45, 20, 'Total Harga', 1, 1, 'C');

		$no = 1;
		foreach ($penjualan as $m) {
			$pdf->Cell(12, 20, $no, 1, 0, 'C');
			// $pdf->Cell(40,20,$pdf->Image('assets/gambar/'.$b->foto, $pdf->GetX()+10, $pdf->GetY()+2,15),1,0,'C');

			$pdf->Cell(55, 20, $m->tgl_penjualan, 1, 0, 'C');
			$pdf->Cell(60, 20, $m->nama_resaller, 1, 0, 'C');
			$pdf->Cell(45, 20, $m->tipe, 1, 0, 'C');
			$pdf->Cell(45, 20, $m->banyak, 1, 0, 'C');
			$pdf->Cell(45, 20, $m->total_harga, 1, 1, 'C');

			$no++;
		}
		$pdf->Output();
	}
}
