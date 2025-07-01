<div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="index.php" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="{{ asset('assets') }}/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
              <img src="{{ asset('assets') }}/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
              <img src="{{ asset('assets') }}/images/backgrounds/login-security.svg" alt="modernize-img" class="img-fluid"
                width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                <h2 class="mb-1 fs-7 fw-bolder">Welcome to Modernize</h2>
                <p class="mb-7">Your Admin Dashboard</p>
                <div class="position-relative text-center my-4">
                  <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">Register</p>
                  <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="text-center" :status="session('status')" />

                @error('register') 
                    <div class="alert alert-danger text-center small mb-3">
                        {{ $message }}
                    </div> 
                @enderror

                <form wire:submit="register" >
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" wire:model="name" placeholder="your name" class="form-control" id="name">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" wire:model="email" placeholder="Email" class="form-control" id="exampleInputEmail1">
                    @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" wire:model="password" placeholder="Password" class="form-control" id="exampleInputPassword1">
                    @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                  </div>
                  <div class="mb-4">
                    <label for="confirm" class="form-label">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" placeholder="Repeat Password" class="form-control" id="confirm">
                    @error('password_confirmation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Register</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Already have an account?</p>
                    <a class="text-primary fw-medium ms-2" href={{ route('login') }} wire:navigate>Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>