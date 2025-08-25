@extends('admin.layout.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection

@section('s-title')
    <li class="breadcrumb-item active">Facility & Achievement</li>
@endsection

@section('content')
    <div class="p-3 shadow bg-white">
        <h3>Facility & Achievement Bar</h3>

        <!-- Facility Section -->
        <h4>Facility</h4>
        <form action="{{ route('facility_achievement.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  <!-- Update method -->
            <input type="hidden" name="type" value="facility">

            <div class="row">
                @foreach ($facilities as $index => $facility)
                    <div class="col-md-3">
                        <h5>Set {{ $index + 1 }}</h5>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title[{{ $index }}]" class="form-control" value="{{ $facility->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image[{{ $index }}]" class="form-control dropify" data-default-file="{{ asset('storage/'.$facility->image) }}">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description[{{ $index }}]" class="form-control" required>{{ $facility->description }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update Facilities</button>
        </form>

        <hr>

        <!-- Achievement Section -->
        <h4>Our Achievements</h4>
        <form action="{{ route('admin.facility_achievement.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  <!-- Update method -->
            <input type="hidden" name="type" value="achievement">

            <div class="row">
                @foreach ($achievements as $index => $achievement)
                    <div class="col-md-3">
                        <h5>Set {{ $index + 1 }}</h5>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title[{{ $index }}]" class="form-control" value="{{ $achievement->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image[{{ $index }}]" class="form-control dropify" data-default-file="{{ asset('storage/'.$achievement->image) }}">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description[{{ $index }}]" class="form-control" required>{{ $achievement->description }}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update Achievements</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            // Initialize Dropify
            $('.dropify').dropify();
        });
    </script>
@endsection
