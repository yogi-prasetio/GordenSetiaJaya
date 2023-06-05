<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?= base_url('C_penjualan/simpan_penjualan') ?>">
                <div class="card-body">
                  <div class="form-group row">
                      <label for="inputpenjualan" class="col-sm-2 col-form-label">Nama Resaller</label>
                      <div class="col-sm-10">
                        <select name="id_resaller" class="form-control">
                            <option value="">--Pilih Nama Resaller--</option>
                          <?php foreach($resaller as $r): ?>
                            <option id="id_resaller" value="<?= $r->id_resaller ?>"><?= $r->nama_resaller ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputpenjualan" class="col-sm-2 col-form-label">Tipe Barang</label>
                      <div class="col-sm-10">
                        <select name="tipe" class="form-control">
                            <option value="">--Pilih Tipe Barang--</option>
                            <option id="Lokal" value="Lokal">Lokal</option>
                            <option id="Import" value="Impor">Impor</option>
                            <option id="Premium" value="Premium">Premium</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                      <input type="date" name="tgl_penjualan" class="form-control" id="inputpenjualan" placeholder="Tanggal Penjualan" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Banyak</label>
                    <div class="col-sm-10">
                      <input type="number" name="banyak" class="form-control" id="inputpenjualan" placeholder="Banyak Barang" onkeypress="return hanyaAngka(event)" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputpenjualan" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                      <input type="number" name="total_harga" class="form-control" id="inputpenjualan" placeholder="Total Harga" onkeypress="return hanyaAngka(event)" required>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputpenjualan" class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                      <div class="col-sm-10">
                        <select name="jenis" class="form-control">
                            <option value="">--Pilih Jenis Pembayaran--</option>
                            <option id="Cicil" value="Cicil">Cicil</option>
                            <option id="Kontan" value="Kontan">Kontan</option>
                        </select>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Simpan</button>
                  <a href="<?= base_url('C_penjualan') ?>"><button type="button" class="btn btn-secondary">Batal</button></a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
</section>