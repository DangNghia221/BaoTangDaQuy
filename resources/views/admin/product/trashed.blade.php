@extends('adminlte::page')

@section('title', 'Sản phẩm đã xoá')

@section('content_header')
    <h1>Danh sách sản phẩm đã bị xoá</h1>
@endsection

@section('content')
    <a href="{{ route('product.index') }}" class="btn btn-primary mb-3">← Quay lại danh sách</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ngày diễn ra</th> {{-- Thêm cột --}}
                <th>Ảnh</th>
                <th>Khôi phục</th>
                <th>Xóa vĩnh viễn</th> {{-- Cột mới --}}
            </tr>
        </thead>
        <tbody>
            @forelse($deletedProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($product->event_date)->format('d/m/Y') }}
                    </td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="50">
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('product.restore', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('product.deleteForever', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn sản phẩm này?')">Xóa vĩnh viễn</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Không có sản phẩm nào bị xoá.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
