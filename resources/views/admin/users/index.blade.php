@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Users Management</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th> <!-- Thêm cột role -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->usertype }}</td> <!-- Hiển thị role -->
                                <td>
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mb-3">
                <a href="{{ url('/admin') }}" class="btn btn-secondary">Back</a>

</div>
<table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
