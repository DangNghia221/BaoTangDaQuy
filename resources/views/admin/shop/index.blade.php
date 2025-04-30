@extends('adminlte::page')

@section('title', 'Shop')

@section('content_header')
    <h1>Quản Lý Sản Phẩm Shop</h1>
@endsection

@section('content')
<a href="{{ route('shop.create') }}" class="btn btn-success">Thêm Sản Phẩm Mới</a>

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
        <th>Tên Sản Phẩm</th>
        <th>Thể Loại</th>
        <th>Mô Tả</th> <!-- Thêm dòng này -->
        <th>Giá</th>
        <th>Hình Ảnh</th>
        <th>Hành Động</th>
    </tr>
</thead>
<tbody>
    @foreach($items as $item)
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->category->name ?? 'Không có' }}</td>
        <td>{!! $item->description !!}</td>
        <td>{{ number_format($item->price) }} đ</td>
        <td>
            @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" width="60" alt="Image">
            @else
                No Image
            @endif
        </td>
        <td>
    <a href="{{ route('shop.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>

    <form action="{{ route('shop.destroy', $item->id) }}" method="POST" class="d-inline" 
          onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
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
