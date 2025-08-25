
@extends('admin.layout.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection

@section('s-title')
<li class="breadcrumb-item active">
    Teacher
</li>
@endsection
@section('page-option')
    <div class="text-right">
       <a href="{{ route('admin.teacher.add') }}" class="btn btn-primary"> Teacher Add </a>
    </div>
@endsection

@section('content')
    <div class="bg-white p-3">
        <div class="row">
            @foreach ($teachers as $teacher)
            <div class="col-md-4 mb-3">
                <div class="shadow">
                    <div class="d-flex" style="height: 150px;align-items: center;overflow: hidden;background: gray;">
                        <img src="{{ asset($teacher->image) }}" alt="" class="w-100">
                    </div>
                    <div class="p-3">
                        {{ $teacher->name }}
                        <div class="d-flex justify-content-between" >

                        <a href="{{ route('admin.teacher.edit',['teacher' => $teacher->id])}}"
                                    class="btn btn-primary">Edit</a>

                                <a href="{{ route('admin.teacher.del',['teacher'=> $teacher->id])}}"
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
        });
    </script>
@endsection
