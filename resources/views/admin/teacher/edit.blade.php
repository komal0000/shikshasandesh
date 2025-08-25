@extends('admin.layout.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.teacher.index') }}"> Teacher</a>
    </li>
    <li class="breadcrumb-item active">
        Edit
    </li>
@endsection
@section('content')
    <div class="bg-white p-5 shadow">
        <form action="{{ route('admin.teacher.edit', ['teacher' => $teacher->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="image">
                        Image
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" class="photo"
                        data-default-file="{{ asset($teacher->image) }}">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-2">
                                <label for="name">
                                    Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ $teacher->name }}">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="rate">
                                Designation
                            </label>
                            <input type="text" name="deg" id="deg" class="form-control" required
                                value="{{ $teacher->deg }}">


                        </div>
                    </div>
                    <div class="mb-2">

                        <label for="short_des">
                            Short Description
                        </label>
                        <textarea name="short_des" id="short_des" class="form-control" required required>{{ $teacher->short_des }}</textarea>
                    </div>

                    <div class="text-right py-2">
                        <a href="{{ route('admin.teacher.index') }}" class="btn btn-danger my-2">Cancel</a>
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
            $('#long_des').summernote();
        });
    </script>
@endsection
