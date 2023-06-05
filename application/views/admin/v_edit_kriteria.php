<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kriteria</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?= base_url('C_kriteria/update_kriteria') ?>">
              <?php foreach($edit as $e): ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputkriteria" class="col-sm-2 col-form-label">Kode Kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id_kriteria" value="<?= $e->id_kriteria ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputkriteria" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kriteria" id="inputkriteria" value="<?= $e->nama_kriteria ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputjenis" class="col-sm-2 col-form-label">Jenis Kriteria</label>
                    <div class="col-sm-10 custom-control custom-radio mt-2 form-check">
                        <input class="form-check-input" type="radio" id="customRadio1" name="jenis_kriteria" value="Benefit" <?php if($e->jenis_kriteria == "Benefit"){ ?> checked <?php } ?>>
                          <label for="customRadio1" class="form-check-label mr-5">Benefit</label>
                        <input class="form-check-input" type="radio" id="customRadio2" name="jenis_kriteria" value="Cost" <?php if($e->jenis_kriteria == "Cost"){ ?> checked <?php } ?>>
                          <label for="customRadio2" class="form-check-label">Cost</label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputkriteria" class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-10">
                      <input type="text" name="bobot" class="form-control" id="inputkriteria" value="<?= $e->bobot ?>">
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
</section>