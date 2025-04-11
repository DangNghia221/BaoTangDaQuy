@extends('adminlte::page')

@section('title', 'Users Management')

@section('content_header')
    <h1>Danh sách User đã xoá</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" id="error-alert">
            {{ session('error') }}
        </div>
    @endif

    {{-- Script để ẩn thông báo sau 3 giây --}}
    <script>
        setTimeout(function() {
            let successAlert = document.getElementById('success-alert');
            let errorAlert = document.getElementById('error-alert');

            if (successAlert) {
                successAlert.style.transition = "opacity 0.5s ease";
                successAlert.style.opacity = "0";
                setTimeout(() => successAlert.remove(), 500);
            }

            if (errorAlert) {
                errorAlert.style.transition = "opacity 0.5s ease";
                errorAlert.style.opacity = "0";
                setTimeout(() => errorAlert.remove(), 500);
            }
        }, 3000); // 3 giây
    </script>

    @if($users->isEmpty())
        <p>Không có user nào đã xoá.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Loại</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->usertype }}</td>
                            <td>
                                <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                                </form>

                                <form action="{{ route('users.forceDelete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xoá vĩnh viễn user này?')">Xoá Vĩnh Viễn</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">← Quay về danh sách User</a>
@endsection
