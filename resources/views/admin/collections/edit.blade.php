@extends('adminlte::page')

@section('title', 'Chỉnh Sửa Bộ Sưu Tập')

@section('content_header')
    <h1>Chỉnh Sửa Bộ Sưu Tập</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.collections.update', $collection->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Tên bộ sưu tập:</label>
                    <input type="text" name="name" class="form-control" value="{{ $collection->name }}" required>
                </div>

                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea id="editor" name="description" class="form-control">{!! $collection->description !!}</textarea>
                </div>

                <div class="form-group">
                    <label>Hình ảnh hiện tại:</label><br>
                    @if($collection->image)
                        <img src="{{ asset('storage/' . $collection->image) }}" width="100" class="mb-2" alt="Hình hiện tại">
                    @else
                        <p>Không có ảnh</p>
                    @endif
                    <input type="file" name="image" class="form-control mt-2">
                </div>

                <div class="form-group d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#imageLibraryModal">Mở Thư Viện Ảnh</button>
                </div>

                <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary">Quay lại</a>
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
    @foreach ($libraries as $libary)
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
