@extends('admin.layout.app')

@section('content')
    <div class="container">
        <h1>Edit About Us</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.aboutusstore') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" class="dropify" data-default-file="{{ $aboutUs->photo ? asset('storage/'.$aboutUs->photo) : '' }}" />
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" name="thumbnail" class="dropify" data-default-file="{{ $aboutUs->thumbnail ? asset('storage/'.$aboutUs->thumbnail) : '' }}" />
                @if($errors->has('thumbnail'))
                    <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="youtube_video_link">YouTube Video Link:</label>
                <input type="url" name="youtube_video_link" class="form-control" value="{{ old('youtube_video_link', $aboutUs->youtube_video_link) }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control">{{ old('description', $aboutUs->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
