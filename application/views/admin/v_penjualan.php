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
                 <?php $id = $this->session->userdata('id_user');
                                $user = $this->db->get_where('tbl_user', ['id_user'=>$id])->result();
                                foreach ($user as $val) { ?>
         
                <?php if($val->role == "Admin"){ ?>
                <a href="<?= base_url('C_penjualan/tambah_penjualan') ?>" class="btn btn-success mt-2">Tambah penjualan</a>
                <a href="<?= base_url('C_penjualan/cetak_pdf') ?>" class="btn btn-success mt-2">Cetak Data Penjualan</a>
                <?php }else{ ?>
                  <a href="<?= base_url('C_penjualan/cetak_pdf') ?>" class="btn btn-success mt-2">Cetak Data Penjualan</a>
                <?php }} ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered tabel-data">
                  <thead>
                    <tr class="text-center">
                      <th>NO</th>
                      <th>Tanggal</th>
                      <th>Nama Resaller</th>
                      <th>Type</th>
                      <th>Jenis Pembayaran</th>
                      <th>Banyak</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                    foreach($penjualan as $k){
                      ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $k->tgl_penjualan ?></td>
                        <td><?= $k->nama_resaller ?></td>
                        <td><?= $k->tipe ?></td>
                        <td><?= $k->pembayaran ?></td>
                        <td><?= $k->banyak ?></td>
                        <td><?= $k->total_harga ?></td>
                    </tr>
                <?php } ?> </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix bg-success">
              </div>
            </div>
        </div>
    </div>
</div>
</section>