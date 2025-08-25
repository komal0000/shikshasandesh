@extends('admin.layout.app')

@section('s-title')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.downloads.index') }}">Download</a>
    </li>
    <li class="breadcrumb-item active">
        Edit
    </li>
@endsection

@section('content')
    <div class="bg-white shadow p-3 mt-3">
        <form action="{{ route('admin.downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- File Upload -->
                <div class="col-md-3">
                    <div class="mb-3">
                        <label>Upload File</label>
                        <input type="file" name="file" class="form-control  dropify" accept=".pdf,.docx,.doc,.webp" data-default-file="{{ asset($download->file_path) }}">
                    </div>
                </div>

                <!-- Title & Description -->
                <div class="col-md-9">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $download->title) }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Description (optional)</label>
                        <textarea name="description" class="form-control">{{ old('description', $download->description) }}</textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
