@extends('adminlte::page')

@section('title', 'Hiện vật đã xoá')

@section('content_header')
    <h1>Danh sách hiện vật đã bị xoá</h1>
@endsection

@section('content')
<a href="{{ route('artifacts.index') }}" class="btn btn-primary mb-3">← Quay lại danh sách</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Niên đại</th>
            <th>Vị trí</th>
            <th>Ảnh</th>
            <th>Khôi phục</th>
            <th>Xoá vĩnh viễn</th>
        </tr>
    </thead>
    <tbody>
        @forelse($artifacts as $artifact)
            <tr>
                <td>{{ $artifact->id }}</td>
                <td>{{ $artifact->name }}</td>
                <td>{{ $artifact->category }}</td>
                <td>{{ $artifact->age }}</td>
                <td>{{ $artifact->product->name ?? 'Không rõ' }}</td>
                <td>
                    @if($artifact->image)
                        <img src="{{ asset('storage/' . $artifact->image) }}" width="50">
                    @endif
                </td>
                <td>
                    <form action="{{ route('artifacts.restore', $artifact->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('artifacts.forceDelete', $artifact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn?')">Xoá vĩnh viễn</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Không có hiện vật nào bị xoá.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
