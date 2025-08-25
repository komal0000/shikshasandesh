@extends('admin.layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
    <style>
        .col-md-3, .col-md-6, .col-md-12 {
            margin-bottom: 10px;
        }

        label {
            font-weight: 600;
            font-size: 1.1rem;
            color: black;
            margin-top: 5px;
        }

        .form-control, .tox {
            border-radius: 5px !important;
        }
    </style>
@endsection

@section('page-option')
@endsection

@section('s-title')
    <li class="breadcrumb-item"><a href="{{ route('admin.setting.slider.index') }}">Sliders</a></li>
    <li class="breadcrumb-item">{{ $slider->title }}</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
    <div class="card shadow mb-3">
        <div class="card-body">
            <form action="{{ route('admin.setting.slider.edit', ['slider' => $slider->id]) }}"
                  method="post" enctype="multipart/form-data" id="edit-slider">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image"
                               class="form-control photo"
                               data-default-file="{{ asset($slider->image) }}">
                    </div>
                    <div class="col-md-3">
                        <label for="mobile_image">Mobile Image</label>
                        <input type="file" name="mobile_image" id="mobile_image"
                               class="form-control photo"
                               data-default-file="{{ asset($slider->mobile_image ?? $slider->image) }}">
                    </div>

                    <div class="col-md-12">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                               class="form-control" required value="{{ $slider->title }}">
                    </div>

                    <div class="col-md-12">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle"
                               class="form-control" required value="{{ $slider->subtitle }}">
                    </div>
                </div>

                {{-- Video Section --}}
                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="is_video">
                            <input type="checkbox" name="is_video" id="is_video"
                                   {{ $slider->is_video ? 'checked' : '' }}>
                            Is Video?
                        </label>
                    </div>
                    <div class="col-md-9 video-url-wrapper" style="{{ $slider->is_video ? '' : 'display: none;' }}">
                        <label for="video_url">YouTube Video URL</label>
                        <input type="text" name="video_url" id="video_url"
                               value="{{ $slider->video_url }}" class="form-control">
                    </div>
                </div>

                {{-- Button Settings --}}
                <div class="shadow mt-4">
                    <h5 class="p-3">Button Setting</h5>
                    <hr class="m-0">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="link_title">Button Text</label>
                                <input type="text" name="link_title" id="link_title"
                                       value="{{ $slider->link_title }}" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label for="link">Link URL</label>
                                <input type="text" name="link" id="link"
                                       value="{{ $slider->link }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-3">
                    <button class="btn btn-primary">Update Slider</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('.photo').dropify();

            $('#is_video').on('change', function () {
                if ($(this).is(':checked')) {
                    $('.video-url-wrapper').show();
                } else {
                    $('.video-url-wrapper').hide();
                }
            });
        });
    </script>
@endsection
