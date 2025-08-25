@extends('front.layout.app')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url('');">
            <div class="container">
                <h2>Events / {{ $event->title }} </h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> Event
                            <i class="fa fa-angle-double-right"></i> {{ $event->title }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Left Section: Event Details -->
            <div class="col-lg-8">
                <div class="single-event event-white-bg shadow p-3 mb-4 bg-white rounded">
                    <div class="event-img">
                        <img src="{{ asset($event->feature_image ?? 'default-image.jpg') }}" alt="{{ $event->title }}" class="img-fluid w-100" loading="lazy">
                        <div class="event-date-wrap">
                            <span class="event-date">{{ date('j', strtotime($event->start_date ?? 'now')) }}</span>
                            <span>{{ date('M', strtotime($event->start_date ?? 'now')) }}</span>
                        </div>
                    </div>
                    <div class="event-content p-3">
                        <h3>{{ $event->title }}</h3>
                        <div class="event-meta-wrap mt-3">
                            <div class="event-meta"><i class="fa fa-location-arrow"></i> <span>{{ $event->venue }}</span></div>
                            <div class="event-meta"><i class="fa fa-calendar"></i>
                                <span>{{ date('F j, Y', strtotime($event->start_date ?? 'now')) }} -
                                    {{ date('F j, Y', strtotime($event->end_date ?? 'now')) }}</span>
                            </div>
                            <div class="event-meta"><i class="fa fa-clock"></i>
                                <span>{{ date('h:i A', strtotime($event->start_time ?? 'now')) }} -
                                    {{ date('h:i A', strtotime($event->end_time ?? 'now')) }}</span>
                            </div>
                        </div>
                        <div>{!! $event->long_description !!}</div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Latest Events Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="mb-3 text-center">Other Events</h3>
                    @foreach ($showother->where('id', '!=', $event->id ?? 0) as $other)
                        <div class="sidebar-news-item d-flex mb-3 border p-3 rounded">
                            <a href="{{ route('events.details', $other->id) }}" class="flex-shrink-0 me-3">
                                <img src="{{ asset($other->feature_image) }}" alt="{{ $other->title }}" class="img-fluid"
                                    style="width: 80px; height: 80px; object-fit: cover;" loading="lazy">
                            </a>
                            <div class="ms-2 p-3">
                                <h5><a href="{{ route('events.details', $other->id) }}" class="text-dark">{{ $other->title }}</a></h5>
                                <p class="small text-muted">{{ Str::limit($other->short_description, 50) }}</p>
                                <div class="event-meta">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{ date('F j, Y', strtotime($other->start_date)) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
