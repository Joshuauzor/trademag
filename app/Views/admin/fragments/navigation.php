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
          <li class=" nav-item"><a href="<?= base_url('admin') ?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
          </li>
          <!--  -->
          <!-- <li class=" nav-item"><a href="#"><i class="icon-android-desktop"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Live Trade</span></a> -->
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/users') ?>"><i class="icon-ios-people"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Users</span></a>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-cash"></i><span data-i18n="nav.maps.main" class="menu-title">Withdrawal</span></a>
            <ul class="menu-content">
              <li><a href="<?= base_url('admin/pendingWithdrawal') ?>" data-i18n="nav.maps.google_maps.gmaps_basic_maps" class="menu-item">Pending</a>
              </li>
              <li><a href="<?= base_url('admin/approvedWithdrawal') ?>" data-i18n="nav.maps.vector_maps.vector_maps_jvq" class="menu-item">Approved</a>
              </li>
              <li><a href="<?= base_url('admin/declinedWithdrawal') ?>" data-i18n="nav.maps.vector_maps.vector_maps_jvq" class="menu-item">Declined</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-cash"></i><span data-i18n="nav.maps.main" class="menu-title">Deposit</span></a>
            <ul class="menu-content">
              <li><a href="<?= base_url('admin/pendingDeposit') ?>" data-i18n="nav.maps.google_maps.gmaps_basic_maps" class="menu-item">Pending</a>
              </li>
              <li><a href="<?= base_url('admin/approvedDeposit') ?>" data-i18n="nav.maps.vector_maps.vector_maps_jvq" class="menu-item">Approved</a>
              </li>
              <li><a href="<?= base_url('admin/declinedDeposit') ?>" data-i18n="nav.maps.vector_maps.vector_maps_jvq" class="menu-item">Declined</a>
              </li>
            </ul>
          </li>
          <!-- <li class=" nav-item"><a href="<?= base_url('users/withdrawal') ?>"><i class="icon-cash"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Withdrawal</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('users/history') ?>"><i class="icon-clipboard"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Deposit</span></a>
          </li> -->
          <li class=" nav-item"><a href="<?= base_url('admin/profile') ?>"><i class="icon-android-person"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Profile</span></a>
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/deactivated') ?>"><i class="icon-briefcase"></i><span data-i18n="nav.project.main" class="menu-title">Deactivated Account</span></a>  
          </li>
          <li class=" nav-item"><a href="<?= base_url('admin/settings') ?>"><i class="icon-settings"></i><span data-i18n="nav.project.main" class="menu-title">Settings</span></a>  
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