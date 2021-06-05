<?= view('admin/fragments/head') ?>
<?= view('admin/fragments/header') ?>
<?= view('admin/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Deactivated Account</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Deactivated Account</a>
                </li>
                <!-- <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                </li> -->
              </ol>
            </div>
          </div>
        </div>

        <!-- content -->
        <div class="content-body"><!-- stats -->
            <!-- Contextual classes start -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Deactivated Account</h4>
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
                            <div class="card-block card-dashboard">
                                <p>Users can be re-activated</p>
                                <!-- flash messages -->
                                <?= view('flashMessages') ?>
                                <!-- flash messages end -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped dataTable">
                                        <colgroup>
                                            <col class="col-xs-1">
                                            <col class="col-xs-7">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; foreach($deactivatedAcct as $row): $i++ ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $i ?>
                                                </th>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->firstname ?> <?= $row->lastname ?></td>
                                                <td> <?= $row->phone ?> </td>
                                                <td> <?= $row->country ?> </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-userId="<?= $row->uuid ?>" onclick="activate('<?= $row->uuid ?>')" id="activate">Activate</button>
                                                </td>                                             
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contextual classes end -->
        </div>
      </div>
    </div>
   


 <!-- ////////////////////////////////////////////////////////////////////////////-->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function activate(userId){
            // var userId = $(this).attr('data-userId');
            var url = '<?= base_url('admin/activateAcct') ?>'
            console.log(userId);        
            Swal.fire({
                title: 'Are you sure?',
                text: "User Account will be activated!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, activate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    type: 'POST',
                    url: url,
                    data: {userId},
                    success: function(data) {
                        Swal.fire(
                        'Deleted!',
                        'User Account has been activated.',
                        'success'
                        );
                        location.reload();
                    },
                    
                    dataType: 'html'
                });
                    
                }
            })
        }
    </script>

 <?= view('admin/fragments/footer') ?>
