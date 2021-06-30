<footer class="main-footer px-5">
    <div class="row">
      <p>
        <strong>Copyright &copy; <?=date('Y')?>.</strong>
        All rights reserved.
      </p>
      <p class="ml-auto d-none">Powered by: <a href="http://digikraftsocial.com" class="text-bold" target=_blank>DigiKraft Social</a></p>
    </div>
</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>

  //  Sweet alert for normal response
    var base_url = '<?=base_url()?>';
      $(document).ready(function(){
          const Toast = Swal.mixin({
              toast: true,
              position: 'top',
              showConfirmButton: false,
              timer: 3000
          });

          <?php if($this->session->flashdata('success') || $message = $this->session->flashdata('failed')):
              $class = $this->session->flashdata('success') ? 'success' : 'error';
          ?>
              
              Toast.fire({
                  icon: '<?=$class?>',
                  title: '<?= $this->session->flashdata('success'); ?>
                          <?= $this->session->flashdata('failed'); ?>'
              });
          <?php 
              endif;
          ?>
      });


  //  Sweet alert for delete
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href'); 

        Swal.fire({
          title: 'Are you sure?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            window.location = urlToRedirect;
          }
        })

  }
    
</script>

<!-- Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

</body>
</html>
