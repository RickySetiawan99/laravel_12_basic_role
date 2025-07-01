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
                <form action="{{ route($route.'update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ Hashids::encode($data->id) }}">
                    <div class="d-flex justify-content-center mb-3">
                        <div style="width: 100%; max-width: 600px;">
                            <label class="form-label">Permission <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="Permission" />
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-md-flex align-items-center justify-content-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <button type="submit" class="btn btn-primary hstack gap-6">
                                <i class="ti ti-send fs-4"></i>
                                Update
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
</script>
@endpush