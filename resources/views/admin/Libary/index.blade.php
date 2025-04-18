@extends('adminlte::page')

@section('title', 'Quản Lý Thư Viện')

@section('content_header')
    <h1>Quản Lý Thư Viện</h1>
@endsection

@section('content')
    {{-- Dropzone --}}
    <form method="POST" action="{{ route('libary.store') }}" enctype="multipart/form-data" class="dropzone mb-4" id="my-dropzone">
        @csrf
    </form>

    {{-- Danh sách ảnh --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th width="100">Ảnh</th>
                    <th>Tên file</th>
                    <th>URL</th>
                    <th width="150" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libaries as $libary)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $libary->path) }}" alt="{{ $libary->filename }}" class="img-thumbnail" width="80">
                        </td>
                        <td>{{ $libary->filename }}</td>
                        <td>
                            <input type="text" class="form-control form-control-sm url-input" value="{{ asset('storage/' . $libary->path) }}" readonly>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-info btn-sm copy-btn" data-url="{{ asset('storage/' . $libary->path) }}">Copy</button>

                            <form action="{{ route('libary.destroy', $libary->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Chưa có ảnh nào trong thư viện.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        Dropzone.options.myDropzone = {
            maxFilesize: 2,
            acceptedFiles: "image/*",
            success: function (file, response) {
                location.reload();
            }
        };

        // Copy URL
        document.querySelectorAll('.copy-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                navigator.clipboard.writeText(this.dataset.url).then(() => {
                    toastr.success('Đã copy URL ảnh!');
                });
            });
        });
    </script>
@endsection
