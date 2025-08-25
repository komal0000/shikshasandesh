<div class="owl-carousel owl-theme owl-home">
    @foreach ($sliders as $slider)   
    @if ($slider->title=='' && $slider->subtitle=='')
        <div class="item">
            <img class="w-100 d-block d-md-none" src="{{asset($slider->mobile_image)}}">
            <img class="w-100 d-none d-md-block" src="{{asset($slider->image)}}">
        </div>
    @else

        <div class="item" style="--image:url('{{asset($slider->image)}}');--mobile-image:url('{{asset($slider->mobile_image)}}');" id="slider-{{$slider->id}}">
            <div class="inner">
                <h5>{{$slider->title}}</h5>
                <h6>{{$slider->subtitle}}</h6>
                <a style="color: {{$slider->fg}};background:{{$slider->bg}}" href="{{$slider->link}}">{{$slider->link_title}}</a>
            </div>
        </div>
    @endif 
    @endforeach

</div>