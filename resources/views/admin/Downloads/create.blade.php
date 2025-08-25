@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
        <a href="{{ route('admin.downloads.index') }}">Download</a>
    </li>
    <li class="breadcrumb-item active">
        Add
    </li>
@endsection
@section('content')
    <div class="bg-white shadow p-3 mt-3">
        <form action="{{ route('admin.downloads.add') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label>Upload File</label>
                        <input type="file" name="file" class="form-control photo" accept=".pdf,.docx,.doc" required>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description (optional)</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.photo').dropify();
        });
    </script>
@endsection
