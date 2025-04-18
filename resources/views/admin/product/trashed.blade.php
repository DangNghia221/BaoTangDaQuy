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
                <th>Ảnh</th>
                <th>Khôi phục</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có sản phẩm nào bị xoá.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
