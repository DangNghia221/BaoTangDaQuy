@extends('adminlte::page')

@section('title', 'Shop Category')

@section('content_header')
    <h1>Quản Lý Danh Mục Shop</h1>
@endsection

@section('content')
<a href="{{ route('shopcategory.create') }}" class="btn btn-success">Thêm Danh Mục Mới</a>

@if(session('success'))
    <div id="success-alert" class="alert alert-success mt-2">
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

<table class="table table-bordered mt-3">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->description }}</td>
            <td>
                @if($cat->image)
                    <img src="{{ asset('storage/' . $cat->image) }}" width="60" alt="Image">
                @else
                    No Image
                @endif
            </td>
            <td>
                <a href="{{ route('shopcategory.edit', $cat->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                <form action="{{ route('shopcategory.destroy', $cat->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
