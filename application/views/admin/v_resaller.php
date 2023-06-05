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
                <a href="<?= base_url('C_resaller/tambah_resaller') ?>" class="btn btn-danger mt-2">Tambah resaller</a>
                <a href="<?= base_url('C_resaller/cetak_pdf') ?>" class="btn btn-danger mt-2">Cetak Resaller</a>
                <?php }else{ ?>
                  <a href="<?= base_url('C_resaller/cetak_pdf') ?>" class="btn btn-danger mt-2">Cetak Resaller</a>
                <?php }} ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered tabel-data">
                  <thead>
                    <tr align="center">
                      <th>NO</th>
                      <th>Nama resaller</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Nomor HP</th>

                          <?php $id = $this->session->userdata('id_user');
                          $user = $this->db->get_where('tbl_user', ['id_user'=>$id])->result();
                          foreach ($user as $val) { ?>
                          <?php if($val->role == "Admin"){ ?>
                      <th>Aksi</th>
                      <?php }else{ }} ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                    foreach($resaller as $k){
                      ?>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $k->nama_resaller ?></td>
                        <td><?= $k->email ?></td>
                        <td><?= $k->alamat ?></td>
                        <td><?= $k->no_hp ?></td>
                            <?php $id = $this->session->userdata('id_user');
                            $user = $this->db->get_where('tbl_user', ['id_user'=>$id])->result();
                            foreach ($user as $val) { ?>
                            <?php if($val->role == "Admin"){ ?>
                        <td class="text-center">
                          <a href="<?= base_url("C_resaller/edit_resaller/$k->id_resaller"); ?>" ><i class="fa fa-edit" style="color: green;"></i></a>
                          <a href="<?= base_url("C_resaller/detail_resaller/$k->id_resaller"); ?>" ><i class="fas fa-info-circle"></i></a>
                        </td>
                            <?php }else{ }} ?>
                    </tr>
                <?php } ?> </tbody>
                </table>
                </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix bg-danger">
              </div>
            </div>
        </div>
    </div>
</div>
</section>