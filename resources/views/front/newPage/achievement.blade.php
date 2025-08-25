@extends('front.layout.app')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url('');">
            <div class="container">
                <h2>Home / Achievement </h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> Achievement
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center" style="padding-bottom:40px">Achievements</h2>
        <div class="row" style="padding-bottom: 40px">
            @foreach ($achievements as $achievement)
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

    <style>
        .custom-card {
            height: 100%;
            /* Make the card take full height */
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
            /* Adjust the image height as needed */
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
@endsection
