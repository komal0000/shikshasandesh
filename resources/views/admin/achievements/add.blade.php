@extends('admin.layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.achievements.index') }}">Achievement</a>
    <li class="breadcrumb-item active">
        Add
    </li>
@endsection

@section('content')
    <div class="bg-white shadow p-3 mt-3">
        <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control photo" accept="image/*" required>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>


            </div>

        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.photo').dropify();
        });
    </script>
@endsection
