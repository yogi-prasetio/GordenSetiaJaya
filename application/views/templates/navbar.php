<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gorden Setia Jaya</title>

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url(); ?>assets/dist/img/logo_gsj.jpg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/DataTables/jquery.dataTables.css">
  
</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?php
            if($this->session->userdata('status') !== 'login') {
              redirect('C_login');
            }

            $id = $this->session->userdata('id_user');
            $user = $this->db->get_where('tbl_user', ['id_user' => $id])->result();
            foreach ($user as $val) {
              ?>

              <span><?= $val->nama_user;
            } ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

            <a href="<?= base_url('C_login/logout') ?>" class="dropdown-item">Logout <i class="float-right mt-1 fas fa-sign-out-alt"></i></a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->