@php
    $logo = getSetting('top_logo', true);
    $facebook = getSetting('social_Facebook', true);
    $twitter = getSetting('social_Twitter', true);
    $youtube = getSetting('social_Youtube', true);
    $instagram = getSetting('social_Instagram', true);
@endphp
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

@php
    $courses = \App\Models\Course::all() ?? [];
@endphp
<style>
    .header-social ul li a {
        display: inline-block;
        width: 28px;
        height: 28px;
        background-color: #fff;
        border-radius: 100%;
        text-align: center;
        line-height: 28px;
        font-size: 12px;
    }
</style>
<header class="header-area">
    <div class="header-top bg-img">
        <div class="container">
            <div class="row" style="justify-content: space-between;align-items: center">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8 ">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-phone"></i>
                                <span style="margin-left: 5px">
                                    <a href="tel:{{ $data->phone }}">{{ $data->phone }}</a>
                                </span>
                            </li>
                            <li><i class="fa fa-envelope"></i>
                                <span style="margin-left: 5px">
                                    <a href="mailto:{{ $data->email }}">{{ $data->email }}</a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div
                    class="col-lg-6 col-md-7 col-12 col-sm-8 d-flex justify-content-end justify-content-md-end justify-content-sm-center justify-content-center">
                    <div class="header-social">
                        <ul class="d-flex" style="column-gap: 10px ">
                            <li><a class="facebook"
                                    href="{{ str_starts_with($facebook, 'http') ? $facebook : 'https://' . $facebook }}"
                                    target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"
                                        style="color: #3b5998;"></i></a></li>
                            <li><a class="youtube"
                                    href="{{ str_starts_with($youtube, 'http') ? $youtube : 'https://' . $youtube }}"
                                    target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-youtube"
                                        style="color: #FF0000;"></i></a></li>
                            <li><a class="twitter"
                                    href="{{ str_starts_with($twitter, 'http') ? $twitter : 'https://' . $twitter }}"
                                    target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"
                                        style="color: #1DA1F2;"></i></a></li>
                            <li><a class="instagram"
                                    href="{{ str_starts_with($instagram, 'http') ? $instagram : 'https://' . $instagram }}"
                                    target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"
                                        style="color: #C13584;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid">
        <div class="container">
            <a href="{{ route('index') }}">
                <div class="logo py-2">
                    <img alt="Logo" src="{{ asset($logo) }}" class="img-fluid">
                </div>
            </a>
        </div>
    </div>
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('index') }}"> HOME </a>

                                    </li>
                                    <li><a href="{{ route('events.list') }}">Events</a></li>
                                    <li><a href="{{ route('news.list') }}"> News </a></li>
                                    <li><a href="{{ route('achievements') }}"> Achievements </a></li>
                                    <li><a href="{{ route('notice') }}"> Notice </a></li>

                                    <li><a href="#"> COURSES </a>
                                        <ul class="submenu">
                                            @if (isset($courses))
                                                @foreach ($courses as $course)
                                                    <li><a
                                                            href="{{ route('course.show', ['id' => $course->id]) }}">{{ $course->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                    </li>

                                    <li><a href="{{ route('downloads') }}"> download</a></li>
                                    <li><a href="{{ route('gallery') }}"> Gallery</a></li>

                                    <li><a href="{{ route('about') }}"> About us </a>
                                    </li>
                                    <li><a href="{{route('teachers.list')}}"> Teachers </a>
                                    <li><a href="{{ route('contact') }}"> CONTACT </a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-menu-area mt-3 d-lg-none">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active" style="background-color: #29AE6A">
                        <ul>
                            <li><a href="{{ route('index') }}"> HOME </a></li>
                            <li><a href="{{ route('events.list') }}">Events</a></li>
                            <li><a href="{{ route('news.list') }}"> News </a></li>
                            <li><a href="{{ route('achievements') }}"> Achievements </a></li>
                            <li><a href="{{ route('notice') }}"> Notice </a></li>
                            <li><a href="#"> COURSES </a>
                                <ul class="submenu">
                                    @if (isset($courses))
                                        @foreach ($courses as $course)
                                            <li><a href="{{ route('course.show', ['id' => $course->id]) }}">{{ $course->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li><a href="{{ route('downloads') }}"> download</a></li>
                            <li><a href="{{ route('gallery') }}"> Gallery</a></li>
                            <li><a href="{{ route('about') }}"> About us </a></li>
                            <li><a href="{{ route('contact') }}"> CONTACT </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
