<section class="content">
  
  <?php if($this->session->flashdata('flashdata')) : ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashdata'); ?>"></div>
      <div class="flash-gagal" data-flashgagal="<?= $this->session->flashdata('flashgagal'); ?>"></div>
  <?php endif; ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Nilai</h3><br>
                <a href="<?= base_url('C_nilai/tambah_nilai') ?>" class="btn btn-dark mt-2">Tambah Perhitungan</a>
                <a href="<?= base_url('C_nilai/cetak_pdf') ?>" class="btn btn-dark mt-2">Cetak Data nilai</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th>NO</th>
                      <th>Nama Resaller</th>
                      <th>Nilai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                    foreach($nilai as $k){
                      ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $k->nama_resaller ?></td>
                        <td><?= $k->nilai ?></td>
                        <td class="text-center"><a href="<?= base_url("C_nilai/hapus_nilai/$k->id_nilai"); ?>" class="btn-delete"><i class="fas fa-trash"></i></a>
                            <a href="<?= base_url("C_nilai/edit_nilai/$k->id_nilai"); ?>" class="text-primary mx-2"><i class="fa fa-edit"></i></a></td>
                    </tr>
                <?php } ?> </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix bg-dark">
              </div>
            </div>
        </div>
    </div>
</div>
</section>