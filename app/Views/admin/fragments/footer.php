 <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; <script> document.write( new Date().getFullYear()) </script> <a href="#" class="text-bold-800 grey darken-2">Smart Tech. </a> All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block"></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url('public/users/app-assets/js/core/libraries/jquery.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/tether.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/js/core/libraries/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/unison.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/blockUI.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/jquery.matchHeight-min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/ui/screenfull.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/vendors/js/extensions/pace.min.js') ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- J query -->
    
    <!-- dropzone -->
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.js"></script>
    <!-- sweet alert -->
    <!-- <script src="cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
    <!-- data table -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?= base_url('public/users/app-assets/vendors/js/charts/chart.min.js') ?>" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?= base_url('public/users/app-assets/js/core/app-menu.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('public/users/app-assets/js/core/app.js') ?>" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?= base_url('public/users/app-assets/js/scripts/pages/dashboard-lite.js') ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    
    <!-- tildo chat bot -->
    <!-- <script src="//code.tidio.co/5x3dszhsd0sxytxsqhlrauiotrhdfcw2.js" async></script> -->
  <!-- script -->
    <script>
      // $(document).ready(function(){
      //       setTimeout(() => {
      //           $('.error-message').hide();
      //           $('.success-message').hide();
      //       }, 9000);
      //   })
        $(document).ready( function () {
          // alert messages
            setTimeout(() => {
                $('.error-message').hide();
                $('.success-message').hide();
            }, 9000);

            // data table
            $('.dataTable').DataTable();
        })
    </script>
  </body>
</html>
