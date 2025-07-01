<!-- ---------------------------------- -->
<!-- Start Vertical Layout Header -->
<!-- ---------------------------------- -->
<nav class="navbar navbar-expand-lg p-0">
  <ul class="navbar-nav">
    <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
      <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
  </ul>

  <div class="d-block d-lg-none py-4">
    <a href="index.php" class="text-nowrap logo-img">
      <img src="{{ asset('assets') }}/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
      <img src="{{ asset('assets') }}/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
    </a>
  </div>
  <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="ti ti-dots fs-7"></i>
  </a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <div class="d-flex align-items-center justify-content-between">
      {{-- <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
        aria-controls="offcanvasWithBothOptions">
        <i class="ti ti-align-justified fs-7"></i>
      </a> --}}
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
        <!-- ------------------------------- -->
        <!-- start language Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle">
          <a class="nav-link moon dark-layout" href="javascript:void(0)">
            <i class="ti ti-moon moon"></i>
          </a>
          <a class="nav-link sun light-layout" href="javascript:void(0)">
            <i class="ti ti-sun sun"></i>
          </a>
        </li>
        <!-- ------------------------------- -->
        <!-- end language Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start shopping cart Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle">
          <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="ti ti-basket"></i>
            <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
          </a>
        </li>
        <!-- ------------------------------- -->
        <!-- end shopping cart Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start notification Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
          <a class="nav-link position-relative" href="javascript:void(0)" id="drop2"
            aria-expanded="false">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
          <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            @include("partials/header-components/dd-notification")
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end notification Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start profile Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item dropdown">
          <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
            <div class="d-flex align-items-center">
              <div class="user-profile-img">
                <img src="{{ asset('assets') }}/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35"
                  alt="modernize-img" />
              </div>
            </div>
          </a>
          <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
            @include("partials/header-components/dd-profile")
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end profile Dropdown -->
        <!-- ------------------------------- -->
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------- -->
<!-- End Vertical Layout Header -->
<!-- ---------------------------------- -->

<!-- ------------------------------- -->
<!-- apps Dropdown in Small screen -->
<!-- ------------------------------- -->
@include("partials/header-components/dd-apps-mobile")