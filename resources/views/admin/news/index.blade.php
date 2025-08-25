@extends('admin.layout.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
    <li class="breadcrumb-item active">
        News
    </li>
    @endsection
    @section('page-option')
        <a href="{{ route('admin.news.add') }}" class="btn btn-primary">Add News</a>
    @endsection
    @section('content')
        <div class="bg-white p-2 shadow">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Feature Image</th>
                        <th>Title</th>
                        <th>Short Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td><img src="{{ asset($item->feature_image) }}" width="100"></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->short_content }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('admin.news.del', $item->id) }}" class="btn btn-danger" onclick="return confirm('Delete Data')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    @endsection
