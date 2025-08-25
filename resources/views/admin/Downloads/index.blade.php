@extends('admin.layout.app')
@section('s-title')
@section('s-title')
    <li class="breadcrumb-item active">
        Downloads
    </li>
@endsection
@endsection
@section('page-option')
<a href="{{ route('admin.downloads.add') }}" class="btn btn-primary">Add New Download</a>
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="bg-white shadow p-3 mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($downloads as $download)
                <tr>
                    <td>{{ $download->title }}</td>
                    <td>{{ $download->description }}</td>
                    <td><a href="{{ asset($download->file_path) }}" target="_blank">View</a></td>
                    <td>
                    <a href="{{ route('admin.downloads.edit', $download->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.downloads.del', $download->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
