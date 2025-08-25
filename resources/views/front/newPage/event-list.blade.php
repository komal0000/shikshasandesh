@extends('front.layout.app')

@section('content')
 <style>
    .single-event {
        height: 400px;
        overflow: hidden;
    }

    .search-box {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .search-box input {
        width: 250px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .search-box button {
        padding: 8px 12px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        margin-left: 5px;
    }
</style>
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
        style="background-image:url('');">
        <div class="container">
            <h2>Home / Events</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                    <span>
                        <i class="fa fa-angle-double-right"></i> Events
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="event-area bg-img default-overlay pt-40 pb-40"
    style="background-image:url('https://images.pexels.com/photos/1029577/pexels-photo-1029577.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
    <div class="container">

       <!-- Search Box -->
       <div class="search-box">
        <form method="GET" action="{{ route('events.list') }}">
            <input type="text" name="search" placeholder="Search events..."
                   value="{{ request()->query('search') }}">
            <button type="submit">Search</button>
        </form>
    </div>

        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('events.details', $event->id) }}">
                        <div class="single-event event-white-bg">
                            <div class="event-img" style="height: 200px; overflow: hidden;">
                                <img src="{{ asset($event->feature_image) }}" alt="{{ $event->title }}"
                                    style="height: 100%; object-fit: cover;">
                                <div class="event-date-wrap">
                                    <span class="event-date">{{ date('j', strtotime($event->start_date)) }}</span>
                                    <span>{{ date('M', strtotime($event->start_date)) }}</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <h3>{{ $event->title }}</h3>
                                <p>{{ Str::limit($event->short_description, 100) }}</p>
                                <div class="event-meta-wrap">
                                    <div class="event-meta">
                                        <i class="fa fa-location-arrow"></i>
                                        <span>{{ $event->venue }}</span>
                                    </div>
                                    <div class="event-meta">
                                        <i class="fa fa-clock"></i>
                                        <span>{{ date('h:i A', strtotime($event->start_time)) }} -
                                              {{ date('h:i A', strtotime($event->end_time)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
{{--
        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $events->links() }}
        </div> --}}
    </div>
</div>

@endsection
