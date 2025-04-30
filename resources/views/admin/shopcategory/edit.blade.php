@extends('adminlte::page')

@section('title', 'Chỉnh sửa Danh Mục')

@section('content_header')
    <h1>Chỉnh sửa Danh Mục Shop</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('shopcategory.update', $shopcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Tên -->
            <div class="form-group">
                <label for="name">Tên danh mục:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $shopcategory->name) }}" required>
            </div>

            <!-- Mô tả -->
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $shopcategory->description) }}</textarea>
            </div>

            <!-- Hình ảnh -->
            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" name="image" class="form-control-file">

                @if($shopcategory->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $shopcategory->image) }}" width="100" alt="Current Image">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('shopcategory.index') }}" class="btn btn-secondary ml-2">Quay lại</a>
        </form>
    </div>
</div>
@endsection
