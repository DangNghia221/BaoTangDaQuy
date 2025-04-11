@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
@endsection

@section('content') {{-- Bọc toàn bộ nội dung trong @section('content') --}}
<div class="pagetitle">
    <h1>Quản lý người dùng</h1>
</div>

{{-- Nút xem user đã xoá --}}
<a href="{{ route('users.trashed') }}" class="btn btn-warning mb-3">🗑️ Xem user đã xoá</a>

{{-- Hiển thị thông báo --}}
@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Script tự ẩn thông báo sau 3 giây --}}
<script>
    setTimeout(function() {
        let alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
</script>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered"> {{-- Thêm class để AdminLTE nhận diện --}}
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th> 
                                <th>Hành Động</th>
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
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Sửa</a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá?')" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3">
                        <a href="{{ url('/admin') }}" class="btn btn-secondary">← Quay Lại</a>
                    </div>
                </div> {{-- Đóng card-body --}}
            </div> {{-- Đóng card --}}
        </div> {{-- Đóng col-lg-12 --}}
    </div> {{-- Đóng row --}}
</section>
@endsection {{-- Đặt đúng vị trí --}}
