<!-- Carousel Start -->
  <div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key=>$slider)
            <div class="carousel-item {{$key==0?'active':''}}">
                <img class="w-100 d-block d-md-none" src="{{asset($slider->mobile_image)}}">
                <img class="w-100 d-none d-md-block" src="{{asset($slider->image)}}">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8 text-start">
                                <p class="fs-4 text-white">{!! $slider->title !!}</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">{!! $slider->subtitle !!}</h1>
                                <a href="{{$slider->link}}" class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight">{{$slider->link_title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


