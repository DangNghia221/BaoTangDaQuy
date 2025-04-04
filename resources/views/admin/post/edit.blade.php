@extends('adminlte::page')

@section('title', 'Chỉnh sửa bài viết')

@section('content_header')
    <h1>Chỉnh sửa bài viết</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label>Nội dung:</label>
                <textarea id="editor" name="content" class="form-control">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Danh mục:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" name="image" class="form-control">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>

        {{-- Nút quay lại --}}
        <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
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
