
@extends('layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="container-fluid">
        @include('partials.breadcrumb', ['title' => $header, 'subtitle' => $sub_header])

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                <a href="{{ route($route.'index') }}" class="btn btn-warning">
                    <i class="ti ti-arrow-left"></i> Cancel
                </a>
                </div>
            </div>
            <div class="card-body">
                <form  action="{{ route($route.'store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <div class="controls">
                                      <input type="text" name="name" class="form-control" required placeholder="John Doe" value="{{ old('name') }}"
                                        data-validation-required-message="This field is required" />
                                </div>
                              </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required placeholder="johndoe@email.com"
                                      data-validation-required-message="This field is required" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required required placeholder="Password"
                                      data-validation-required-message="This field is required" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="password" name="password_confirm" data-validation-match-match="password"
                                      class="form-control" required placeholder="Confirm Password" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label d-block">Role <span class="text-danger">*</span></label>
                                <div class="controls">
                                    @foreach ($roles as $role)
                                        <fieldset>
                                            <div class="form-check mb-1">
                                                <input type="radio" value="{{ $role->name }}" name="role" required
                                                id="role_{{ $role->id }}" class="form-check-input" />
                                                <label class="form-check-label" for="role_{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                                            </div>
                                        </fieldset>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center">
                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary hstack gap-6">
                                    <i class="ti ti-send fs-4"></i>
                                    Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Make sure jQuery is loaded before this script -->
<script>

</script>
@endpush