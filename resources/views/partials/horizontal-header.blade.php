<nav class="navbar navbar-expand-xl container-fluid p-0">
  <ul class="navbar-nav align-items-center">
    <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
      <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="nav-item d-none d-xl-block">
      <a href="index.php" class="text-nowrap nav-link">
        <img src="{{ asset('assets') }}/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="modernize-img" />
        <img src="{{ asset('assets') }}/images/logos/light-logo.svg" class="light-logo" width="180" alt="modernize-img" />
      </a>
    </li>
    <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
      <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        <i class="ti ti-search"></i>
      </a>
    </li>
  </ul>
  <ul class="navbar-nav quick-links d-none d-xl-flex align-items-center">
    <!-- ------------------------------- -->
    <!-- start apps Dropdown -->
    <!-- ------------------------------- -->
    <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-flex">
      <div class="hover-dd">
        <a class="nav-link" href="javascript:void(0)">
          Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
          @GLo("partials/header-components/dd-apps")
        </div>
      </div>
    </li>
    <!-- ------------------------------- -->
    <!-- end apps Dropdown -->
    <!-- ------------------------------- -->
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="app-chat.php">Chat</a>
    </li>
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="app-calendar.php">Calendar</a>
    </li>
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="app-email.php">Email</a>
    </li>
  </ul>
  <div class="d-block d-xl-none">
    <a href="index.php" class="text-nowrap nav-link">
      <img src="{{ asset('assets') }}/images/logos/dark-logo.svg" width="180" alt="modernize-img" />
    </a>
  </div>
  <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="p-2">
      <i class="ti ti-dots fs-7"></i>
    </span>
  </a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
      <a href="javascript:void(0)"
        class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
        <i class="ti ti-align-justified fs-7"></i>
      </a>
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
        <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
          <a class="nav-link" href="javascript:void(0)" id="drop2"
            aria-expanded="false">
            <img src="{{ asset('assets') }}/images/svgs/icon-flag-en.svg" alt="modernize-img" width="20px" height="20px"
              class="rounded-circle object-fit-cover round-20" />
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ asset('assets') }}/images/svgs/icon-flag-en.svg" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">English (UK)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ asset('assets') }}/images/svgs/icon-flag-cn.svg" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">中国人 (Chinese)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ asset('assets') }}/images/svgs/icon-flag-fr.svg" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">français (French)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ asset('assets') }}/images/svgs/icon-flag-sa.svg" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">عربي (Arabic)</p>
              </a>
            </div>
          </div>
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
            @GLo("partials/header-components/dd-notification")
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
            @GLo("partials/header-components/dd-profile")
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end profile Dropdown -->
        <!-- ------------------------------- -->
      </ul>
    </div>
  </div>
</nav>