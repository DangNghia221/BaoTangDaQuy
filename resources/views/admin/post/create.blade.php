@extends('adminlte::page')

@section('title', 'Tạo Bài Viết Mới')

@section('content_header')
    <h1>Tạo Bài Viết Mới</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tiêu đề:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nội dung:</label>
                <textarea id="editor" name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Danh mục:</label>
                <select name="category_id" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Tạo bài viết</button>
        </form>
        <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3">Quay lại</a>

        <!-- Nút mở thư viện ảnh -->
        <button type="button" class="btn btn-info mt-3" data-toggle="modal" data-target="#imageLibraryModal">Mở Thư Viện Ảnh</button>
    </div>
</div>

{{-- Modal Thư Viện Ảnh --}}
<div class="modal fade" id="imageLibraryModal" tabindex="-1" role="dialog" aria-labelledby="imageLibraryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageLibraryModalLabel">Thư Viện Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Danh sách ảnh từ thư viện --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên file</th>
                                <th>Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($libaries as $libary)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $libary->path) }}" alt="{{ $libary->filename }}" class="img-thumbnail" width="80">
                                    </td>
                                    <td>{{ $libary->filename }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm select-image" data-url="{{ asset('storage/' . $libary->path) }}">Chọn</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

    // Chọn ảnh từ thư viện và chèn vào CKEditor
    document.querySelectorAll('.select-image').forEach(btn => {
        btn.addEventListener('click', function () {
            const imageUrl = this.dataset.url;
            const editor = CKEDITOR.instances.editor;
            editor.insertHtml(`<img src="${imageUrl}" alt="image" />`);
            $('#imageLibraryModal').modal('hide');
        });
    });
</script>
@endsection
