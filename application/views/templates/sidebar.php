
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url(); ?>" class="brand-link">
    <img src="<?= base_url(); ?>assets/dist/img/logo_gsj.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Gorden Setia Jaya</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
         <?php $id = $this->session->userdata('id_user');
         $user = $this->db->get_where('tbl_user', ['id_user' => $id])->result();
         foreach ($user as $val) { ?>

          <?php if ($val->role == "Admin") { ?>
            <li class="nav-item">
              <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if($this->uri->segment(1)=="Dashboard"){echo "active";} ?> ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('C_resaller') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_resaller"){echo "active";} ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Resaller
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('C_penjualan') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_penjualan"){echo "active";} ?>">
                <i class="nav-icon fas fa-money-check"></i>
                <p>
                  Data Penjualan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('C_kriteria') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_kriteria"){echo "active";} ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Data Kriteria
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('C_nilai') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_nilai"){echo "active";} ?>">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  Data Penilaian
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $title ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

    <?php } else { ?>
      <li class="nav-item">
        <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if($this->uri->segment(1)=="Dashboard"){echo "active";} ?> ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('C_penjualan') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_penjualan"){echo "active";} ?>">
          <i class="nav-icon fas fa-money-check"></i>
          <p>
            Data Penjualan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('C_nilai') ?>" class="nav-link <?php if($this->uri->segment(1)=="C_nilai"){echo "active";} ?> ">
          <i class="nav-icon fas fa-chart-bar"></i>
          <p>
            Data Penilaian
          </p>
        </a>
      </li>
    </ul>
  </li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

<?php }
} ?>