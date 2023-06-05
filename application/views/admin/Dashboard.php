    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Penjualan</span>
                <span class="info-box-number">
                  <a href="<?= base_url('C_penjualan') ?>"><?= $jumlah_penjualan ?></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Resaller</span>
                <span class="info-box-number"><a href="<?= base_url('C_resaller') ?>"><?= $jumlah_resaller ?></a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list" style="color: white;"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Kriteria</span>
                <span class="info-box-number"><a href="<?= base_url('C_kriteria') ?>"><?= $jumlah_kriteria ?></a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  