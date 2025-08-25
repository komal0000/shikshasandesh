<style>
    .custom-card {
        height: 100%;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .custom-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .custom-card img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .custom-card img:hover {
        transform: scale(1.1);
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-top: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }
</style>
<div class="achievement-area bg-img pt-40 pb-40">

    <div class="container" style="padding: 0;">
        <div class="container">
            <div class="section-title mb-75">
                <h2> <span>Achievements</span> </h2>
            </div>
            <div class="container mt-5">
                <div class="row" style="padding-bottom: 40px">
                    @foreach ($achieve as $achievement)
                        <div class="col-md-3 mb-3">
                            <div class="card custom-card">
                                <img src="{{ asset($achievement->image) }}" class="card-img-top animated-img" alt="Achievement">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $achievement->title }}</h5>
                                    <p class="card-text">{{ $achievement->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="row" data-margin="10">
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
            </div> --}}
        </div>
    </div>
</div>



