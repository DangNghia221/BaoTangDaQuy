@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Quản lý sản phẩm</h1>
@endsection

@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-success mb-3"> Thêm Sản Phẩm</a>
    <a href="{{ route('product.trashed') }}" class="btn btn-warning mb-3"> Xem sản phẩm đã xoá</a>

    @if(session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toast = new bootstrap.Toast(document.getElementById('successToast'));
            toast.show();
            setTimeout(function() {
                toast.hide();
            }, 3000);
        });
    </script>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản phẩm</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Ngày diễn ra</th> 
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ \Carbon\Carbon::parse($product->event_date)->format('d/m/Y') }}</td> 
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
