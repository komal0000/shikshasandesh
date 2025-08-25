<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                        <div class="about-experience bg-secondary rounded">
                            <h1 class="display-1 mb-0">25</h1>
                            <small class="fs-5 fw-bold">Years Experience</small>
                        </div>
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="{{asset($curdata['img1'])}}">
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                        <img class="img-fluid rounded" src="{{asset($curdata['img2'])}}">
                    </div>
                    <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                        <img class="img-fluid rounded" src="{{asset($curdata['img3'])}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                <h1 class="mb-4">Know About Our Dairy & Our History</h1>
                <p class="mb-4">
                    {{$curdata['desc']}}
                </p>
                <div class="row g-5 pt-2 mb-5">
                    <div class="col-sm-6">
                        <h5 class="mb-3">{{$curdata['title1']}}</h5>
                        <span>{{$curdata['desc1']}}</span>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">{{$curdata['title2']}}</h5>
                        <span>{{$curdata['desc2']}}</span>
                    </div>
                </div>
                <a class="btn btn-secondary rounded-pill py-3 px-5" href="">Explore More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
