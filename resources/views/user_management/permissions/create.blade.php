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
                <form  action="{{ route($route.'store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center">
                        <div style="width: 100%; max-width: 600px;">
                            <label class="form-label">Permission <span class="text-danger">*</span></label>
                            <div class="permission-repeater mb-3">
                                <div data-repeater-list="permissions">
                                    <div data-repeater-item class="row mb-3">
                                        <div class="col-md-8">
                                            <input type="text" name="permission" class="form-control" placeholder="Permission" />
                                        </div>
                                        <div class="col-md-4 mt-3 mt-md-0 d-flex align-items-center">
                                            <button data-repeater-delete class="btn btn-danger" type="button">
                                                <i class="ti ti-circle-x fs-5 d-flex"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" data-repeater-create class="btn btn-success hstack gap-6">
                                    Add Permission
                                    <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-md-flex align-items-center justify-content-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary hstack gap-6">
                                <i class="ti ti-send fs-4"></i>
                                Submit
                                </button>
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
    $(".permission-repeater").repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (remove) {
            $(this).slideUp(remove);
        },
    });
</script>
@endpush