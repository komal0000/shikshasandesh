@extends('admin.layout.app')
@section('css')
    <style>
        .btn-preview {
            background: #ffb606;
            border-radius: 5px;
            color: #fff !important;
            font-size: 16px;
            font-weight: 700;
            padding: 16px 29px;
            text-transform: uppercase;
            text-decoration: none;
            transition: color .3s ease 0s;
        }

        .play-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            text-align: center;
            line-height: 80px;
            cursor: pointer;
        }

        .video-thumbnail-wrapper {
            position: relative;
        }
    </style>
@endsection

@section('page-option')
    <a class="btn btn-primary" href="{{ route('admin.setting.slider.add') }}">
        Add New Slider
    </a>
@endsection

@section('s-title')
    <li class="breadcrumb-item">Sliders</li>
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-body">
            @foreach ($sliders as $slider)
                <div class="shadow mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h4>Desktop Image (Thumbnail if video)</h4>
                                <div style="max-height: 200px; overflow-y: auto" class="video-thumbnail-wrapper">
                                    <img src="{{ asset($slider->image) }}" alt="" class="w-100">
                                    {{-- @if ($slider->is_video && $slider->video_url)
                                        <button class="play-overlay" onclick="openVideoModal('{{ $slider->video_url }}')">▶</button>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Mobile Image (Thumbnail)</h4>
                                <div style="max-height: 200px; overflow-y: auto">
                                    <img src="{{ asset($slider->mobile_image) }}" alt="" class="w-100">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h4>Title</h4>
                            {{ $slider->title }}
                        </div>
                        <hr>
                        <div>
                            <h4>SubTitle</h4>
                            {{ $slider->subtitle }}
                        </div>
                        <hr>

                        @if ($slider->is_video)
                            <div class="mb-3">
                                <h4>Video</h4>
                                <strong>Status:</strong> Yes <br>
                                <strong>URL:</strong> <a href="{{ $slider->video_url }}" target="_blank">{{ $slider->video_url }}</a>
                            </div>
                        @else
                            <div class="mb-3">
                                <h4>Video</h4>
                                <strong>Status:</strong> No
                            </div>
                        @endif

                        <hr>
                        <div>
                            <h4>Link Button</h4>
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Text</strong> <br>
                                    <span>{{ $slider->link_title }}</span>
                                </div>
                                <div class="col-md-4">
                                    <strong>Link</strong> <br>
                                    <span>{{ $slider->link }}</span>
                                </div>
                                <div class="col-md-5">
                                    {{-- <strong>Preview : </strong>
                                    <a href="{{ $slider->link }}" class="btn-preview" target="_blank">
                                        {{ $slider->link_title }}
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="py-2">
                            <a href="{{ route('admin.setting.slider.edit', ['slider' => $slider->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('admin.setting.slider.del', ['slider' => $slider->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal to show video preview --}}
    <div id="videoModal" style="display:none; position: fixed; top:0; left:0; width:100%; height:100%;
        background: rgba(0,0,0,0.85); justify-content: center; align-items: center; z-index: 9999;">
        <div style="position: relative; width: 90%; max-width: 900px;">
            <button onclick="closeVideoModal()" style="position: absolute; top: -40px; right: 0;
                font-size: 30px; background: none; border: none; color: white; cursor: pointer;">✖</button>
            <iframe id="videoIframe" width="100%" height="500" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function openVideoModal(videoUrl) {
            let embedUrl = videoUrl.includes('youtube.com')
                ? videoUrl.replace('watch?v=', 'embed/')
                : videoUrl;
            document.getElementById('videoIframe').src = embedUrl + '?autoplay=1';
            document.getElementById('videoModal').style.display = 'flex';
        }

        function closeVideoModal() {
            document.getElementById('videoModal').style.display = 'none';
            document.getElementById('videoIframe').src = '';
        }
    </script>
@endsection
