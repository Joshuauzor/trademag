<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Live Trade</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Live Trade</a>
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
                            <h4 class="card-title">Live Trade</h4>
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
                                <p>Study the market in real time</p>
                                <div class="table-responsive">
                                    <script type="text/javascript" async="" src="https://widgets.cryptocompare.com/serve/v3/coin/chart?fsym=BTC&amp;tsyms=USD,EUR,CNY,GBP&amp;app=localhost"></script>
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

 <?= view('users/fragments/footer') ?>
