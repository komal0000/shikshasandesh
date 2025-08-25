@extends('front.layout.app')
@php
    $data =
        getSetting('contact') ??
        (object) [
            'map' => '',
            'email' => '',
            'phone' => '',
            'addr' => '',
            'others' => [],
        ];
@endphp
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <style>
        .contact-item {
            margin-bottom: 30px;
        }

        .contact-icon.circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            font-size: 2rem;
        }

        .contact-info {
            margin-top: 10px;
        }

        .contact-label {
            font-weight: bold;
            margin-bottom: 5px;
            color: white
        }

        .contact-value {
            margin: 0;
            color: white
        }
    </style>
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url('');">
            <div class="container">
                <h2>Home / Contact Us </h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> Contact Us
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-area pt-130 pb-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="contact-map mr-70">
                        <iframe src="https://maps.google.com/maps?q={{ $data->map }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" height="300px" width="100%" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-form">
                        <div class="contact-title mb-45">
                            <h2>Stay <span>Connected</span></h2>
                            <p>{{ $data->description ?? 'Feel free to reach out to us!' }}</p>
                        </div>
                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="first_name" placeholder="First Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="last_name" placeholder="Last Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="phone" placeholder="Phone" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="email" placeholder="Email" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-style">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <button class="submit default-btn" type="submit">SUBMIT NOW</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-info-area bg-img pt-60 pb-60 default-overlay"
        style="background-image:url('https://htmldemo.net/glaxdu/glaxdu/assets/img/bg/contact-info.jpg');">
        <div class="container">
            <div class="row">
                <!-- Address -->
                <div class="col-lg-4 col-md-4 col-12 text-center">
                    <div class="contact-item">
                        <div
                            class="contact-icon circle bg-primary mx-auto d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-location-dot text-white"></i>
                        </div>
                        <h6 class="contact-label mt-2">Address</h6>
                        <p class="contact-value">{{ $data->addr ?? 'No address available' }}</p>
                    </div>
                </div>
                <!-- Phone -->
                <div class="col-lg-4 col-md-4 col-12 text-center">
                    <div class="contact-item">
                        <div
                            class="contact-icon circle bg-success mx-auto d-flex align-items-center justify-content-center">
                            <i class="fa fa-phone text-white"></i>
                        </div>
                        <h6 class="contact-label mt-2">Phone</h6>
                        <p class="contact-value">{{ $data->phone ?? 'No phone number available' }}</p>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-lg-4 col-md-4 col-12 text-center">
                    <div class="contact-item">
                        <div class="contact-icon circle bg-danger mx-auto d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-envelope text-white"></i>
                        </div>
                        <h6 class="contact-label mt-2">Email</h6>
                        <p class="contact-value">
                            <a href="mailto:{{ $data->email ?? 'No email available' }}"
                                class="text-decoration-none text-white">
                                {{ $data->email ?? 'No email available' }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
