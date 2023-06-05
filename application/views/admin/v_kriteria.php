<section class="content">

  <?php if ($this->session->flashdata('flashdata')) : ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashdata'); ?>"></div>
    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
  <?php endif; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold">Data Kriteria</h3><br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Kode Kriteria</th>
                  <th>Nama Kriteria</th>
                  <th>Jenis Kriteria</th>
                  <th>Bobot</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($kriteria as $k) {
                ?>
                  <tr>
                    <td><?= $k->id_kriteria ?></td>
                    <td><?= $k->nama_kriteria ?></td>
                    <td><?= $k->jenis_kriteria ?></td>
                    <td><?= $k->bobot ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix bg-warning">
          </div>
        </div>
      </div>
    </div>

     <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold">Data Subkriteria</h3><br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>K1 (Jenis Barang)</th>
                  <th>K2 (Nominal Uang)</th>
                  <th>K3 (Intensitas Belanja)</th>
                  <th>K4 (Toleransi Pembayaran)</th>
                  <!-- <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>Lokal</td>
                    <td>< 5.000.000</td>
                    <td>< 3</td>
                    <td>Full Cicil</td>
                  </tr>
                  <tr>
                    <td>Import</td>
                    <td>5.000.000 s.d 9.000.000</td>
                    <td>3 s.d 5</td>
                    <td>Cicil & Kontan</td>
                  </tr>
                  <tr>
                    <td>Campur</td>
                    <td>> 9.000.000</td>
                    <td>> 5</td>
                    <td>Full Kontan</td>
                  </tr>
                  <tr>
                    <td>Premium</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix bg-warning">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>