<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Edit Data Resaller</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="<?= base_url('C_resaller/update_resaller') ?>">
                <div class="card-body">
                  <?php foreach($edit as $e): ?>
                    <input type="hidden" name="id_resaller" value="<?= $e->id_resaller ?>">
                  <div class="form-group row">
                    <label for="inputresaller" class="col-sm-2 col-form-label">Nama Resaller</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_resaller" id="inputresaller" value="<?= $e->nama_resaller ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputresaller" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputresaller" value="<?= $e->email ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputresaller" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea name="alamat" class="form-control" id="inputresaller" placeholder="Alamat Resaller" required><?= $e->alamat ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputresaller" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                      <input type="text" name="no_hp" class="form-control" id="inputresaller" value="<?= $e->no_hp ?>">
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-danger">Update</button>
                  <a href="<?= base_url('C_resaller') ?>"><button type="button" class="btn btn-outline-secondary">Batal</button></a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
</div>
</section>