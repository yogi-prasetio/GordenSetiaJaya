<section class="content">

  <?php if ($this->session->flashdata('flashdata')) : ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashdata'); ?>"></div>
  <?php endif;
  if ($this->session->flashdata('flashgagal')) : ?>
    <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
  <?php endif; ?>

  <div class="container-fluid">
    <div class="row m-1">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-md-8">
                <form method="POST" action="<?= base_url('C_nilai'); ?>">
                  <select class="form-control" name="periode" onchange="this.form.submit();">
                    <option selected disabled value="">--Pilih Periode--</option>
                    <?php foreach ($periode as $pe) : ?>
                      <option id="periode" value="<?= $pe->tgl_penilaian ?>" <?php if ($data_periode == $pe->tgl_penilaian) echo 'selected'; ?>><?= $pe->tgl_penilaian ?></option>
                    <?php endforeach ?>
                  </select>
                </form>
              </div>
              <?php if ($this->session->userdata("role") == "Admin") { ?>
                <div class="col-md-2">
                  <a href="<?= base_url("C_nilai/cetak_pdf/$data_periode") ?>" class="btn btn-warning text-white form-control <?php if ($nilai == NULL) echo 'disabled'; ?>">
                    <i class="fas fa-print"></i> Cetak Data Nilai</a>
                </div>
                <div class="col-md-2">
                  <a href="<?= base_url('C_nilai/hitung') ?>" class="btn btn-success form-control">
                    <i class="fas fa-calculator"></i> Hitung Nilai</a>
                </div>
            </div>
          </div>
          <div class="card-footer clearfix bg-primary">
            Proses penilaian hanya bisa dilakukan di bulan <b>Juni</b> dan <b>Desember</b>!
          </div>
        <?php } else { ?>
          <div class="col-md-4">
            <a href="<?= base_url("C_nilai/cetak_pdf/$data_periode") ?>" class="btn btn-warning text-white form-control <?php if ($nilai == NULL) echo 'disabled'; ?>">
              <i class="fas fa-print"></i> Cetak Data Nilai</a>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table <?php if ($nilai != null) {
                      echo "class='table table-bordered tabel-nilai'";
                    } else {
                      echo "class='table table-bordered'";
                    } ?>>
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>Nama Resaller</th>
                  <th>C1</th>
                  <th>C2</th>
                  <th>C3</th>
                  <th>C4</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($nilai == null) {
                  echo "<tr class='text-center'><td colspan='7'>Data masih kosong!</td></tr>";
                } else {
                  $no = 1;
                  // echo count($nilai_k);
                  // die();
                  for ($i = 0; $i < count($nilai_k); $i++) {
                ?>
                    <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td><?= $nilai_k[$i][0] ?></td>
                      <td><?= $nilai_k[$i][1][0] ?></td>
                      <td><?= $nilai_k[$i][1][1] ?></td>
                      <td><?= $nilai_k[$i][1][2] ?></td>
                      <td><?= $nilai_k[$i][1][3] ?></td>
                      <td><?= $nilai_k[$i][1][0] + $nilai_k[$i][1][1] + $nilai_k[$i][1][2] - $nilai_k[$i][1][3] ?></td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix bg-primary">
            <?php if ($n_max != Null) { ?><span>Nilai Tertinggi Didapatkan Oleh <b><?= $n_max->nama_resaller ?></b>
                dengan Nilai <b><?= $n_max->nilai ?></b> Sehingga Terpilih Sebagai Reseller Terbaik Periode Bulan
                <b><?= date('F Y', strtotime($data_periode)) ?></b></span>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title text-bold">Detail Nilai</h3><br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table <?php if ($nilai_detail != null) {
                      echo "class='table table-bordered tabel-data'";
                    } else {
                      echo "class='table table-bordered'";
                    } ?>>
              <thead>
                <tr class="text-center">
                  <th>Nama Resaller</th>
                  <th>C1 (Jenis Barang)</th>
                  <th>C2 (Nominal Uang)</th>
                  <th>C3 (Intensitas Belanja)</th>
                  <th>C4 (Toleransi Pembayaran)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($nilai_detail == null) {
                  echo "<tr class='text-center'><td colspan='5'>Data masih kosong!</td></tr>";
                } else {
                  for ($i = 0; $i < $jumlah; $i++) {
                ?>
                    <tr class="text-center">
                      <td><?= $nilai_details[$i][0] ?></td>
                      <td><?php if ($nilai_details[$i][1] == 1) {
                            echo "Lokal";
                          } elseif ($nilai_details[$i][1] == 2) {
                            echo "Import";
                          } elseif ($nilai_details[$i][1] == 3) {
                            echo "Campur";
                          } elseif ($nilai_details[$i][1] == 4) {
                            echo "Premium";
                          }  ?></td>
                      <td><?php if ($nilai_details[$i][2] == 1) {
                            echo "Kurang";
                          } elseif ($nilai_details[$i][2] == 2) {
                            echo "Cukup";
                          } elseif ($nilai_details[$i][2] == 3) {
                            echo "Baik";
                          }  ?></td>
                      <td><?php if ($nilai_details[$i][3] == 1) {
                            echo "Kurang";
                          } elseif ($nilai_details[$i][3] == 2) {
                            echo "Cukup";
                          } elseif ($nilai_details[$i][3] == 3) {
                            echo "Baik";
                          }  ?></td>
                      <td><?php if ($nilai_details[$i][4] == 1) {
                            echo "Full Cicil";
                          } elseif ($nilai_details[$i][4] == 2) {
                            echo "Cicil & Kontan";
                          } elseif ($nilai_details[$i][4] == 3) {
                            echo "Full Kontan";
                          }  ?></td>
                    </tr>
                <?php }
                }  ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix bg-primary">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>