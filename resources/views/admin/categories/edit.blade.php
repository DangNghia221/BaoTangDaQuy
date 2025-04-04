@extends('adminlte::page')

@section('title', 'Chỉnh Sửa Danh Mục')

@section('content_header')
    <h1>Chỉnh Sửa Danh Mục</h1>
@endsection

@section('content')
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

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả</label>
                <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình Ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if($category->image)
                    <p>Ảnh hiện tại:</p>
                    <img src="{{ asset('storage/' . $category->image) }}" width="100" alt="Category Image">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection
