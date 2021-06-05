<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Account Verification</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Verify Account</a>
                </li>
                <!-- <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                </li> -->
              </ol>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- stats -->
            <div class="row">
            <div class="card-text">
                <p class='pl-2'>Upload a valid ID card to verify your account e.g International Passport, Driver's License etc</p>
            </div>
             <?php if ($user->account_status == 'pending'): ?>
                <div class="illus" style="text-align: center;"><img src="<?= base_url('public/users/design/pending.svg') ?>" alt="pending" srcset="" style="width:30%;">
                <p class="mt-1">Your account verification process is pending. We'll inform you once we are done</p>
            </div>
            <?php else: ?>
                <!-- dropzone -->
                <div class="dropzone dz-clickable" id="myDrop">
                    <div class="dz-message needsclick">    
                        <h2>Drag and Drop document here or click to upload</h2><br>
                        <span class="note needsclick">(Only <strong>valid</strong> document will be approved. Ensure you upload a clear copy)</span>
                    </div>
                </div>    
            <!-- drop zone ends  -->
            <?php endif ?>
        </div>
        <!--/ stats -->
        </div>
      </div>
    </div>
   


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
    <!-- dropzone -->
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.min.js"></script>
    <!-- sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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


    <!-- custom -->
    <style>
        .dropzone{
            border-style: dotted !important;
            border-radius: 2em !important; 
        }
    </style>
    <script>
    //Dropzone Configuration
    Dropzone.autoDiscover = false;
    $(document).ready(function(){
        $("div#myDrop").dropzone({
            paramName: "document",
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.docx,.svg",
            maxFiles: 10,
            url: "<?= base_url('users/verify') ?>",
            success: function(file, response){
                var res = JSON.parse(response);
                // console.log(res);
                // console.log(res.status);
                if(res.status = 'success'){                    
                    // window.location = res.redirect;
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Document successfully submitted. Your account is under review',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please retry process',
                        // footer: '<a href>Why do I have this issue?</a>'
                    });
                    location.reload();
                }
            }      
        });
    });
    </script>
  </body>
</html>
