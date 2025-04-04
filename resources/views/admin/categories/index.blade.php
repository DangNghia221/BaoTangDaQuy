@extends('adminlte::page')

@section('title', 'Danh Mục')

@section('content_header')
    <h1>Quản Lý Danh Mục</h1>
@endsection

@section('content')
<a href="{{ route('admin.categories.create') }}" class="btn btn-success">Thêm Danh Mục</a>

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
            <th>Tên Danh Mục</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Tác Giả</th>
            <th>Thao Tác</th> <!-- Thêm cột thao tác cho việc sửa và xóa -->
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" width="50" alt="Category Image">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $category->user ? $category->user->name : 'Unknown' }}</td> <!-- Hiển thị tên tác giả -->
            <td>
                <!-- Thêm thao tác sửa và xóa -->
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>

                <!-- Xóa danh mục -->
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Xóa</button>
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
