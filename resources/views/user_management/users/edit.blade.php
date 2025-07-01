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
                <form action="{{ route($route.'update') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="{{ Hashids::encode($data->id) }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="text" id="name" name="name" class="form-control" required
                                           placeholder="John Doe"
                                           value="{{ old('name', $data->name) }}"
                                           data-validation-required-message="This field is required" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="controls">
                                    <input type="email" id="email" name="email" class="form-control" required
                                           placeholder="johndoe@email.com"
                                           value="{{ old('email', $data->email) }}"
                                           data-validation-required-message="This field is required" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Password</label>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Leave blank if not changing" />
                                    <small class="text-muted">Leave blank if you don't want to change the password.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label">Confirm Password</label>
                                <div class="controls">
                                    <input type="password" id="password_confirm" name="password_confirm"
                                           class="form-control"
                                           placeholder="Leave blank if not changing"
                                           data-validation-match-match="password" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label d-block" for="is_active">Status <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check form-switch m-0">
                                        <input type="checkbox" class="form-check-input success" id="is_active" name="is_active"
                                               value="1" {{ $data->is_active ? 'checked' : '' }}>
                                    </div>
                                    <div id="statusLabel">
                                        <span class="badge {{ $data->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $data->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label class="form-label d-block">Role <span class="text-danger">*</span></label>
                                <div class="controls">
                                    @foreach ($roles as $role)
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio"
                                                   name="role"
                                                   id="role_{{ $role->id }}"
                                                   value="{{ $role->name }}"
                                                   {{ $userRole === $role->name ? 'checked' : '' }}
                                                   required
                                                   data-validation-required-message="This field is required">
                                            <label class="form-check-label" for="role_{{ $role->id }}">{{ ucfirst($role->name) }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-md-flex align-items-center">
                                <div class="ms-auto mt-3 mt-md-0">
                                    <button type="submit" class="btn btn-primary hstack gap-6">
                                        <i class="ti ti-send fs-4"></i>
                                        Update
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
<script>
    $(document).ready(function () {
        $('#is_active').on('change', function () {
            const isChecked = $(this).is(':checked');
            const label = $('#statusLabel span');

            if (isChecked) {
                label.removeClass('bg-danger').addClass('bg-success').text('Active');
            } else {
                label.removeClass('bg-success').addClass('bg-danger').text('Inactive');
            }
        });
    });
</script>
@endpush