<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Perhitungan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?= base_url('C_nilai/simpan_nilai') ?>">
                <div class="card-body">
                  <div class="form-group row">
                      <label for="inputnilai" class="col-sm-2 col-form-label">Nama Resaller</label>
                      <div class="col-sm-10">
                        <select name="id_resaller" class="form-control">
                            <option value="">--Pilih Nama Resaller--</option>
                          <?php foreach($resaller as $r): ?>
                            <option id="id_resaller" value="<?= $r->id_resaller ?>"><?= $r->nama_resaller ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-danger">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
</section>