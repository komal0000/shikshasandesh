<style>
    .teacher-area .custom-col-5 {
        padding: 15px;
    }

    .teacher-img img {
        width: 100%;
        height: auto;
    }
</style>
<div class="teacher-area pt-40 pb-40">
    <div class="container">
        <div class="section-title mb-30">
            <h2>Our <span>Teachers</span></h2>
            <p>{{ $data->news }}</p>
        </div>
        <div class="custom-row">
            @foreach ($teachers as $teacher)
                <div class="custom-col-5">
                    <div class="single-teacher mb-10">
                        <div class="teacher-img">
                            <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}" loading="lazy">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>{{ $teacher->name }}</h4>
                            <h5>{{ $teacher->deg }}</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>{{ $teacher->name }}</h4>
                                <h5>{{ $teacher->deg }}</h5>
                                <p>{{ $teacher->short_des }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
