<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_resaller');
		$this->load->model('M_kriteria');
		$this->load->model('M_penjualan');
	}

	public function index()
	{
		$data = [
			'title' => "Dashboard",
			'jumlah_penjualan' => $this->M_penjualan->hitung_penjualan(),
			'jumlah_kriteria' => $this->M_kriteria->hitung_kriteria(),
			'jumlah_resaller' => $this->M_resaller->hitung_resaller()
		];
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/Dashboard', $data);
		$this->load->view('templates/footer');
	}
}
