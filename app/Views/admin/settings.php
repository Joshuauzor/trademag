<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Master Settings</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Master Settings</a>
                </li>
                <!-- <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                </li> -->
              </ol>
            </div>
          </div>
        </div>

        <!-- content -->
        <div class="content-body"><!-- stats -->
            <div class="row">
            <section id="basic-form-layouts">
                <div class="row match-height">
                    
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">Master Settings</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">

                                    <div class="card-text">
                                        <p>Set up your master settings.</p>
                                    </div>

                                    <form class="form" method="post" action="#" id="master">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="icon-eye6"></i> Master Settings</h4>
                                            <div class="row">
                                                <div class="form-group">
                                                    <!-- flash messages -->
                                                    <?= view('flashMessages') ?>
                                                    <!-- flash messages end -->
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userinput1">Bitcoin wallet ID</label>
                                                        <input type="text" id="userinput1" class="form-control border-primary" value="<?= $currentData->btc_id ?>" placeholder="Bitcoin wallet ID" name="btc_wallet">
                                                    </div>
                                                </div>
                            
                                            </div>
                                        </div>
                                       <div class="form-actions right">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="icon-cross2"></i> Cancel
                                            </button>
                                            <button type="submit" id="submit" class="btn btn-primary">
                                                <i class="icon-check2"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>
      </div>
    </div>
   


 <!-- ////////////////////////////////////////////////////////////////////////////-->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  

 <script>
 
    $(document).ready(function(){
        $('#master').on('submit', function(e){
            e.preventDefault();
            var formValues = $(this).serialize();
            $('#submit').attr('disabled', true);
            $('#submit').html('Please wait..');
            var url = '<?= base_url('admin/settingsPost') ?>'
            $.ajax({
                type: 'POST',
                url: url,
                // dataType: 'json',
                data: formValues,
                success: function(response) {
                    $('#submit').attr('disabled', false);
                    $('#submit').html('Save');
                    Swal.fire(
                    'Saved!',
                    'Settings has been updated!',
                    'success'
                    );
                    location.reload();
                },               
            });
        })
    })

 </script>


 <?= view('users/fragments/footer') ?>
