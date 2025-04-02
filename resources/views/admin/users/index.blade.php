@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
    
@endsection

@section('content') {{-- Bọc toàn bộ nội dung trong @section('content') --}}
<div class="pagetitle">
    <h1>Quản lý người dùng</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message') {{-- Nếu có thông báo thì hiển thị --}}
            
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered"> {{-- Thêm class để AdminLTE nhận diện --}}
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->usertype }}</td> 
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <a href="{{ url('/admin') }}" class="btn btn-secondary">Back</a>
                    </div>

                </div> {{-- Đóng card-body --}}
            </div> {{-- Đóng card --}}
        </div> {{-- Đóng col-lg-12 --}}
    </div> {{-- Đóng row --}}
</section>
@endsection {{-- Đặt đúng vị trí --}}
