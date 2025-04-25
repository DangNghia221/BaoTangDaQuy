@extends('adminlte::page')

@section('title', 'Thêm Hiện Vật')

@section('content_header')
    <h1>Thêm Hiện Vật Mới</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('artifacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Tên Hiện Vật:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Thể Loại:</label>
                <input type="text" name="category" class="form-control">
            </div>

            <div class="form-group">
                <label>Chất Liệu:</label>
                <input type="text" name="material" class="form-control">
            </div>

            <div class="form-group">
                <label>Niên Đại:</label>
                <input type="text" name="age" class="form-control">
            </div>

            <div class="form-group">
                <label>Mô Tả:</label>
                <textarea id="editor" name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
    <label>Khu Trưng Bày:</label>
    <select name="product_id" class="form-control" required>
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
</div>


            <div class="form-group">
                <label>Hình Ảnh:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Thêm Hiện Vật</button>
        </form>
        <a href="{{ route('artifacts.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</div>

{{-- CKEditor --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.18.0/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        height: 300,
        removePlugins: 'elementspath',
        resize_enabled: false
    });
</script>
@endsection
