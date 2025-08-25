<div class="page-sidebar">
    <div class="logo-box">
        <a href="#" class="logo-text">{{ env('APP_NAME', '') }}</a>
        <a href="#" id="sidebar-close"><i class="material-icons">close</i></a>
        <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a>
    </div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu" id="accordion-menu">

            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="material-icons">dashboard</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.setting.gallery.type.index') }}">
                    <i class="material-icons">collections</i>
                    Gallery
                </a>
            </li>
            <li>
                <a href="{{ route('admin.achievements.index') }}">
                    <i class="material-icons">emoji_events</i>
                    Achievements
                </a>
            </li>
            <li>
                <a href="{{ route('admin.registration.index') }}">
                    <i class="material-icons">mail</i>
                    Messages
                </a>
            </li>

            <li>
                <a href="{{ route('admin.course.index') }}">
                    <i class="material-icons">subject</i>
                    Course
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}">
                    <i class="material-icons">article</i>
                    News
                </a>
            </li>
            <li>
                <a href="{{ route('admin.events.index') }}">
                    <i class="material-icons">event</i>
                    Events
                </a>
            </li>
            {{-- <li class="menu-item">
                <a href="{{ route('admin.aboutusindex') }}">
                    <i class="icon fa fa-info-circle"></i>
                    <span>About Us</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin.downloads.index') }}">
                    <i class="material-icons">cloud_download</i>
                    Downloads
                </a>
            </li>
            <li>
                <a href="{{ route('admin.teacher.index') }}">
                    <i class="material-icons">wc</i>
                    Teacher
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.add.index') }}">
                    <i class="fas fa-plus-circle"></i> Home Achievements
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.add.facility') }}">
                    <i class="fas fa-building"></i> Facilities
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonial.index') }}">
                    <i class="material-icons">comment</i>
                    Testimonial
                </a>
            </li>
            <!-- Add the Facility section here -->
            {{-- <a href="{{ route('admin.facility_achievement.index') }}">
                <i class="material-icons">business</i>
                Facilities
            </a> --}}
            <!-- Add the Notice section here -->
            <li>
                <a href="{{ route('admin.notice.index') }}">
                    <i class="material-icons">announcement</i>
                    Notices
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="material-icons">settings</i>
                    Front Setting
                    <i class="material-icons has-sub-menu">add</i>
                </a>
                <ul class="sub-menu">
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.meta') }}">Sharing</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.homepage') }}">HomePage</a>
                    </li>
                    <li class="sub-item">
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.contact') }}">Contact</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.faq.index') }}">Faqs</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.index', ['type' => 'top']) }}">Header</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.index', ['type' => 'about']) }}">About</a>
                    </li>
                    {{-- <li class="sub-item">
                        <a href="{{ route('admin.setting.index', ['type' => 'contact']) }}">Contact</a>
                    </li> --}}
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.index', ['type' => 'social']) }}">Social</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.slider.index') }}">Sliders</a>
                    </li>
                    <li class="sub-item">
                        <a href="{{ route('admin.setting.popup.index') }}">Popups</a>
                    </li>
                </ul>
            </li>
        </ul>
        <br>
        <br>
    </div>
</div>
