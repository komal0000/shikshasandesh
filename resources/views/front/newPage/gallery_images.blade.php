@extends('front.layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-area">
            <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
                style="background-image:url('');">
                <div class="container">
                    <h2><a href="{{ route('gallery') }}">Gallery</a> / {{ $galleryType->name }} </h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> Gallery
                            <i class="fa fa-angle-double-right"></i> {{ $galleryType->name }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row" id="gallery">
            @foreach ($galleryType->galleries as $i => $gallery)
                <div class="item col-md-3 col-6 mb-2" data-index="{{ $i++ }}">
                    <img class="w-100" data-fancybox="gallery" data-src="{{ asset($gallery->file) }}"
                        src="{{ asset($gallery->file) }}" alt="" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    <script>
        const galleryelem = document.querySelectorAll('.gallery .item img');
        var index = 0;

        $(document).ready(function() {
            window.onload = () => {
                console.log('ma');
                $('#gallery').masonry({
                    itemSelector: '.item',
                });
            };
        });
    </script>
@endsection
