@extends('admin.layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.achievements.index') }}">Achievement</a>
    <li class="breadcrumb-item active">
        Edit
    </li>
@endsection
@section('content')
<div class="bg-white shadow p-3 mt-3">
    <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control photo" accept="image/*"
                            data-default-file="{{ asset($achievement->image) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $achievement->title }}" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $achievement->description }}</textarea>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Update</button>
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
