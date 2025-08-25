<style>
    .single-event {
        height: 400px;
        /* Adjust the height as needed */
        overflow: hidden;
        background-color: #fff;
        /* Added to ensure the background is white */
        transition: all 0.3s ease;
        /* Added for smooth hover effects */
        margin-bottom: 10px;
        /* Added to ensure proper spacing */
    }

    .animated-link {
        display: inline-block;
        padding: 10px 24px;
        color: #333;
        font-weight: 500;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 2px solid #18ff03;
        border-radius: 4px;
    }

    .animated-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: #00b846;
        transition: all 0.4s ease;
        z-index: -1;
    }

    .animated-link:hover {
        color: white;
        background-color: green;
    }

    .animated-link:hover::before {
        left: 0;
    }

    .link-text {
        position: relative;
        z-index: 1;
    }

    .link-icon {
        position: relative;
        z-index: 1;
        margin-left: 8px;
        display: inline-block;
        transform: translateX(0);
        transition: transform 0.3s ease;
    }

    .animated-link:hover .link-icon {
        transform: translateX(5px);
    }

    .event-content {
        margin-top: 0;
        padding: 5px;
        height: 130px;
        overflow: hidden;
    }

    .event-content h3 {
        font-size: 18px;
        margin-bottom: 0;
        /* Changed from 10px to 0 */
        line-height: 1.3;
    }

    .event-meta-wrap {
        display: flex;
        flex-direction: column;
        padding: 10px 15px;
        border-top: 1px solid #eee;
    }

    .event-meta {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .event-meta i {
        margin-right: 8px;
        color: #00b846;
    }

    .event-date-wrap {
        position: absolute;
        top: 10px;
        background-color: #00b846;
        color: white;
        text-align: center;
        padding: 5px 10px;
        border-radius: 4px;
        max-width: 100px;
    }

    .event-date {
        font-size: 18px;
        font-weight: bold;
        display: block;
    }

    .section-title h2 span {
        color: #00b846;
    }

    .event-content p {
        margin-top: 2px;
        /* Add a very small top margin */
        margin-bottom: 0;
    }
</style>

<div class="event-area bg-img default-overlay pt-40 pb-40" style="background-image:url('{{ asset('img/bg.jpeg') }}');">
    <div class="container">
        <div class="section-title mb-75">
            <h2><span>Upcoming</span> Events</h2>
            {{-- <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p> --}}
        </div>

        <div class="row">
            @foreach ($events->take(4) as $event)
                <a href="{{ route('events.details', $event->id) }}">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-event event-white-bg">
                            <div class="event-img" style="height: 200px; overflow: hidden; position: relative;">
                                <!-- Use the image path from the database -->
                                <img src="{{ asset($event->feature_image) }}" alt="{{ $event->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">

                                <div class="event-date-wrap">
                                    <span class="event-date">{{ date('j', strtotime($event->start_date)) }}</span>
                                    <span>{{ date('M', strtotime($event->start_date)) }}</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <h3>{{ $event->title }}</h3>
                                <p>{{ $event->short_description }}</p>
                            </div>
                            <div class="event-meta-wrap">
                                <div class="event-meta">
                                    <i class="fa fa-location-arrow"></i>
                                    <span style="margin-left: 10px">{{ $event->venue }}</span>
                                </div>
                                <div class="event-meta">
                                    <i class="fa fa-clock"></i>
                                    <span style="margin-left: 10px">{{ date('h:i A', strtotime($event->start_time)) }} -
                                        {{ date('h:i A', strtotime($event->end_time)) }}</span>
                                </div>
                            </div>
                </a>
        </div>
    </div>
    @endforeach
</div>

<div style="text-align: center; margin-top: 20px;">
    <a href="{{ route('events.list') }}" class="animated-link">
        <span class="link-text">View more</span>
        <span class="link-icon">→</span>
    </a>
</div>
</div>
</div>
