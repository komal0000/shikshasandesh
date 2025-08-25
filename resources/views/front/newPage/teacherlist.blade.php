@extends('front.layout.app')

@section('content')
<style>
    .teacher-area .custom-col-5 {
        padding: 15px;
    }

    .teacher-img img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .teacher-content-visible {
        text-align: center;
        padding: 10px;
        background: #f8f9fa;
        border-radius: 5px;
    }

    .teacher-content-wrap {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 15px;
        border-radius: 8px;
    }

    .single-teacher:hover .teacher-content-wrap {
        display: flex;
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

    .search-box button:hover {
        background-color: #0056b3;
    }
</style>

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
        style="background-image:url('{{ asset('path/to/your-image.jpg') }}');">
        <div class="container">
            <h2>Home / Teachers</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="#">Home</a>
                    <span><i class="fa fa-angle-double-right"></i> Teachers</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="teacher-area pt-40 pb-40">
    <div class="container">

        <!-- Search Box -->
        <div class="search-box">
            <form method="GET" action="{{ route('teachers.list') }}">
                <input type="text" name="search" placeholder="Search teachers..." value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="custom-row">
            @if($teachers->count() > 0)
                @foreach ($teachers as $teacher)
                    <div class="custom-col-5">
                        <div class="single-teacher mb-10 position-relative">
                            <div class="teacher-img">
                                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}" loading="lazy">
                            </div>
                            <div class="teacher-content-visible">
                                <h4>{{ $teacher->name }}</h4>
                                <h5>{{ $teacher->deg }}</h5>
                            </div>
                            <div class="teacher-content-wrap">
                                <div class="teacher-content">
                                    <h4>{{ $teacher->name }}</h4>
                                    <h5>{{ $teacher->deg }}</h5>
                                    <p>{{ $teacher->short_des }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No teachers found. Try a different search.</p>
            @endif
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $teachers->links() }}
        </div>

    </div>
</div>

@endsection
