@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
        Course
    </li>
@endsection
@section('css')
@endsection
@section('s-title')
@endsection
@section('page-option')
    <div class="text-right">
        <a href="{{ route('admin.course.add') }}" class="btn btn-primary">Add Course</a>
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
                            <h4>
                                {{ $course->name }}
                            </h4>
                            <hr>
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('admin.course.edit', ['course' => $course->id]) }}"
                                    class="btn btn-primary">Edit</a>

                                <a href="{{ route('admin.course.del', ['course' => $course->id]) }}"
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
@endsection
