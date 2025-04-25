@extends('adminlte::page')

@section('title', 'Artifact')

@section('content_header')
    <h1>Quản Lý Hiện Vật</h1>
@endsection

@section('content')
<a href="{{ route('artifacts.create') }}" class="btn btn-success mb-2">Thêm Hiện Vật Mới</a>
<a href="{{ route('artifacts.trashed') }}" class="btn btn-warning mb-2">Xem hiện vật đã xoá</a> {{-- Thêm nút này --}}

@if(session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<script>
    setTimeout(function() {
        let alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
</script>

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tên Hiện Vật</th>
            <th>Thể Loại</th>
            <th>Chất Liệu</th>
            <th>Niên Đại</th>
            <th>Mô Tả</th>
            <th>Vị Trí Trưng Bày</th>
            <th>Ảnh</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($artifacts as $artifact)
        <tr>
            <td>{{ $artifact->id }}</td>
            <td>{{ $artifact->name }}</td>
            <td>{{ $artifact->category }}</td>
            <td>{{ $artifact->material }}</td>
            <td>{{ $artifact->age }}</td>
            <td>{!! $artifact->description !!}</td>
            <td>{{ $artifact->product->name ?? 'Không rõ' }}</td> {{-- Hiển thị tên khu --}}
            <td>
                @if($artifact->image)
                    <img src="{{ asset('storage/' . $artifact->image) }}" width="50" alt="Artifact Image">
                @else
                    <span class="text-muted">Không có ảnh</span>
                @endif
            </td>
            <td>
                <a href="{{ route('artifacts.edit', $artifact->id) }}" class="btn btn-warning btn-sm mb-1">Sửa</a>

                <form action="{{ route('artifacts.destroy', $artifact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá hiện vật này?')">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
