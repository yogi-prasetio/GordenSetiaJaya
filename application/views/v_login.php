<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In || Gorden Setia Jaya</title>

  <!-- Favicon -->
  <link rel="icon" href="<?= base_url(); ?>assets/dist/img/logo_gsj.jpg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <?php if($this->session->flashdata('flashgagal')) : ?>
        <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
      <?php endif; ?>
      <div class="card-header text-center">
        <h3>Selamat Datang</h3>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Login</p>

        <form action="<?= base_url('C_login/aksi_login'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row m-1">
            <!-- /.col -->            
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <!-- /.col -->
          </div>
        </form>

      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript">
  var flashgagal = $('.flash-gagal').data('flashgagal');
  //console.log(flashdata);
  if (flashgagal) {
    Swal.fire({
      icon: 'error',
      type: 'error',
      title: 'Gagal',
      text: '' + flashgagal
    })
  }
</script>
</body>
</html>
