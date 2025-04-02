@extends('adminlte::page')

@section('title', 'categories')

@section('content_header')
    <h1>Tạo danh mục bài viết</h1>
@endsection
    <h1>Thêm danh mục mới</h1>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="draft">Nháp</option>
                <option value="published">Xuất bản</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
@endsection
