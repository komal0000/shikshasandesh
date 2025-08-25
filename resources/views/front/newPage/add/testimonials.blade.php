   <div class="container">
   <div class="testimonial-text-img">
            <img alt="" src="https://htmldemo.net/glaxdu/glaxdu/assets/img/icon-img/testi-text.png">
        </div>
<div class="testimonial-slider-wrap mt-40 pt-40 pb-40">
    <div class="testimonial-text-slider">
        @foreach ($testimonials as $testimonial)
            <div class="testi-content-wrap">
                <div class="testi-big-img">
                    <img alt="{{ $testimonial->name }}" src="{{ asset($testimonial->image) }}" loading="lazy">
                </div>
                <div class="row no-gutters">
                    <div class="ml-auto col-lg-6 col-md-12">
                        <div class="testi-content bg-img default-overlay"
                            style="background-image:url('{{ asset('assets/img/bg/testi.png') }}');">
                            <div class="quote-style quote-left">
                                <i class="fa fa-quote-left"></i>
                            </div>

                            <div>{!! $testimonial->long_des !!}</div>
                            <div class="testi-info">
                                <h5>{{ $testimonial->name }}</h5>
                                <span>{{ $testimonial->profission }}</span>
                            </div>
                            <div class="quote-style quote-right">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Testimonial Images Slider -->
    <div class="testimonial-image-slider">
        @foreach ($testimonials as $testimonial)
            <div class="sin-testi-image">
                <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" loading="lazy">
            </div>
        @endforeach
    </div>
</div>
</div>
