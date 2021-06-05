<?= view('admin/fragments/head') ?>
<?= view('admin/fragments/header') ?>
<?= view('admin/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Pending Deposit</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pending Deposit</a>
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
                            <h4 class="card-title">Pending Deposit</h4>
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
                                <p>You can accept or decline pending deposit to reflect in user transaction history</p>
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
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>View Receipt</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; foreach($pendingDeposit as $row): $i++ ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $i ?>
                                                </th>
                                                <td><?= $row->email ?></td>
                                                <td>$ <?= $row->amount ?></td>
                                                <td> <?= $row->method ?> </td>
                                                <td>
                                                    <a href="<?= $row->snapshot ?>" target="_blank">     
                                                        <button type="button" class="btn btn-primary btn-sm">View Payment Receipt</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-userId="<?= $row->invested_id ?>" onclick="approveDeposit('<?= $row->invested_id ?>')" id="accept">Accept</button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-userId="<?= $row->invested_id ?>" onclick="declineDeposit('<?= $row->invested_id ?>')" id="decline">Decline</button>
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
        // $(document).ready(function(){
            function approveDeposit(investedId){
                // var investedId = $(this).attr('data-userId');
                var url = '<?= base_url('admin/approveDeposit') ?>'
                // console.log(investedId);        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "User Deposit will be approved!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, approve it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        type: 'POST',
                        url: url,
                        data: {investedId},
                        success: function(data) {
                            Swal.fire(
                            'Deleted!',
                            'User Deposit has been verified.',
                            'success'
                            );
                            location.reload();
                        },
                        
                        dataType: 'html'
                    });
                        
                    }
                })
            }

            // decline account
            function declineDeposit(investedId){
                // var investedId = $(this).attr('data-userId');
                var url = '<?= base_url('admin/declineWithdrawal') ?>'
                // console.log(investedId);        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "User Deposit will be declined!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, decline it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        type: 'POST',
                        url: url,
                        data: {investedId},
                        success: function(data) {
                            Swal.fire(
                            'Deleted!',
                            'User Deposit has been declined.',
                            'success'
                            );
                            location.reload();
                        },
                        
                        dataType: 'html'
                    });
                        // Swal.fire(
                        // 'Deleted!',
                        // 'User has been deleted.',
                        // 'success'
                        // )
                    }
                })
            }
        //})
    </script>

 <?= view('admin/fragments/footer') ?>
