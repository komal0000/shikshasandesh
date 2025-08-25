<div class="course-area bg-img pt-40 pb-40" style="background-image: url('{{ asset('/img/bg.jpeg') }}'); background-size: cover; background-position: center;">

    <div class="container" style="padding: 0;">
        <div class="container">
            <div class="section-title mb-75">
                <h2> <span>Our</span> Courses</h2>
                <p>{{ $data->program }}</p>
            </div>

            <div class="row" data-margin="10">
                @if (isset($courses) && count($courses) > 0)
                    @foreach ($courses as $course)
                        <div class="col-lg-3 col-md-6 mb-2 ">
                            <div class="single-course" style="margin-bottom: 10;">
                                <div class="course-img">
                                    <a href="{{ route('course.show', $course->id) }}"><img src="{{ asset($course->image) }}"
                                            alt="{{ $course->name }}" loading="lazy">
                                </div>
                                <div class="course-content">
                                    <h4> {{ $course->name }}</a></h4>
                                    <p> {{ $course->short_des }}</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach
                @else
                    <p>No courses available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
