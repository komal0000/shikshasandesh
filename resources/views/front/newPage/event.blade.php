@extends('front.layout.app')
@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url('https://images.unsplash.com/photo-1503428593586-e225b39bddfe?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="container">
                <h2>Event Details</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a> <span><i class="fa fa-angle-double-right"></i>Event Details</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-details-area pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="event-left-wrap mr-40">
                        <div class="event-description">
                            <div class="description-date-social mb-45">
                                <div class="description-date-time">
                                    <div class="description-date">
                                        <span class="event-date">1st</span>
                                        <span>Dec</span>
                                    </div>
                                    <div class="description-meta-wrap">
                                        <div class="description-meta">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>Mascot Plaza ,Uttara</span>
                                        </div>
                                        <div class="description-meta">
                                            <i class="fa-solid fa-clock"></i>
                                            <span>10:30 am</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="description-social-wrap">
                                    <div class="description-social">
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a>
                                            </li>
                                            <li><a class="instagram" href="#"><i
                                                        class="fa-brands fa-instagram"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <li><a class="google" href="#"><i class="fa-brands fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="description-btn">
                                        <a href="#"><i class="fa fa-share-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/event/event-details.jpg"
                                alt="">
                            <h3>Lorem ipsum doloeiusmod tempor incididunt ut labore et dolore magnnisi ut aliquip ex ea
                                commodo consequ.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dorepre enderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed
                                ut perspiciatis unde omnis iste natus error sit voluptatem accu antium dolorem laudantium,
                                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                                vitae dicta sunt explicabo. Nemo en ipsam voluptatem quia voluptas sit aspernatur aut odit
                                aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem snesciunt. Neque
                                porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                                quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="event-gallery text-center mt-40">
                                <div class="event-gallery-active nav-style-3 owl-carousel">
                                    <img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/event/event-gallery-2.jpg"
                                        alt="">
                                    <img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/event/event-gallery-1.jpg"
                                        alt="">
                                </div>
                                <h4>View Our Event Gallery</h4>
                            </div>
                            <div class="seat-book-wrap bg-img mt-80 "
                                style="background-image:url('	https://htmldemo.net/glaxdu/glaxdu/assets/img/event/seat-book.jpg')">
                                <div class="seat-book-title text-center">
                                    <h3>Book Your Seat Now</h3>
                                    <p> natus error sit voluptatem accu antium dolorem laudantium, totam rem aperiam, eaque
                                        entore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                                <div class="seat-book-form">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Name" type="text">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Email" type="email">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input name="name" placeholder="Date" type="text">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input placeholder="Time" type="text">
                                            </div>
                                            <div class="col-lg-12">
                                                <textarea placeholder="Message"></textarea>
                                                <button class="seat-book-btn" type="submit">BOOK NOW</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="location-area mt-80">
                                <div id="location"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">
                        <div class="sidebar-search mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Search</h4>
                            </div>
                            <form>
                                <input type="text" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-about mb-40">
                            <div class="sidebar-title mb-15">
                                <h4>About Us</h4>
                            </div>
                            <p>quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolors eos qui
                                ratione voluptatem sad.</p>
                            <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/banner/banner-4.jpg" alt=""></a>
                            <div class="sidebar-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a class="google" href="#"><i class="fa-brands fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-recent-post mb-35">
                            <div class="sidebar-title mb-40">
                                <h4>Recent Post</h4>
                            </div>
                            <div class="recent-post-wrap">
                                <div class="single-recent-post">
                                    <div class="recent-post-img">
                                        <a href="#"><img src="https://htmldemo.net/glaxdu/glaxdu/assets/img/blog/recent-post-1.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="recent-post-content">
                                        <h5><a href="#">Blog title will be here.</a></h5>
                                        <span>Blog Category</span>
                                        <p>Datat non proident qui offici.hafw adec qart.</p>
                                    </div>
                                </div>
                                <div class="single-recent-post">
                                    <div class="recent-post-img">
                                        <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/blog/recent-post-2.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="recent-post-content">
                                        <h5><a href="#">Blog title will be here.</a></h5>
                                        <span>Blog Category</span>
                                        <p>Datat non proident qui offici.hafw adec qart.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-category mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Course Category</h4>
                            </div>
                            <div class="category-list">
                                <ul>
                                    <li><a href="#">MBA <span>04</span></a></li>
                                    <li><a href="#">Graduate <span>08</span></a></li>
                                    <li><a href="#">Under Graduate <span>04</span></a></li>
                                    <li><a href="#">BBA <span>06</span></a></li>
                                    <li><a href="#">Engineering <span>04</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-recent-course-wrap mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Recent Courses</h4>
                            </div>
                            <div class="sidebar-recent-course">
                                <div class="sin-sidebar-recent-course">
                                    <div class="sidebar-recent-course-img">
                                        <a href="#"><img src="https://htmldemo.net/glaxdu/glaxdu/assets/img/blog/recent-post-1.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="sidebar-recent-course-content">
                                        <h4><a href="#">Course Title</a></h4>
                                        <ul>
                                            <li>Credits : 125</li>
                                            <li class="duration-color">Duration : 4yrs</li>
                                        </ul>
                                        <p>Datat non proident qui offici.hafw adec qart.</p>
                                    </div>
                                </div>
                                <div class="sin-sidebar-recent-course">
                                    <div class="sidebar-recent-course-img">
                                        <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/blog/recent-post-2.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="sidebar-recent-course-content">
                                        <h4><a href="#">Course Title</a></h4>
                                        <ul>
                                            <li>Credits : 125</li>
                                            <li class="duration-color">Duration : 4yrs</li>
                                        </ul>
                                        <p>Datat non proident qui offici.hafw adec qart.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-tag-wrap">
                            <div class="sidebar-title mb-40">
                                <h4>Tag</h4>
                            </div>
                            <div class="sidebar-tag">
                                <ul>
                                    <li><a href="#">Loremsite</a></li>
                                    <li><a href="#">Loreipsum</a></li>
                                    <li><a href="#">Dolar</a></li>
                                    <li><a href="#">Site ament dollar</a></li>
                                    <li><a href="#">Loremsite</a></li>
                                    <li><a href="#">Dummy Text</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pt-130 pb-130">
        <div class="container">
            <div class="brand-logo-active owl-carousel">
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
                <div class="single-brand-logo">
                    <a href="#"><img src="	https://htmldemo.net/glaxdu/glaxdu/assets/img/brand-logo/1.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script>
        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                center: new google.maps.LatLng(40.709896, -73.995481),
                styles: [{
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "weight": "2.00"
                        }]
                    },
                    {
                        "featureType": "all",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                            "color": "#9c9c9c"
                        }]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text",
                        "stylers": [{
                            "visibility": "on"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    },
                    {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#eeeeee"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#7b7b7b"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                                "color": "#46bcec"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                            "color": "#c8d7d4"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#070707"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                            "color": "#ffffff"
                        }]
                    }
                ]
            };
            var mapElement = document.getElementById('location');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.709896, -73.995481),
                map: map,
                icon: 'assets/img/icon-img/2.png',
                animation: google.maps.Animation.BOUNCE,
                title: 'Snazzy!'
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endsection



 