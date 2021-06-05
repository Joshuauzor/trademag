<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
   

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
                                    <h3 class="pink">$ <?= $user->wallet_bal ?></h3>
                                    <span>Wallet Balance</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
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
                                    <h3 class="teal">$ <?= $user->invested ?></h3>
                                    <span>Invested</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="icon-cash teal font-large-2 float-xs-right"></i>
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
                                    <h3 class="deep-orange"><?= ucfirst($user->account_status) ?></h3>
                                    <span>Account Status</span>
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
                                    <h3 class="cyan"><?= ucfirst($user->subscription) ?></h3>
                                    <span>Account Type</span>
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
                                <h5 class="deep-orange">Total Withdrawal</h5>
                                <h5 class="text-bold-400">$ <?= $user->withdrawal ?></h3></h5>
                                <progress class="progress progress-sm progress-deep-orange mt-1 mb-0" value="45" max="100"></progress>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="p-2 text-xs-center bg-cyan media-left media-middle">
                                <i class="icon-cash font-large-2 white"></i>
                            </div>
                            <div class="p-2 media-body">
                                <h5>Trading Bonus</h5>
                                <h5 class="text-bold-400">$ <?= $user->bonus ?></h3></h5>
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
                                <h5>Total Connection</h5>
                                <h5 class="text-bold-400">39,226</h5>
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
                        <h4 class="card-title">Transaction History</h4>
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
                            <!-- <p>Total paid invoices 240, unpaid 150. <span class="float-xs-right"><a href="#">Invoice Summary <i class="icon-arrow-right2"></i></a></span></p> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Transaction Type</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <!-- <th>Date</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($user_history as $row): $i++ ?>
                                    <tr>
                                        <td class="text-truncate"><a href="#"><?= $i ?></a></td>
                                        <td class="text-truncate"><?= ucfirst($row->type) ?></td>
                                        <td class="text-truncate"><?= $row->amount ?></td>
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
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-inline text-xs-center pt-2 m-0">
                            <li class="mr-1">
                                <h6> <span class="grey darken-1">Network Activities</span></h6>
                            </li>
                        </ul>
                    </div>
                    <iframe id="tradingview_8c5c7" src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_8c5c7&amp;symbol=AAPL&amp;interval=D&amp;hidesidetoolbar=0&amp;symboledit=1&amp;saveimage=0&amp;toolbarbg=f1f3f6&amp;studies=ROC%40tv-basicstudies%1FStochasticRSI%40tv-basicstudies%1FMASimple%40tv-basicstudies&amp;theme=Dark&amp;style=1&amp;timezone=exchange&amp;withdateranges=1&amp;showpopupbutton=1&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;showpopupbutton=1&amp;locale=en&amp;utm_source=www.autofxnetworks.online&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=AAPL" style="width: 100%; height: 600px; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe>
                </div>
            </div>
            <!-- <div class="col-xl-4 col-lg-12">
                <div class="card card-inverse bg-info">
                    <div class="card-body">
                        <div class="position-relative">
                            <div class="chart-title position-absolute mt-2 ml-2 white">
                                <h1 class="display-4">84%</h1>
                                <span>Employees Satisfied</span>
                            </div>
                            <canvas id="emp-satisfaction" class="height-400 block"></canvas>
                            <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                                <a href="#" class="btn bg-info bg-darken-3 mr-1 white">Statistics <i class="icon-stats-bars"></i></a> for the last year.
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!--/ project charts -->

        </div>
      </div>
    </div>
   
<?= view('users/fragments/footer') ?>
