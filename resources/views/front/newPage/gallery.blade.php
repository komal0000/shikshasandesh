@extends('front.newPage.app')
@section('b-items')
    <li class="breadcrumb-item active" aria-current="page">
        Gallery
    </li>
@endsection
@section('meta')
@endsection
@section('pagecss')
    <style>
        .singlegallery {
            background: #f0f1fc;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
        }

        .singlegallery:hover {
            transform: scale(1.05);
        }

        .singlegallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease-in-out;
        }

        .singlegallery:hover img {
            transform: scale(1.1);
        }

        .singlegallery .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.2);
            color: white;
            font-weight: 600;
            font-size: 20px;
            display: none;
        }

        .singlegallery:hover .overlay {
            display: flex;
        }

        .singlegallery .overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 5px 0;
        }
    </style>
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
        style="background-image:url('');">
        <div class="container">
            <h2>Home / Gallery </h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                    <span>
                        <i class="fa fa-angle-double-right"></i> Gallery
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
    <div class="container mt-5">
        <div class="row">
            @foreach ($galleryTypes as $galleryType)
                <div class="col-md-3 col-6 mb-4">
                    <a href="{{ route('gallery.show', $galleryType->id) }}" class="text-decoration-none">
                        <div class="singlegallery">
                            <img src="{{ asset($galleryType->icon ?? 'default.jpg') }}" alt="{{ $galleryType->name }}" loading="lazy">
                            <div class="overlay">
                                {{ $galleryType->name }}
                            </div>
                        </div>
                        <h5 class="text-center mt-2 mb-0 text-dark">{{ $galleryType->name }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
