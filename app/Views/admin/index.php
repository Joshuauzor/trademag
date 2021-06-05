<?= view('admin/fragments/head') ?>
<?= view('admin/fragments/header') ?>
<?= view('admin/fragments/navigation') ?>
   

<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="pink"> <?= count($users) ?></h3>
                                    <span>Users</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-ios-people pink font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="teal"><?= count($admins) ?></h3>
                                    <span>Admin</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-ios-people teal font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="deep-orange"><?= count($pendingAcct) ?></h3>
                                    <span>Pending Account</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-ios-help-outline deep-orange font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <div class="media">
                                <div class="media-body text-xs-left">
                                    <h3 class="cyan"><?= count($pendingDeposit) ?></h3>
                                    <span>Pending Deposit</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-checkmark-circled cyan font-large-2 float-xs-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ stats -->

        <!-- Recent invoice with Statistics -->
        <div class="row match-height">
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-deep-orange media-left media-middle">
                                <i class="icon-cash font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5 class="deep-orange">Pending Withdrawal</h5>
                                <h5 class="text-bold-400"><?= count($pendingWithdrawal) ?></h3></h5>
                                <progress class="progress progress-sm progress-deep-orange mt-1 mb-0" value="45" max="100"></progress>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-cyan media-left media-middle">
                                <i class="icon-android-cancel font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5>Disabled Account</h5>
                                <h5 class="text-bold-400">0</h3></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-teal media-left media-middle">
                                <i class="icon-ios-people font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5>Subcription Plan</h5>
                                <h5 class="text-bold-400"><?= count($plans) ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 media-body text-xs-left">
                                <h5>Total Connection</h5>
                                <h5 class="text-bold-400">39,226</h5>
                            </div>
                            <div class="p-2 text-xs-center bg-teal media-right media-middle">
                                <i class="icon-user1 font-large-2 white"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction Overview</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <p>Top recent transactions. <span class="float-xs-right"><a href="#">View Deposits <i class="icon-arrow-right2"></i></a></span></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Transaction Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <!-- <th>Date</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($usersTrans as $row): $i++ ?>
                                    <tr>
                                        <td class="text-truncate"><?= $row->email ?></td>
                                        <td class="text-truncate"><?= $row->type ?></td>
                                        <td class="text-truncate">$ <?= $row->amount ?></td>
                                        <!-- <td class="text-truncate"><span class="tag tag-default tag-success"><?= $row->amount ?> </span></td> -->
                                        <td class="text-truncate"><?= $row->method ?></td>
                                        <td class="text-truncate"><?= $row->status ?></td>
                                        <!-- <td class="text-truncate"><?= $row->date ?></td> -->
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <!--/ project charts -->
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Account Verification</h4>
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
                            <p>Please verify user account to enable them perform other activities. Fake identity should be declined.</p>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable">
                                    <colgroup>
                                        <col class="col-xs-1">
                                        <col class="col-xs-7">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Document</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; foreach($pendingAcct as $row): $i++ ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $i ?>
                                            </th>
                                            <td><?= $row->firstname ?> <?= $row->lastname ?></td>
                                            <td> <?= $row->email ?> </td>
                                            <td> <?= $row->country ?> </td>
                                            <td>
                                                <a href="<?= $row->document ?>" target="_blank">     
                                                    <button type="button" class="btn btn-primary btn-sm">View Document</button>
                                                </a>
                                            </td>
                                            <td><?= $row->updated_at ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" id="accept" onclick="approveAcct('<?= $row->uuid ?>')">Accept</button>
                                                <button type="button" class="btn btn-danger btn-sm" data-userId="<?= $row->uuid ?>" onclick="declineAcct('<?= $row->uuid ?>')" id="decline">Decline</button>
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
        <!--/ project charts -->

        </div>
      </div>
    </div>

    <style>
        @media only screen and (max-width: 440px){
            #decline{
                margin-top: 3px;
            }
        }
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
          
            
            function approveAcct(userId){
                // var userId = $(this).attr('data-userId');
                var url = '<?= base_url('admin/approveUser') ?>'
                // console.log(userId);        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "User account verification will be verified!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, verify it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        type: 'POST',
                        url: url,
                        data: {userId},
                        success: function(data) {
                            Swal.fire(
                            'Deleted!',
                            'User account verification has been verified.',
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
            function declineAcct(userId){
                // var userId = $(this).attr('data-userId');
                var url = '<?= base_url('admin/declineUser') ?>'
                // console.log(userId);        
                Swal.fire({
                    title: 'Are you sure?',
                    text: "User verification will be declined!",
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
                        data: {userId},
                        success: function(data) {
                            Swal.fire(
                            'Deleted!',
                            'User account verification has been declined.',
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
    </script>
   
<?= view('admin/fragments/footer') ?>
