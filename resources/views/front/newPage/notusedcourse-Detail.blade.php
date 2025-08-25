@extends('front.layout.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Section: Course Details -->
        <div class="col-md-8">
            <div class="course-detail">
                <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="img-fluid">
                <h2>{{ $course->name }}</h2>
                <p><strong>Faculty:</strong> {{ $course->faculty }}</p>
                <p>{{ $course->long_des }}</p>
            </div>
        </div>

        <!-- Right Section: Other Courses -->
        <div class="col-md-4">
            <div class="sidebar">
                <h3>Other Courses</h3>
                <ul class="list-group">
                    @foreach ($otherCourses as $other)
                        <li class="list-group-item">
                            <a href="{{ route('course', ['id' => $other->id]) }}">{{ $other->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
