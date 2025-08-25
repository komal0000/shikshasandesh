@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
      Facility
    </li>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
    <style>
        .col-md-6 {
            margin-bottom: 10px;
        }

        label {
            font-weight: 600;
            font-size: 1.1rem;
            color: black;
            margin-top: 5px;
        }

        .form-control,
        .dropify-wrapper {
            border-radius: 5px !important;
        }

        .dropify-button {
            background: #007bff !important;
            color: white !important;
            font-weight: bold !important;
            border-radius: 5px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Update Facility</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.add.facility.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        @foreach (['facility1' => 'Facility 1', 'facility2' => 'Facility 2', 'facility3' => 'Facility 3', 'facility4' => 'Facility 4'] as $key => $label)
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="{{ $key }}_title" class="form-label fw-bold">{{ $label }}
                                        Title</label>
                                    <input type="text" name="{{ $key }}_title" id="{{ $key }}_title"
                                        class="form-control" value="{{ $facilities[$key]->title ?? '' }}" required
                                        placeholder="Enter {{ $label }} Title">
                                </div>
                                <div class="mb-3">
                                    <label for="{{ $key }}_description"
                                        class="form-label fw-bold">{{ $label }} Description</label>
                                    <textarea name="{{ $key }}_description" id="{{ $key }}_description" class="form-control"
                                        rows="3" required>{{ $facilities[$key]->description ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="{{ $key }}_icon" class="form-label fw-bold">Upload Icon</label>
                                    <input type="file" name="{{ $key }}_icon" id="{{ $key }}_icon"
                                        class="dropify" accept="image/*"
                                        @if (!empty($facilities[$key]->icon)) data-default-file="{{ asset($facilities[$key]->icon) }}" @endif>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary w-100 p-2" data-height="50">
                            Update Facility
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
