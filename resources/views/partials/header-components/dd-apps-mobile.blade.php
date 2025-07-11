<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
  aria-labelledby="offcanvasWithBothOptionsLabel">
  <nav class="sidebar-nav scroll-sidebar">
    <div class="offcanvas-header justify-content-between">
      <img src="{{ asset('assets') }}/images/logos/favicon.ico" alt="modernize-img" class="img-fluid" />
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-apps"></i>
            </span>
            <span class="hide-menu">Apps</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level my-3">
            <li class="sidebar-item py-2">
              <a href="app-chat.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                  <span class="fs-2 d-block text-muted">New messages arrived</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-invoice.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                  <span class="fs-2 d-block text-muted">Get latest invoice</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-cotact.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                  <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-email.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Email App</h6>
                  <span class="fs-2 d-block text-muted">Get new emails</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="page-user-profile.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                  <span class="fs-2 d-block text-muted">learn more information</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-calendar.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                  <span class="fs-2 d-block text-muted">Get dates</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-contact2.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                  <span class="fs-2 d-block text-muted">Add new contact</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="app-notes.php" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ asset('assets') }}/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                  <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                </div>
              </a>
            </li>
            <ul class="px-8 mt-7 mb-4">
              <li class="sidebar-item mb-3">
                <h5 class="fs-5 fw-semibold">Quick Links</h5>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="page-pricing.php">Pricing Page</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="authentication-login.php">Authentication
                  Design</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="authentication-register.php">Register Now</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="authentication-error.php">404 Error Page</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="app-notes.php">Notes App</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="page-user-profile.php">User Application</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="page-account-settings.php">Account Settings</a>
              </li>
            </ul>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="app-chat.php" aria-expanded="false">
            <span>
              <i class="ti ti-message-dots"></i>
            </span>
            <span class="hide-menu">Chat</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="app-calendar.php" aria-expanded="false">
            <span>
              <i class="ti ti-calendar"></i>
            </span>
            <span class="hide-menu">Calendar</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="app-email.php" aria-expanded="false">
            <span>
              <i class="ti ti-mail"></i>
            </span>
            <span class="hide-menu">Email</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>