<?= view('users/fragments/head') ?>
<?= view('users/fragments/header') ?>
<?= view('users/fragments/navigation') ?>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">User Profile</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Profile</a>
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
                                <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
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
                                        <p>Update your profile to enable us know you better.</p>
                                    </div>

                                    <form class="form" method="post" action="<?= base_url('users/profile') ?>">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="icon-eye6"></i> About User</h4>
                                            <div class="row">
                                                <div class="form-group">
                                                    <!-- flash messages -->
                                                    <?= view('flashMessages') ?>
                                                    <!-- flash messages end -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput1">First Name</label>
                                                        <input type="text" id="userinput1" class="form-control border-primary" value="<?= $user->firstname ?>" placeholder="First Name" name="firstname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput2">Last Name</label>
                                                        <input type="text" id="userinput2" class="form-control border-primary" value="<?= $user->lastname ?>" placeholder="Last name" name="lastname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput3">Username</label>
                                                        <input type="text" id="userinput3" class="form-control border-primary" value="<?= $user->username ?>" placeholder="Username" name="username">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userinput4">Country</label>
                                                        <select name="country" id="" class="form-control border-primary">
                                                            <option value="<?= $user->country ?>" selected="<?= $user->country ?>"><?= $user->country ?></option>
                                                            <?php foreach($countries as $row): ?>
                                                                <option value="<?= $row->name?>"><?= $row->name ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <!-- <input type="text" id="userinput4" class="form-control border-primary" value="<?= $user->country ?>" placeholder="Nick Name" name="country"> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="icon-mail6"></i> Contact Info & Bio</h4>

                                            <div class="form-group">
                                                <label for="userinput5">Email</label>
                                                <input class="form-control border-primary" name="email" type="email" value="<?= $user->email ?>" placeholder="email" id="userinput5" readonly>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="userinput6">Website</label>
                                                <input class="form-control border-primary" type="url" value="<?= $user->website ?>" placeholder="http://" id="userinput6">
                                            </div> -->

                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input class="form-control border-primary" name="phone" id="userinput7" value="<?= $user->phone ?>" type="tel" placeholder="Contact Number">
                                            </div>

                                            <div class="form-group">
                                                <label for="userinput8">Address</label>
                                                <textarea id="userinput8" rows="5" class="form-control border-primary" value="<?= $user->address ?>" name="address" placeholder="Enter Address"><?= $user->address ?></textarea>
                                            </div>

                                        </div>
                                       <div class="form-actions right">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="icon-cross2"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
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


 <?= view('users/fragments/footer') ?>
