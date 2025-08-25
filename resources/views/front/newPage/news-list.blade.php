@extends('front.layout.app')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95">
            <div class="container">
                <h2>Home / News</h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                        <span>
                            <i class="fa fa-angle-double-right"></i> News
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area bg-img default-overlay pt-40 pb-40">
        <div class="container">

            <!-- Search haleko -->
            <div class="row mb-4">
                <div class="col-md-4 offset-md-8">
                    <form method="GET" action="{{ route('news.list') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search news..."
                                value="{{ request()->query('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- News List -->

            <div class="row">
                @foreach ($news as $item)
                    <div class="col-lg-3 col-md-4 mb-30">
                        <div class="single-blog" style="height: 100%; display: flex; flex-direction: column;">
                            <div class="blog-img" style="flex: 1;">
                                <a href="{{ route('news.details', $item->id) }}">
                                    <img src="{{ asset($item->feature_image) }}" alt="{{ $item->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                                </a>
                            </div>
                            <div class="blog-content-wrap"
                                style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                                <div class="blog-content">
                                    <h4><a href="{{ route('news.details', $item->id) }}">{{ $item->title }}</a>
                                    </h4>
                                    <p>{{ Str::limit($item->short_content, 100) }}</p>
                                </div>
                                <div class="blog-date">
                                    <a href="#"><i class="fas fa-calendar-alt"></i>
                                        {{ date('M, jS Y', strtotime($item->created_at)) }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrap mt-4">
                {{ $news->links() }}
            </div>

        </div>
    </div>
@endsection
