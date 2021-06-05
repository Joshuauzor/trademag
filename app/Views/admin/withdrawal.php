<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Withdrawal</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('users') ?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Withdrawal</a>
                </li>
                <!-- <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                </li> -->
              </ol>
            </div>
          </div>
        </div>

        <!-- content -->
        <div class="content-body"><!-- Basic example section start -->
           <!-- Card sizing section start -->
            <section id="sizing">
                <div class="row">
                    <div class="col-xs-12 mt-1 mb-3">
                        <h4>Process Withdrawal</h4>
                        <p>Fill the form below to process you withdrawal.</p>
                        <hr>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Withdrawal</h4>
                            <!-- <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="card-body collapse in">
                                <div class="card-block">

                                    <div class="card-text">
                                        <p class="card-text">Complete the form below to process withdrawal.</p>
                                    </div>

                                    <form class="form" method="post" action="<?= base_url('users/withdrawal') ?>" enctype="multipart/form-data">
                                        <!-- flash messages -->
                                        <?= view('flashMessages') ?>
                                        <!-- flash messages end -->
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="icon-head"></i> Personal Info</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1" class="sr-only">First Name</label>
                                                        <input type="text" id="projectinput1" class="form-control" value="<?= $user->firstname ?>" placeholder="First Name" name="firstname" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2" class="sr-only">Last Name</label>
                                                        <input type="text" id="projectinput2" class="form-control" value="<?= $user->lastname ?>" placeholder="Last Name" name="lastname" required readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3" class="sr-only">E-mail</label>
                                                        <input type="text" id="projectinput3" class="form-control" value="<?= $user->email ?>" placeholder="E-mail" name="email" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput4" class="sr-only">Country</label>
                                                        <input type="text" id="projectinput4" class="form-control" value="<?= $user->country ?>" placeholder="Country" name="country" required readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="icon-clipboard4"></i> Transaction info</h4>

                                            <div class="form-group">
                                                <label for="companyName" class="sr-only">Select Withdrawal Method</label>
                                                <select id="projectinput5" name="paymentMethod" class="form-control" required>
                                                    <option value="none" selected="" disabled="">Select Withdrawal Method</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Bitcoin">Bitcoin</option>
                                                    <option value="Zelle">Zelle</option>
                                                    <option value="Bank">Bank</option>
                                                </select>                                                
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="companyName" class="sr-only">Select Plan</label>
                                                <select id="plan" name="plan" class="form-control" required>
                                                    <option value="none" selected="" disabled="">Select Plan</option>
                                                    <?php foreach($plans as $row): ?>
                                                    <option value="<?= $row->plan_id ?>_<?= $row->invest ?>"><?= $row->plan_name ?></option>
                                                    <?php endforeach ?>
                                                </select>                                                
                                            </div> -->

                                            <div class="form-group">
                                                <label for="projectinput2" class="sr-only">Amount</label>
                                                <input type="number" id="amount" class="form-control" value="" placeholder="amount" name="amount" required min="1" max="<?= $user->wallet_bal ?>">
                                            </div>

                                            <!-- <div class="form-group">
                                                <label>Upload screenshot</label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="depositShot" required>
                                                    <span class="file-custom"></span>
                                                </label>
                                            </div> -->
                                            
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-outline-warning mr-1">
                                                <i class="icon-cross2"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-outline-primary">
                                                <i class="icon-check2"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </section>
            <!-- Card sizing section end -->

        </div>
      </div>
    </div>
   


 <!-- ////////////////////////////////////////////////////////////////////////////-->

<script>
    $('#plan').on('change', function(){
        var value = $(this).val();
        // console.log($(this).attr('id'));
        var newVal = value.split('_');
        var planId = newVal[0];
        var planAmt = newVal[1];
        if(planId == 5){
            $('#amount').attr('readonly', false);
            $('#amount').val(planAmt)
        }
        else{
            $('#amount').attr('readonly', true);
            $('#amount').val(planAmt)
        }
    })
</script>

 <?= view('users/fragments/footer') ?>
