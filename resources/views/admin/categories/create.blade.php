@extends('adminlte::page')

@section('title', 'Thêm Danh Mục')

@section('content_header')
    <h1>Thêm Danh Mục Mới</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên Danh Mục:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Mô Tả:</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>Hình Ảnh:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
        </form>
    </div>
</div>
@endsection
