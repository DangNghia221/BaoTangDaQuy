@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Quản Lý Bài Viết</h1>
@endsection

@section('content')
<a href="{{ route('post.create') }}" class="btn btn-success">Thêm Bài Viết Mới</a>

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
            <th>Tên Bài Viết</th>
            <th>Danh Mục</th> <!-- Thêm cột danh mục -->
            <th>Hình ảnh</th>
            <th>Tác Giả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name ?? 'Chưa có danh mục' }}</td> <!-- Hiển thị tên danh mục -->
            <td>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" width="50" alt="Post Image">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $post->user->name ?? 'Unknown' }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Sửa</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
