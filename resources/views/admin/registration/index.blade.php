@extends('admin.layout.app')
@section('s-title')
    <li class="breadcrumb-item active">
        Messages
    </li>
@endsection

@section('content')

    <div class="p-3 shadow bg-white">

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $registration)
                    <tr>
                        <td>{{ $registration->first_name }}</td>
                        <td>{{ $registration->last_name }}</td>
                        <td>{{ $registration->phone }}</td>
                        <td>{{ $registration->email }}</td>
                        <td>{{ $registration->message }}</td>
                        <td>
                            <form action="{{ route('admin.registration.destroy', $registration->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
