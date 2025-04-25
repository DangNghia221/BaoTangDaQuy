@extends('adminlte::page')

@section('title', 'Chỉnh Sửa Hiện Vật')

@section('content_header')
    <h1>Chỉnh Sửa Hiện Vật</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('artifacts.update', $artifact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tên Hiện Vật:</label>
                <input type="text" name="name" class="form-control" value="{{ $artifact->name }}" required>
            </div>

            <div class="form-group">
                <label>Thể Loại:</label>
                <input type="text" name="category" class="form-control" value="{{ $artifact->category }}">
            </div>

            <div class="form-group">
                <label>Chất Liệu:</label>
                <input type="text" name="material" class="form-control" value="{{ $artifact->material }}">
            </div>

            <div class="form-group">
                <label>Niên Đại:</label>
                <input type="text" name="age" class="form-control" value="{{ $artifact->age }}">
            </div>

            <div class="form-group">
                <label>Mô Tả:</label>
                <textarea id="editor" name="description" class="form-control">{{ $artifact->description }}</textarea>
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
                <label>Ảnh Hiện Vật:</label>
                <input type="file" name="image" class="form-control">

                @if($artifact->image)
                    <div class="mt-2">
                        <p>Ảnh hiện tại:</p>
                        <img src="{{ asset('storage/' . $artifact->image) }}" alt="Artifact Image" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật Hiện Vật</button>
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
