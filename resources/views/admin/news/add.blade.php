@extends('admin.layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.news.index') }}">News</a>
    </li>
    <li class="breadcrumb-item active">
        Add
    </li>
@endsection
@section('content')
    <div class="p-3 shadow bg-white">
        <form action="{{ route('admin.news.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label>Feature Image</label>
                        <input type="file" name="feature_image" class="form-control photo" accept="image/*" required>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Short Content</label>
                        <textarea name="short_content" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Extra Content</label>
                        <textarea name="extra_content" class="form-control " id="long_desc" rows="5" required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            $('.photo').dropify();
            $('#long_desc').summernote();
        });
    </script>
@endsection
