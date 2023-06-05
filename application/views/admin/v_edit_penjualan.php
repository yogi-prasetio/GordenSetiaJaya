<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Data Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?= base_url('C_penjualan/update_penjualan') ?>">
                <div class="card-body">
                  <?php foreach($edit as $e): ?>
                    <input type="hidden" name="id_penjualan" value="<?= $e->id_penjualan ?>">
                  <div class="form-group row">
                      <label for="inputpenjualan" class="col-sm-2 col-form-label">Nama Resaller</label>
                      <div class="col-sm-10">
                        <select name="id_resaller" class="form-control">
                            <option value="">--Pilih Nama Resaller--</option>
                          <?php foreach($resaller as $r): ?>
                            <option id="id_resaller" value="<?= $r->id_resaller ?>" <?php if($e->id_resaller == $r->id_resaller){ ?> selected <?php } ?>><?= $r->nama_resaller ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputpenjualan" class="col-sm-2 col-form-label">Tipe Barang</label>
                      <div class="col-sm-10">
                        <select name="tipe" class="form-control">
                            <option value="">--Pilih Tipe Barang--</option>
                            <option id="Lokal" value="Lokal" <?php if($e->tipe == "Lokal"){ ?> selected <?php } ?>>Lokal</option>
                            <option id="Import" value="Import" <?php if($e->tipe == "Impor"){ ?> selected <?php } ?>>Import</option>
                            <option id="Premium" value="Premium" <?php if($e->tipe == "Premium"){ ?> selected <?php } ?>>Premium</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" name="tgl_penjualan" class="form-control" id="inputpenjualan" value="<?= $e->tgl_penjualan ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Banyak</label>
                    <div class="col-sm-10">
                      <input type="number" name="banyak" class="form-control" id="inputpenjualan" value="<?= $e->banyak ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                      <input type="number" name="total_harga" class="form-control" id="inputpenjualan" value="<?= $e->total_harga ?>">
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-sucsess">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
</section>