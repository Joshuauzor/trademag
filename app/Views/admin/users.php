<?= view('admin/fragments/head') ?>
<?= view('admin/fragments/header') ?>
<?= view('admin/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Users</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Users</a>
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
                            <h4 class="card-title">Users</h4>
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
                                <p>You can fund user account and view user trading record</p>
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
                                                <th>Wallet Balance</th>
                                                <th>Invested Amount</th>
                                                <th>Total Withdrawal</th>
                                                <th>Bonus</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; foreach($verifiedUsers as $row): $i++ ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $i ?>
                                                </th>
                                                <td><?= $row->email ?></td>
                                                <td><?= $row->firstname ?> <?= $row->lastname ?></td>
                                                <td> <?= $row->phone ?> </td>
                                                <td><?= $row->country ?></td>
                                                <td><?= $row->wallet_bal ?></td>
                                                <td><?= $row->invested ?></td>
                                                <td><?= $row->withdrawal ?></td>
                                                <td><?= $row->bonus ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-backdrop="false" data-target="#fundUser<?= $row->uuid ?>" id="fund" style="margin-bottom: 3px;">Fund</button>
                                                    <button type="button" class="btn btn-danger btn-sm" id="deactivate" data-userId="<?= $row->uuid ?>" onclick="deactivate('<?= $row->uuid ?>')">Deactivate</button>
                                                </td>                                             
                                            </tr>

                                            <!-- fund modal -->
                                            <div class="modal fade text-xs-left" id="fundUser<?= $row->uuid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel4">Fund User</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form class="form" method="post" action="<?= base_url('admin/users') ?>">
                                                                <div class="form-body">
                                                                    <h4 class="form-section"><i class="icon-eye6"></i> About User</h4>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput1">Email</label>
                                                                                <input type="text" id="userinput1" class="form-control border-primary" value="<?= $row->email ?>" placeholder="Email" name="email" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput2">Name</label>
                                                                                <input type="text" id="userinput2" class="form-control border-primary" value="<?= $row->firstname ?> <?= $row->lastname ?>" placeholder="Name" name="name" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput1">Wallet Balance</label>
                                                                                <input type="number" id="userinput1" class="form-control border-primary" value="<?= $row->wallet_bal ?>" placeholder="wallet_bal" name="wallet_bal">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput2">Invested Amount</label>
                                                                                <input type="number" id="userinput2" class="form-control border-primary" value="<?= $row->invested ?>" placeholder="invested" name="invested">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput1">Total Withdrawal</label>
                                                                                <input type="number" id="userinput1" class="form-control border-primary" value="<?= $row->withdrawal ?>" placeholder="withdrawal" name="withdrawal">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="userinput2">Trading Bonus</label>
                                                                                <input type="number" id="userinput2" class="form-control border-primary" value="<?= $row->bonus ?>" placeholder="Last name" name="bonus">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="userinput4">Account Type</label>
                                                                                <select name="subscription" id="" class="form-control border-primary">
                                                                                    <option value="<?= $row->subscription ?>" selected="<?= $row->subscription ?>"><?= $row->subscription ?></option>
                                                                                        <option value="Mini">Mini</option>
                                                                                        <option value="Medi">Medi</option>
                                                                                        <option value="Max">Max</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <!-- <div class="form-actions right">
                                                                    <button type="button" class="btn btn-warning mr-1">
                                                                        <i class="icon-cross2"></i> Cancel
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <i class="icon-check2"></i> Save
                                                                    </button>
                                                                </div> -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-outline-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script>

    // deactivate account
    function deactivate(userId){
        // var userId = $(this).attr('data-userId');
        var url = '<?= base_url('admin/deactivateAcct') ?>'
        // console.log(userId);        
        Swal.fire({
            title: 'Are you sure?',
            text: "User Account will be deactivated!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, deactivate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: 'POST',
                url: url,
                data: {userId},
                success: function(data) {
                    Swal.fire(
                    'Deleted!',
                    'User Deposit has been deactivated.',
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

 <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?= view('admin/fragments/footer') ?>
