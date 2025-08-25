@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
        Achievements
    </li>
@endsection
@section('page-option')
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">Add Achievement</a>
@endsection
@section('content')
    <div class="bg-white shadow p-3 mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($achievements as $achievement)
                    <tr>
                        <td>{{ $achievement->title }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>
                            <a href="{{ route('admin.achievements.edit', $achievement->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- @foreach ($achievements as $achievement)
            <div class="achievement-item">
                <div class="row">
                    <div class="col-md-9">
                        <h4>{{ $achievement->title }}</h4>
                        <p>{{ $achievement->description }}</p>
                        <div class="actions">
                            <a href="{{ route('admin.achievements.edit', $achievement->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.achievements.destroy', $achievement->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
