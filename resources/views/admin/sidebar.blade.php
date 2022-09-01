<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{url('dashboard')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img src="{{url('assets/img/logo.png')}}" alt="" width="40px">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">{{Helper::appName()}}</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item @if($link=='Dashboard') active @endif">
        <a href="{{url('/')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu</span>
      </li>
      <li class="menu-item @if($link=='Sales') active @endif">
        <a href="{{url('sales')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Sales</div>
        </a>
      </li>
      <li class="menu-item @if($link=='Branch Category') active @endif">
        <a href="{{url('branch-category')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Branch Category</div>
        </a>
      </li>

      <li class="menu-item @if($link=='Branch') active @endif">
        <a href="{{url('branch')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Branch</div>
        </a>
      </li>

      <li class="menu-item @if($link=='Branch Assigntment') active @endif">
        <a href="{{url('branch-assigntment')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Branch Assigntment</div>
        </a>
      </li>

      <li class="menu-item @if($link=='Result') active @endif">
        <a href="{{url('result')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Result</div>
        </a>
      </li>

      <li class="menu-item @if($link=='Sales Transaction') active @endif">
        <a href="{{url('sales-transaction')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Sales Transaction</div>
        </a>
      </li>


   
    </ul>
  </aside>
  <!-- / Menu -->