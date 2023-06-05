<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->M_login->cek_login($username, $password);

        if ($result) {
            $data = array(
                'id_user' => $result->id_user,
                'nama_user' => $result->nama_user,
                'alamat' => $result->alamat,
                'username' => $result->username,
                'password' => $result->password,
                'role' => $result->role,
                'status' => 'login'
            );
            $this->session->set_userdata($data);
            redirect(base_url("Dashboard"));
        } else {
            $this->session->set_flashdata('flashgagal', 'Username atau password salah!');
            redirect("C_login");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('C_login'));
    }
}
