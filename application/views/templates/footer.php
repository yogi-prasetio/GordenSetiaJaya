</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->



<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2023 <a href="#">Toko Gorden Setia Jaya</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard2.js"></script> -->
<script src="<?= base_url() ?>/assets/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  $(document).ready(function() {
    $('.tabel-data').DataTable();
  });
</script>
<script>
  $(document).ready(function() {
    $('.tabel-nilai').DataTable({
        order: [
          [6, 'desc']
        ],
      })
      .columns.adjust()
      .responsive.recalc()
      .scroller.measure()
      .columns.adjust();;
  });
</script>

<script type="text/javascript">
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
    return true;
  }
</script>

<script type="text/javascript">
  var flashdata = $('.flash-data').data('flashdata');
  //console.log(flashdata);
  if (flashdata) {
    Swal.fire({
      icon: 'success',
      type: 'success',
      title: 'Sukses',
      text: '' + flashdata
    })
  }

  var flashgagal = $('.flash-gagal').data('flashgagal');
  //console.log(flashdata);
  if (flashgagal) {
    Swal.fire({
      icon: 'error',
      type: 'error',
      title: 'Gagal',
      text: '' + flashgagal
    })
  }


  $('.btn-delete').on('click', function(e) {
    const href = $(this).attr('href');
    e.preventDefault()

    Swal.fire({
      title: 'Hapus Data',
      text: "Apakah Anda yakin akan menghapus data?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
  })
</script>

</body>

</html>