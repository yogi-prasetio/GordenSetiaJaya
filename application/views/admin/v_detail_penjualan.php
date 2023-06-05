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
            <h3 class="card-title">Detail Resaller</h3><br>
            <?php $id = $this->session->userdata('id_user');
            $user = $this->db->get_where('tbl_user', ['id_user'=>$id])->result();
            foreach ($user as $val) { ?>

              <?php if($val->role == "Admin"){ ?>
              <?php }} ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
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
                  foreach($detail as $k){
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
                    <?php } 
                      if($detail == null){
                        echo "<tr class='text-center'><td colspan='7'>Data masih kosong!</td></tr>";
                      }
                    ?> </tbody>
                  </table>
                  <p><?= $this->pagination->create_links() ?></p>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix bg-success">
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>