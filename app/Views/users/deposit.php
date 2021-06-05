<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Deposit</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('users') ?>">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Deposit</a>
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
                        <h4>Trading plans</h4>
                        <p>Pick any trading plan of your choice to get started and enjoy amazing benefits of trading with us.</p>
                        <hr>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12">
                        <p>Click to copy the bitcoin wallet</p>
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="bitcoinWalID" class="form-control float-left" value="<?= $currentMaster->btc_id ?>" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Bitcoin Wallet ID" data-original-title="" title="" readonly>
                    </div>
                    <div class="col-md-2">
                        <button onclick="copyToClipboard()" id="copy" class="btn mr-1 btn-primary" style="margin-top: 3px;">Copy</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Deposit</h4>
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
                                            <p class="card-text">Complete the form below to approve deposit.</p>
                                        </div>

                                        <form class="form" method="post" action="<?= base_url('users/deposit') ?>" enctype="multipart/form-data">
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
                                                    <label for="companyName" class="sr-only">Select Payment Method</label>
                                                    <select id="projectinput5" name="paymentMethod" class="form-control" required>
                                                        <option value="none" selected="" disabled="">Select Payment Method</option>
                                                        <option value="Paypal">Paypal</option>
                                                        <option value="Bitcoin">Bitcoin</option>
                                                        <option value="Zelle">Zelle</option>
                                                    </select>                                                
                                                </div>

                                                <div class="form-group">
                                                    <label for="companyName" class="sr-only">Select Plan</label>
                                                    <select id="plan" name="plan" class="form-control" required>
                                                        <option value="none" selected="" disabled="">Select Plan</option>
                                                        <?php foreach($plans as $row): ?>
                                                        <option value="<?= $row->plan_id ?>_<?= $row->invest ?>"><?= $row->plan_name ?></option>
                                                        <?php endforeach ?>
                                                    </select>                                                
                                                </div>

                                                <div class="form-group">
                                                    <label for="projectinput2" class="sr-only">Amount</label>
                                                    <input type="number" id="amount" class="form-control" value="" placeholder="amount" name="amount" required readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Upload screenshot</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" id="file" name="depositShot" required>
                                                        <span class="file-custom"></span>
                                                    </label>
                                                </div>
                                               
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

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <h4 class="card-title">- Premium Plan -</h4>
                                    <p class="card-text">Get 41,400 USD for $10000.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        24x7 support
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Secured trading
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading bonus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading alert
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Professional live trade
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Unlimited Withdrawal method
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Personal account manager
                                    </li>
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <h4 class="card-title">- Other Plans -</h4>
                                    <p class="card-text">Select a plan with any amount suitable to you.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        24x7 support
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Secured trading
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading bonus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Maximum benefit
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"></span>
                                        NB: Chat with our agent to inform you of your trading benefit
                                    </li>
                                    
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Card sizing section end -->

            <!-- Content types section start -->
            <section id="content-types">

                <div class="row match-height">
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <h4 class="card-title">- Starter Plan -</h4>
                                    <p class="card-text">Get 6250 USD for $700.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        24x7 support
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Secured trading
                                    </li> 
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading bonus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Trading alert
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Professional live trade
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Unlimited Withdrawal method
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Personal account manager
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <h4 class="card-title">- Silver Plan -</h4>
                                    <p class="card-text">Get 10,070 USD for $1000.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        24x7 support
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Secured trading
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading bonus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading alert
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Professional live trade
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Unlimited Withdrawal method
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Personal account manager
                                    </li>
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <h4 class="card-title">- Gold Plan -</h4>
                                    <p class="card-text">Get 29,400 USD for $7000.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        24x7 support
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Secured trading
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading bonus
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Trading alert
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Professional live trade
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-info float-xs-right"><i class="icon-android-checkmark-circle"></i></span>
                                        Unlimited Withdrawal method
                                    </li>
                                    <li class="list-group-item">
                                        <span class="tag tag-default tag-pill bg-danger float-xs-right"><i class="icon-android-cancel"></i></span>
                                        Personal account manager
                                    </li>
                                </ul>
                                <!-- <div class="card-block">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Content types section end -->

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
    });


    // copy 
    function copyToClipboard(element) {
        // console.log('here');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#bitcoinWalID').val()).select();
        document.execCommand("copy");
        $temp.remove();
        $('#copy').css('backgroundColor', 'green');
        $('#copy').html('Copied');

    }
</script>
 
 <?= view('users/fragments/footer') ?>
