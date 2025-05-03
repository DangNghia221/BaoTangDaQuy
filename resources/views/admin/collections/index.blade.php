@extends('adminlte::page')

@section('title', 'Bộ Sưu Tập')

@section('content_header')
    <h1>Quản Lý Bộ Sưu Tập</h1>
@endsection

@section('content')
<a href="{{ route('admin.collections.create') }}" class="btn btn-success">Thêm Bộ Sưu Tập Mới</a>

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
            <th>Tên Bộ Sưu Tập</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collections as $collection)
        <tr>
            <td>{{ $collection->id }}</td>
            <td>{{ $collection->name }}</td>
            <td>{!! $collection->description !!}</td>
            <td>
                @if($collection->image)
                    <img src="{{ asset('storage/' . $collection->image) }}" width="60" alt="Image">
                @else
                    Không có ảnh
                @endif
            </td>
            <td>
                <a href="{{ route('admin.collections.edit', $collection->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form action="{{ route('admin.collections.destroy', $collection->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa bộ sưu tập này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xoá</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
