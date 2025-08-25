@extends('front.layout.app')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95" style="background-image:url('');">
            <div class="container">
                <h2>News / {{ $news->title }} </h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> News
                            <i class="fa fa-angle-double-right"></i> {{ $news->title }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Left Section: News Details -->
            <div class="col-lg-8">
                <div class="single-event event-white-bg shadow p-3 mb-4 bg-white rounded">
                    <div class="event-img">
                        <img src="{{ asset($news->feature_image) }}" alt="{{ $news->title }}" class="img-fluid w-100" loading="lazy">
                        <div class="event-date-wrap">
                            <span class="event-date">{{ date('j', strtotime($news->created_at)) }}</span>
                            <span>{{ date('M', strtotime($news->created_at)) }}</span>
                        </div>
                    </div>
                    <div class="event-content p-3">
                        <h3>{{ $news->title }}</h3>
                        <div>
                            {!! $news->extra_content !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Other News -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="mb-3" align="center">Other News</h3>
                    @foreach ($otherNews as $item)
                        <div class="sidebar-news-item d-flex mb-3 border p-3 rounded">
                            <a href="{{ route('news.details', $item->id) }}" class="flex-shrink-0 me-3">
                                <img src="{{ asset($item->feature_image) }}" alt="{{ $item->title }}" class="img-fluid"
                                    style="width: 80px; height: 80px; object-fit: cover;" loading="lazy">
                            </a>
                            <div class="ms-2 p-3">
                                <h5><a href="{{ route('news.details', $item->id) }}"
                                        class="text-dark">{{ $item->title }}</a></h5>
                                <p class="small text-muted">{{ Str::limit($item->short_content, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
