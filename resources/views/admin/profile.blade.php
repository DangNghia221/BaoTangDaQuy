@extends('adminlte::page')

@section('title', 'Admin Profile')

@section('content_header')
    <h1>Admin Profile</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            @method('PUT')

            <!-- Ảnh đại diện -->
            <div class="text-center">
                @if($admin->avatar)
                    <img src="{{ asset('storage/' . $admin->avatar) }}" class="rounded-circle" width="150" alt="Avatar">
                @else
                    <img src="{{ asset('storage/avatars/default-avatar.png') }}" class="rounded-circle" width="150" alt="Avatar">
                @endif
            </div>

            <div class="form-group">
                <label>Tên:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}">
            </div>

            <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}">
            </div>

            <div class="form-group">
                <label>Ảnh đại diện:</label>
                <input type="file" name="avatar" class="form-control">
            </div>

            <div class="form-group">
                <label>Mật khẩu mới:</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
                <label>Xác nhận mật khẩu:</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
