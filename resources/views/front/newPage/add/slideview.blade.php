<div class="slider-area" style="height: 80vh;">
    <div class="slider-active owl-carousel">
        @foreach ($sliders as $slider)
            <div class="single-slider slider-height-1 bg-img" data-desktop="{{ asset($slider->image) }}"
                data-mobile="{{ asset($slider->mobile_image) }}"
                style="position: relative;
                       background-image: url('{{ asset($slider->image) }}');
                       height: 80vh;
                       background-size: cover;
                       background-position: center;">

                {{-- Play button for video --}}
                @if (!empty($slider->is_video) && !empty($slider->video_url))
                    <button class="slider-play-button" onclick="openVideoModal('{{ $slider->video_url }}')">▶</button>
                @endif

                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-7 col-12">
                            <div class="slider-content slider-animated-1">
                                <h1 class="animated fadeInUp">{{ $slider->title }}</h1>
                                <p class="animated fadeInUp delay-1s">{{ $slider->subtitle }}</p>
                                <div class="slider-btn">
                                    @if (!empty($slider->link) && !empty($slider->link_title))
                                        <a href="{{ $slider->link }}" class="btn btn-primary">
                                            {{ $slider->link_title }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>

{{-- Video Modal --}}
<div id="videoModal" class="video-modal">
    <div class="video-modal-content" onclick="event.stopPropagation();">
        <button class="video-modal-close" onclick="closeVideoModal()">✖</button>
        <div class="video-responsive">
            <iframe id="videoIframe" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>



{{-- Custom Navigation (Uncomment if needed) --}}
{{--
<div class="slider-navigation">
    <button class="slider-prev" aria-label="Previous Slide">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="slider-next" aria-label="Next Slide">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>
--}}


@section('js')
    <script>
        // Adjust background images per screen size
        function updateSliderImages() {
            const isMobile = window.innerWidth <= 768;
            document.querySelectorAll('.single-slider').forEach(slide => {
                const mobileImg = slide.dataset.mobile;
                const desktopImg = slide.dataset.desktop;
                slide.style.backgroundImage = `url('${isMobile ? mobileImg : desktopImg}')`;
            });
        }

        window.addEventListener('resize', updateSliderImages);
        window.addEventListener('DOMContentLoaded', updateSliderImages);

        // Video modal logic
        function openVideoModal(videoUrl) {
            let embedUrl = "";

            if (videoUrl.includes('youtube.com/watch?v=')) {
                let videoId = videoUrl.split('v=')[1].split('&')[0];
                embedUrl = `https://www.youtube.com/embed/${videoId}`;
            } else if (videoUrl.includes('youtu.be/')) {
                let videoId = videoUrl.split('youtu.be/')[1].split('?')[0];
                embedUrl = `https://www.youtube.com/embed/${videoId}`;
            } else {
                embedUrl = videoUrl;
            }

            const iframe = document.getElementById('videoIframe');
            iframe.src = embedUrl + '?autoplay=1';
            document.getElementById('videoModal').style.display = 'flex';
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('videoIframe');
            iframe.src = ''; // stop video
            modal.style.display = 'none';
        }

        // Close modal if click outside content
        document.getElementById('videoModal').addEventListener('click', function() {
            closeVideoModal();
        });
    </script>
@endsection

@section('css')
    <style>
        .slider-play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 64px;
            color: white;
            background: rgba(0, 0, 0, 0.4);
            border: none;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            line-height: 80px;
            text-align: center;
            cursor: pointer;
            z-index: 10;
        }

        .slider-play-button:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        .video-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
        }

        .video-modal-content {
            position: relative;
            width: 90%;
            max-width: 900px;
        }

        .video-responsive {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .video-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            cursor: pointer;
            z-index: 10000;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
        }
    </style>
@endsection
