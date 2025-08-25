@extends('front.layout.app')
@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
        style="background-image:url('');">
        <div class="container">
            <h2>Home / Downloads </h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                    <span>
                        <i class="fa fa-angle-double-right"></i> Downloads
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
    <div class="container">

        <!-- Search form -->
        <div class="mb-4 d-flex justify-content-end" style="margin-top: 20px;">
            <form method="GET" action="{{ route('downloads') }}" class="d-flex">
            <input type="text" name="search" placeholder="Search Downloads" class="form-control me-2"
            style="max-width: 300px;" />
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; padding: 0.5rem 1rem; font-size: 1rem;">
            <i class="fa fa-search"></i> Search
            </button>
            </form>
        </div>

        <!-- Display Downloads -->
        @if (count($downloads) > 0)
            <ul class="list-group">
            @foreach ($downloads as $download)
                <li class="list-group-item d-flex justify-content-between align-items-center shadow-sm"
                style="border: 1px solid #ddd; margin-bottom: 10px;">
                <div>
                    <h5 class="mb-1 font-weight-bold">{{ $download->title }}</h5>
                    {{-- <p class="mb-1">{{ $download->description }}</p> --}}
                </div>
                <a href="{{ asset($download->file_path) }}" class="btn btn-primary" download >Download</a>
                </li>
            @endforeach
            </ul>
        @else
            <div class="alert alert-info text-center">
                No downloads available.
            </div>
        @endif
    </div>
@endsection
