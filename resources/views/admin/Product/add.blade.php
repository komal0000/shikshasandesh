@extends('admin.layout.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    /<a href="{{ route('admin.product.index') }}">Products</a>/Add
@endsection
@section('content')
    <div class="bg-white p-5 shadow">
        <form action="{{ route('admin.product.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="image">
                        Image
                    </label>
                    <input type="file" name="image" id="image" class="photo">
                </div>
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-2">
                                <label for="name">
                                    name
                                </label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="rate">
                                Rate
                            </label>
                            <input type="number" name="rate" id="rate" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-2">

                        <label for="Description">
                            Description
                        </label>
                        <textarea name="description" id="desc" class="form-control" required></textarea>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary">
                            save
                        </button>
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
            $('#desc').summernote();
        });
    </script>
@endsection
