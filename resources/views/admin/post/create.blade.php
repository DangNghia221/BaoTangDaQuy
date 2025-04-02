@extends('adminlte::page')

@section('title', 'Create New Post')

@section('content_header')
    <h1>Tạo Bài Viết</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Content:</label>
                <textarea id="editor" name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
