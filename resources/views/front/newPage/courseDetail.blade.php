@extends('front.layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url('');">
            <div class="container">
                <h2>Courses / {{ $course->name }} </h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> Courses
                            <i class="fa fa-angle-double-right"></i> {{ $course->name }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Left Section: Course Details -->
            <div class="col-md-8 p-3">
                <div class="course-detail shadow">
                    <img src="{{ asset($course->image) }}" alt="{{ $course->name }}" class="img-fluid"
                        style="width: 100%; loading="lazy">
                    <div class="info p-3 mt-3">
                        <h2>{{ $course->name }}</h2>
                        <p><strong>Faculty:</strong> {{ $course->faculty }}</p>
                        <div>{!! $course->long_des !!}</div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Other Courses with Details -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="mb-3 pt-20" align="center">Other Courses</h3>
                    @foreach ($otherCourses as $other)
                        <div class="sidebar-course-item d-flex mb-3 border p-3 rounded">
                            <a href="{{ route('course.show', ['id' => $other->id]) }}" class="flex-shrink-0 me-3">
                                <img src="{{ asset($other->image) }}" alt="{{ $other->name }}" class="img-fluid"
                                    style="width: 80px; height: 80px; object-fit: cover;" loading="lazy">
                            </a>
                            <div class="ms-2 p-3">
                                <h5><a href="{{ route('course.show', ['id' => $other->id]) }}"
                                        class="text-dark">{{ $other->name }}</a></h5>
                                <p class="small text-muted">{{ Str::limit($other->short_des, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
