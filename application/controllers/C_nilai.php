<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_nilai extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_nilai');
		$this->load->model('M_nilai_detail');
		$this->load->model('M_resaller');
		$this->load->model('M_kriteria');
		$this->load->model('M_penjualan');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pdf');
	}

	public function index()
	{
		$periode = $this->input->post('periode');
		$nilai = $this->M_nilai->getNilaiPeriode($periode);

		$data['nilai_detail'] = $this->M_nilai_detail->tampil_data();
		$resallerr = $this->M_resaller->tampil_data()->result();

		if ($periode == null) {
			$tgl_penilaian = $this->M_nilai->cekNilaiPeriode();
			$data['nilai_detail'] = $this->M_nilai_detail->tampil_data();
			$jml_reseller = $this->M_nilai->getResellerbyPeriode($tgl_penilaian);

			if ($data['nilai_detail'] != null) {
				$data_nilai = array();

				for ($i = 0; $i < $jml_reseller; $i++) {
					$nilai = array();
					array_push($nilai, $resallerr[$i]->nama_resaller);
					for ($j = 0; $j < 4; $j++) {
						array_push($nilai, ($this->M_nilai_detail->getNilai(['id_resaller' => $resallerr[$i]->id_resaller, 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail')[$j]->nilai));
					}
					array_push($data_nilai, $nilai);
					unset($nilai);
				};

				$dataResaller = $this->M_nilai->getNilaiReseller($tgl_penilaian);
				// var_dump($dataResaller);
				// die();
				// $resallerrr = array();
				// $resaller = array();
				// for ($i = 0; $i < count($dataResaller); $i++) {
				// 	array_push($resaller, $dataResaller[$i]["id_resaller"]);
				// }
				// for ($i = 0; $i < count($dataResaller); $i++) {
				// 	array_push($resallerrr, $dataResaller[$i]["nama_resaller"]);
				// }

				$nilai_c1 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K1', 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail');
				$nilai_c2 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K2', 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail');
				$nilai_c3 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K3', 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail');
				$nilai_c4 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K4', 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail');

				$c1 = 0;
				$c2 = 0;
				$c3 = 0;
				$c4 = 0;
				for ($i = 0; $i < count($nilai_c1); $i++) {
					$c1 += pow($nilai_c1[$i]['nilai'], 2);
					$c2 += pow($nilai_c2[$i]['nilai'], 2);
					$c3 += pow($nilai_c3[$i]['nilai'], 2);
					$c4 += pow($nilai_c4[$i]['nilai'], 2);
				}

				$data = [[$c1, 0.30, 'K1'], [$c2, 0.30, 'K2'], [$c3, 0.25, 'K3'], [$c4, 0.15, 'K4']];
				$nilai_resaller = array();

				for ($i = 0; $i < $jml_reseller; $i++) {
					$data_resaller = array();
					$nilai_akhir = array();

					for ($j = 0; $j < 4; $j++) {
						$resal = $this->M_nilai_detail->getTotalNilai(['id_resaller' => $dataResaller[$i]['id_resaller'], 'id_kriteria' => $data[$j][2], 'tgl_penilaian' => $tgl_penilaian], 'tbl_nilai_detail');
						array_push($nilai_akhir, (((int)$resal[0]['nilai'] / sqrt($data[$j][0])) * $data[$j][1]));
					}
					array_push($data_resaller, $dataResaller[$i]['nama_resaller'], $nilai_akhir);
					array_push($nilai_resaller, $data_resaller);
					unset($data_resaller);
				}

				$data['title'] = "Data Nilai";
				$data['n_max'] = $this->M_nilai->nilai_tertinggi();
				$data['nilai'] = $this->M_nilai->tampil_data()->result();
				$data['nilai_details'] = $data_nilai;
				$data['nilai_k'] = $nilai_resaller;
				$data['nilai_detail'] = $this->M_nilai_detail->tampil_data();
				$data['resaller'] = $this->M_resaller->tampil_data()->result();

				$data['periode'] = $this->M_nilai->getPeriode();
				$data['data_periode'] = $this->M_nilai->cekNilaiPeriode();
				$data['jumlah'] = $this->M_nilai->getResellerbyPeriode($tgl_penilaian);
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/v_nilai', $data);
				$this->load->view('templates/footer');
			} else {
				$data['title'] = "Data Nilai";
				$data['n_max'] = $this->M_nilai->nilai_tertinggi();
				$data['data_periode'] = '';
				$data['nilai'] = $this->M_nilai->tampil_data()->result();
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/v_nilai', $data);
				$this->load->view('templates/footer');
			}
		} else {

			$data['title'] = "Data Nilai";
			$data['nilai_detail'] = $this->M_nilai_detail->tampil_data();
			$jml_reseller = $this->M_nilai->getResellerbyPeriode($periode);

			if ($data['nilai_detail'] != null) {
				$data_nilai = array();

				for ($i = 0; $i < $jml_reseller; $i++) {
					$nilai = array();
					array_push($nilai, $resallerr[$i]->nama_resaller);
					for ($j = 0; $j < 4; $j++) {
						array_push($nilai, ($this->M_nilai_detail->getNilai(['id_resaller' => $resallerr[$i]->id_resaller, 'tgl_penilaian' => $periode], 'tbl_nilai_detail')[$j]->nilai));
					}
					array_push($data_nilai, $nilai);
					unset($nilai);
				};

				$dataResaller = $this->M_nilai->getNilaiReseller($periode);

				$nilai_c1 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K1', 'tgl_penilaian' => $periode], 'tbl_nilai_detail');
				$nilai_c2 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K2', 'tgl_penilaian' => $periode], 'tbl_nilai_detail');
				$nilai_c3 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K3', 'tgl_penilaian' => $periode], 'tbl_nilai_detail');
				$nilai_c4 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K4', 'tgl_penilaian' => $periode], 'tbl_nilai_detail');

				$c1 = 0;
				$c2 = 0;
				$c3 = 0;
				$c4 = 0;
				for ($i = 0; $i < count($nilai_c1); $i++) {
					$c1 += pow($nilai_c1[$i]['nilai'], 2);
					$c2 += pow($nilai_c2[$i]['nilai'], 2);
					$c3 += pow($nilai_c3[$i]['nilai'], 2);
					$c4 += pow($nilai_c4[$i]['nilai'], 2);
				}

				$data = [[$c1, 0.30, 'K1'], [$c2, 0.30, 'K2'], [$c3, 0.25, 'K3'], [$c4, 0.15, 'K4']];
				$nilai_resaller = array();

				for ($i = 0; $i < $jml_reseller; $i++) {
					$data_resaller = array();
					$nilai_akhir = array();

					for ($j = 0; $j < 4; $j++) {
						$resal = $this->M_nilai_detail->getTotalNilai(['id_resaller' => $dataResaller[$i]['id_resaller'], 'id_kriteria' => $data[$j][2], 'tgl_penilaian' => $periode], 'tbl_nilai_detail');
						array_push($nilai_akhir, (((int)$resal[0]['nilai'] / sqrt($data[$j][0])) * $data[$j][1]));
					}
					array_push($data_resaller, $dataResaller[$i]['nama_resaller'], $nilai_akhir);
					array_push($nilai_resaller, $data_resaller);
					unset($data_resaller);
				}


				$data['title'] = "Data Nilai";
				$data['n_max'] = $this->M_nilai->nilai_tertinggi();
				$data['nilai'] = $this->M_nilai->tampil_data()->result();
				$data['nilai_details'] = $data_nilai;
				$data['nilai_k'] = $nilai_resaller;
				$data['nilai_detail'] = $this->M_nilai_detail->tampil_data();
				$data['resaller'] = $this->M_resaller->tampil_data()->result();

				$data['periode'] = $this->M_nilai->getPeriode();
				$data['data_periode'] = $periode;
				$data['jumlah'] = $this->M_nilai->getResellerbyPeriode($periode);
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/v_nilai', $data);
				$this->load->view('templates/footer');
			} else {
				$data['title'] = "Data Nilai";
				$data['n_max'] = $this->M_nilai->nilai_tertinggi();
				$data['data_periode'] = '';
				$data['nilai'] = $this->M_nilai->tampil_data()->result();
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidebar', $data);
				$this->load->view('admin/v_nilai', $data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function hitung()
	{
		$resaller = $this->M_resaller->tampil_data()->result();
		$periode = substr($this->M_nilai->cekNilaiPeriode(), 0, 7);
		$penjualan_sebelumnya = $this->M_penjualan->cekPenjualanTerakhir();

		$month = date('m');
		$now = date('Y-m');
		if ($month == "06" || $month == "12") {
			if ($now == $periode) {
				$this->session->set_flashdata('flashgagal', 'Data penilaian periode ini sudah ada!');
				redirect('C_nilai');
			} else {
				if ($penjualan_sebelumnya == 0) {
					$this->session->set_flashdata('flashgagal', 'Data penjulaan sebelumnya masih kosong!');
					redirect('C_nilai');
				} else {
					for ($i = 0; $i < count($resaller); $i++) {
						$where_res = array('id_resaller' => $resaller[$i]->id_resaller);
						$data_penjualan = $this->M_penjualan->cek_penjualan($where_res)->result();

						if ($data_penjualan == null) {
							$this->session->set_flashdata('flashgagal', 'Terdapat resaller yang belum memiliki data penjualan!');
							redirect('C_nilai');
						}
					}

					for ($i = 0; $i < count($resaller); $i++) {
						$tipe_barang = $this->M_penjualan->get_tipe($resaller[$i]->id_resaller);
						$total_harga = (int)$this->M_penjualan->get_total_harga($resaller[$i]->id_resaller);
						$jumlah_beli = (int)$this->M_penjualan->get_jumlah_beli($resaller[$i]->id_resaller);
						$pembayaran = $this->M_penjualan->get_pembayaran($resaller[$i]->id_resaller);

						$nilai_tipe = 0;
						$nilai_nominal = 0;
						$nilai_jumlah = 0;
						$nilai_pembayaran = 0;

						//CONDITION KRITERIA JENIS BARANG
						if ((array_search("Lokal", $tipe_barang) !== FALSE) && (array_search("Impor", $tipe_barang) !== FALSE)) {
							$nilai_tipe = 3;
						} elseif ((array_search("Lokal", $tipe_barang) !== FALSE) && (array_search("Premium", $tipe_barang) !== FALSE)) {
							$nilai_tipe = 3;
						} elseif ((array_search("Impor", $tipe_barang) !== FALSE) && (array_search("Premium", $tipe_barang) !== FALSE)) {
							$nilai_tipe = 3;
						} elseif (array_search("Impor", $tipe_barang) !== FALSE) {
							$nilai_tipe = 2;
						} elseif (array_search("Premium", $tipe_barang) !== FALSE) {
							$nilai_tipe = 4;
						} elseif (array_search("Lokal", $tipe_barang) !== FALSE) {
							$nilai_tipe = 1;
						}

						//CONDITION KRITERIA TOTAL HARGA BARANG
						if ($total_harga <= 0) {
							$nilai_nominal = 0;
						} elseif ($total_harga < 5000000) {
							$nilai_nominal = 1;
						} elseif ($total_harga >= 5000000 && $total_harga <= 9000000) {
							$nilai_nominal = 2;
						} elseif ($total_harga > 9000000) {
							$nilai_nominal = 3;
						}

						//CONDITION KRITERIA INTENSITAS PEMBELIAN
						if ($jumlah_beli <= 0) {
							$nilai_jumlah = 0;
						} elseif ($jumlah_beli < 3) {
							$nilai_jumlah = 1;
						} elseif ($jumlah_beli >= 3 && $jumlah_beli <= 5) {
							$nilai_jumlah = 2;
						} elseif ($jumlah_beli > 5) {
							$nilai_jumlah = 3;
						}

						//CONDITION KRITERIA 
						if ((array_search("Cicil", $pembayaran) !== FALSE) && (array_search("Kontan", $pembayaran) !== FALSE)) {
							$nilai_pembayaran = 2;
						} elseif (array_search("Cicil", $pembayaran) !== FALSE) {
							$nilai_pembayaran = 1;
						} elseif (array_search("Kontan", $pembayaran) !== FALSE) {
							$nilai_pembayaran = 3;
						}

						$data_nilai = array('', $nilai_tipe, $nilai_nominal, $nilai_jumlah, $nilai_pembayaran, $resaller[$i]->id_resaller);

						for ($in = 1; $in <= 4; $in++) {
							$data[$in] = [
								'id_resaller' => $resaller[$i]->id_resaller,
								'id_kriteria' => 'K' . $in,
								'nilai' => $data_nilai[$in],
								'tgl_penilaian' => date('Y-m-d')
							];
							$this->M_nilai_detail->input_nilai_detail($data[$in], 'tbl_nilai_detail');
						}
					}

					$dataResaller = $this->M_resaller->tampil_data()->result_array();

					$resaller = array();
					for ($i = 0; $i < count($dataResaller); $i++) {
						array_push($resaller, $dataResaller[$i]["id_resaller"]);
					}

					$nilai_c1 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K1', 'tgl_penilaian' => date('Y-m-d')], 'tbl_nilai_detail');
					$nilai_c2 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K2', 'tgl_penilaian' => date('Y-m-d')], 'tbl_nilai_detail');
					$nilai_c3 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K3', 'tgl_penilaian' => date('Y-m-d')], 'tbl_nilai_detail');
					$nilai_c4 = $this->M_nilai_detail->getTotalNilai(['id_kriteria' => 'K4', 'tgl_penilaian' => date('Y-m-d')], 'tbl_nilai_detail');

					$c1 = 0;
					$c2 = 0;
					$c3 = 0;
					$c4 = 0;
					for ($i = 0; $i < count($nilai_c1); $i++) {
						$c1 += pow($nilai_c1[$i]['nilai'], 2);
						$c2 += pow($nilai_c2[$i]['nilai'], 2);
						$c3 += pow($nilai_c3[$i]['nilai'], 2);
						$c4 += pow($nilai_c4[$i]['nilai'], 2);
					}

					$data = [[$c1, 0.30, 'K1'], [$c2, 0.30, 'K2'], [$c3, 0.25, 'K3'], [$c4, 0.15, 'K4']];

					$nilai_resaller = array();
					$total = 0;

					for ($i = 0; $i < count($resaller); $i++) {
						$nilai_akhir = array();
						array_push($nilai_resaller, $resaller[$i]);
						for ($j = 0; $j < 4; $j++) {
							$resal = $this->M_nilai_detail->getTotalNilai(['id_resaller' => $resaller[$i], 'id_kriteria' => $data[$j][2], 'tgl_penilaian' => date('Y-m-d')], 'tbl_nilai_detail');
							array_push($nilai_akhir, (((int)$resal[0]['nilai'] / sqrt($data[$j][0])) * $data[$j][1]));
						}
						array_push($nilai_resaller, $nilai_akhir);
						$total = $nilai_akhir[0] + $nilai_akhir[1] + $nilai_akhir[2] - $nilai_akhir[3];

						$val[$i] = [
							'id_resaller' => $resaller[$i],
							'nilai' => $total,
							'tgl_penilaian' => date('Y-m-d')
						];
						$this->M_nilai->input_resaller($val[$i], 'tbl_nilai');
						unset($nilai_akhir);
					}
					$this->session->set_flashdata('flashdata', 'Proses penilaian berhasil!');
					redirect('C_nilai');
				}
			}
		} else {
			$this->session->set_flashdata('flashgagal', 'Saat ini belum masuk periode penilaian!');
			redirect('C_nilai');
		}
	}

	public function cetak_pdf($periode)
	{

		$nilai = $this->M_nilai->tampil_data_by_periode(['tgl_penilaian' => $periode])->result();

		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Arial', 'B', '24');
		$pdf->Cell(0, 7, 'Laporan Data Penilaian', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', '16');
		$pdf->Cell(0, 7, 'Periode ' . $periode, 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', '', '14');

		$pdf->Cell(12, 10, 'No', 1, 0, 'C');
		$pdf->Cell(170, 10, 'Nama Resaller', 1, 0, 'C');
		$pdf->Cell(90, 10, 'Nilai', 1, 1, 'C');

		$no = 1;
		foreach ($nilai as $m) {
			$pdf->Cell(12, 10, $no, 1, 0, 'C');
			// $pdf->Cell(40,10,$pdf->Image('assets/gambar/'.$b->foto, $pdf->GetX()+10, $pdf->GetY()+2,15),1,0,'C');
			$pdf->Cell(170, 10, $m->nama_resaller, 1, 0, 'C');
			$pdf->Cell(90, 10, $m->nilai, 1, 1, 'C');

			$no++;
		}
		$pdf->Output();
	}

	public function hapus_nilai()
	{
		$this->M_nilai->hapus_nilai();
		$this->M_nilai_detail->hapus_nilai_detail();
		$this->session->set_flashdata('flashdata', 'Data Nilai berhasil dihapus!');
		redirect('C_nilai');
	}
}
