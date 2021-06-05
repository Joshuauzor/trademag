<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div> 
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="<?= base_url('users') ?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>
          <!--  -->
          <?php if(session()->user['account_status'] != 'verified'): ?>
          <li class=" nav-item"><a href="<?= base_url('users/verify') ?>"><i class="icon-checkmark"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Verify Account</span></a>
          </li>
          <?php endif ?>
          <!--  -->
          <li class=" nav-item"><a href="<?= base_url('users/trade') ?>"><i class="icon-android-desktop"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Live Trade</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('users/deposit') ?>"><i class="icon-cash"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Deposit</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('users/withdrawal') ?>"><i class="icon-cash"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Withdrawal</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('users/history') ?>"><i class="icon-clipboard"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Transaction History</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('users/profile') ?>"><i class="icon-android-person"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Profile</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-briefcase"></i><span data-i18n="nav.project.main" class="menu-title">Account</span></a>  
          </li>
          <li class=" nav-item"><a href="<?= base_url('logout') ?>"><i class="icon-android-unlock"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Logout</span></a>
          </li>        
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->