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

    /* Ensure header-area doesn't interfere with sticky behavior */
    .header-area {
        position: relative;
        overflow: visible;
    }

    /* Sticky Header Mid (logo + hamburger) */
    .header-mid {
        position: relative;
        top: 0;
        z-index: 1000;
        background: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    /* Class for fixed positioning when scrolled */
    .header-mid.sticky {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1200;
        background: #fff;
    }

    /* Ensure hamburger button is clickable */
    .mobile-menu-toggle {
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
        color: #333;
        z-index: 1300;
        /* Higher than header-mid to ensure clickability */
        position: relative;
        pointer-events: auto;
        /* Ensure clicks are registered */
    }

    /* Mobile Menu */
    .mobile-menu-area {
        display: none;
        width: 100%;
        background: #f8f8f8;
        position: relative;
        z-index: 1100;
        /* Below header-mid but above other content */
    }

    .mobile-menu-area nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mobile-menu-area nav ul li {
        border-bottom: 1px solid #eee;
    }

    .mobile-menu-area nav ul li a {
        display: block;
        padding: 12px 20px;
        color: #666666;
        font-weight: 500;
        text-decoration: none;
    }

    .mobile-menu-area nav ul li a:hover {
        background: #228C4A;
    }

    /* Active (open) menu */
    .mobile-menu-area.active {
        display: block;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .header-bottom {
            display: none;
        }

        .header-mid.sticky~.mobile-menu-area {
            margin-top: 71px;
            /* Offset for header-mid height (60px logo + 10px padding + 1px border) */
        }

        .mobile-menu-area.active {
            position: fixed;
            /* Fix menu below header-mid when open */
            top: 71px;
            /* Align below fixed header-mid */
            left: 0;
            right: 0;
        }
    }

    @media (max-width: 768px) {
        .logo img {
            max-height: 50px;
        }

        .header-mid.sticky~.mobile-menu-area {
            margin-top: 61px;
            /* Adjusted for smaller logo height (50px + 10px padding + 1px border) */
        }

        .mobile-menu-area.active {
            position: fixed;
            top: 61px;
            /* Adjusted for smaller header-mid height */
            left: 0;
            right: 0;
        }
    }
</style>

<header class="header-area">
    <!-- Header Top -->
    <div class="header-top bg-img" style="padding:5px;">
        <div class="container">
            <div class="row" style="justify-content: space-between;align-items: center">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8">
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
                <div class="col-lg-6 col-md-7 col-12 col-sm-8 d-flex justify-content-center">
                    <div class="header-social">
                        <ul class="d-flex" style="column-gap: 10px">
                            <li><a class="facebook"
                                    href="{{ str_starts_with($facebook, 'http') ? $facebook : 'https://' . $facebook }}"
                                    target="_blank"><i class="fa-brands fa-facebook" style="color: #3b5998;"></i></a>
                            </li>
                            <li><a class="youtube"
                                    href="{{ str_starts_with($youtube, 'http') ? $youtube : 'https://' . $youtube }}"
                                    target="_blank"><i class="fa-brands fa-youtube" style="color: #FF0000;"></i></a>
                            </li>
                            <li><a class="twitter"
                                    href="{{ str_starts_with($twitter, 'http') ? $twitter : 'https://' . $twitter }}"
                                    target="_blank"><i class="fa-brands fa-x-twitter" style="color: #1DA1F2;"></i></a>
                            </li>

                            <li><a class="instagram"
                                    href="{{ str_starts_with($instagram, 'http') ? $instagram : 'https://' . $instagram }}"
                                    target="_blank"><i class="fa-brands fa-instagram" style="color: #C13584;"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mid (Logo + Hamburger) -->
    <div class="header-mid d-flex justify-content-between align-items-center" style="background:#fff; padding:10px;">
        <a href="{{ route('index') }}">
            <div class="logo py-2">
                <img alt="Logo" src="{{ asset($logo) }}" class="img-fluid" style="max-height:60px;">
            </div>
        </a>

        <!-- Hamburger Button -->
        <button class="d-lg-none mobile-menu-toggle" id="mobile-menu-toggle" type="button"
            style="background:none; border:none; font-size:20px; cursor:pointer; padding:10px;">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Desktop Menu -->
    <div class="header-bottom sticky-bar clearfix d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('index') }}"> HOME </a></li>
                                    <li><a href="{{ route('events.list') }}">Events</a></li>
                                    <li><a href="{{ route('news.list') }}"> News </a></li>
                                    <li><a href="{{ route('achievements') }}"> Achievements </a></li>
                                    <li><a href="{{ route('notice') }}"> Notice </a></li>
                                    <li><a href="#"> COURSES </a>
                                        <ul class="submenu">
                                            @foreach ($courses as $course)
                                                <li><a
                                                        href="{{ route('course.show', ['id' => $course->id]) }}">{{ $course->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('downloads') }}"> download</a></li>
                                    <li><a href="{{ route('gallery') }}"> Gallery</a></li>
                                    <li><a href="{{ route('about') }}"> About us </a></li>
                                    <li><a href="{{ route('teachers.list') }}"> Teachers </a></li>
                                    <li><a href="{{ route('contact') }}"> CONTACT </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Below Logo) -->
    <div class="mobile-menu-area d-lg-none" id="mobile-menu-area">
        <div class="mobile-menu">
            <nav>
                <ul>
                    <li><a href="{{ route('index') }}"> HOME </a></li>
                    <li><a href="{{ route('events.list') }}">Events</a></li>
                    <li><a href="{{ route('news.list') }}"> News </a></li>
                    <li><a href="{{ route('achievements') }}"> Achievements </a></li>
                    <li><a href="{{ route('notice') }}"> Notice </a></li>
                    <li><a href="#"> COURSES </a>
                        <ul class="submenu">
                            @foreach ($courses as $course)
                                <li><a
                                        href="{{ route('course.show', ['id' => $course->id]) }}">{{ $course->name }}</a>
                                </li>
                            @endforeach
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
</header>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu-area');
            const headerMid = document.querySelector('.header-mid');
            const headerTop = document.querySelector('.header-top');

            // Mobile menu toggle
            toggleBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
            });
            toggleBtn.setAttribute('aria-expanded', mobileMenu.classList.contains('active'));
            toggleBtn.setAttribute('aria-label', mobileMenu.classList.contains('active') ? 'Close menu' :
                'Open menu');

            // Sticky header-mid on scroll for small devices
            if (window.innerWidth <= 992) {
                window.addEventListener('scroll', function() {
                    const headerTopHeight = headerTop.offsetHeight;
                    if (window.scrollY > headerTopHeight) {
                        headerMid.classList.add('sticky');
                    } else {
                        headerMid.classList.remove('sticky');
                    }
                });
            }
        });
    </script>
