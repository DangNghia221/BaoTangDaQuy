@extends('adminlte::page')

@section('title', 'Tạo Sản Phẩm')

@section('content_header')
    <h1>Tạo SHOP Mới</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Tên sản phẩm:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea id="editor" name="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Danh mục:</label>
                    <select name="category_id" class="form-control" required>
    <option value="">Chọn thể loại</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
    @endforeach
</select>

                </div>

                <div class="form-group">
                    <label>Giá:</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Các nút "Tạo sản phẩm", "Quay lại", "Mở thư viện ảnh" nằm kế bên nhau -->
                <div class="form-group d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#imageLibraryModal">Mở Thư Viện Ảnh</button>
                </div>
                <a href="{{ route('shop.index') }}" class="btn btn-secondary">Quay lại</a>

            </form>
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
