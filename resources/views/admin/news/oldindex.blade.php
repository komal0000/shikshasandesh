
@extends('admin.layout.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection

@section('s-title')
@endsection
@section('page-option')
    <div class="text-right">
       <a href="{{ route('admin.course.add') }}" class="btn btn-primary">Course Add </a>
    </div>
@endsection

@section('content')
    <div class="bg-white p-3">
        <div class="row">
            @foreach ($courses as $course)
            <div class="col-md-4 mb-3">
                <div class="shadow">
                    <div class="d-flex" style="height: 150px;align-items: center;overflow: hidden;background: gray; ">

                        <img src="{{ asset($course->image) }}" alt="" class="w-100">
                    </div>
                    <div class="p-3">
                            {{ $course->name }}
                            <div class="d-flex justify-content-between" >

                        <a href="{{ route('admin.course.edit',['course' => $course->id])}}"
                         class="btn btn-primary">Edit</a>

                        <a href="{{ route('admin.course.del',['course'=> $course->id])}}"
                         class="btn btn-danger">Delete</a>
                    </div>
                    </div>

                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            $('.photo').dropify();
            $('#desc').summernote();

        });
    </script>
@endsection
