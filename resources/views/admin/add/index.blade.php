@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
        Home-Achieve
    </li>
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Update Data</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.add.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    @foreach (['students' => 'Students', 'graduates' => 'Graduates', 'awards' => 'Awards', 'faculties' => 'Faculties'] as $key => $label)
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label fw-bold">{{ $label }}</label>
                                <input type="text" name="{{ $key }}" id="{{ $key }}" class="form-control"
                                    value="{{ $adds[$key]->value ?? '' }}" required placeholder="Enter {{ $label }}">
                            </div>
                            <div class="mb-3">
                                <label for="{{ $key }}_icon" class="form-label fw-bold">Icon</label>
                                <input type="file" name="{{ $key }}_icon" id="{{ $key }}_icon"
                                    class="dropify" accept="image/*"
                                    @if (!empty($adds[$key]->icon)) data-default-file="{{ asset('storage/' . $adds[$key]->icon) }}" @endif>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endsection
