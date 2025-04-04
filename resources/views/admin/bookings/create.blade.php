@extends('adminlte::page')

@section('title', 'Thêm vé')

@section('content_header')
    <h1>Thêm vé</h1>
@endsection

@section('content')  {{-- Bổ sung @section('content') để tránh lỗi --}}
    <h2>Thêm Đặt Vé</h2>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <label>Khách Hàng:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label>Sản Phẩm:</label>
        <select name="product_id" class="form-control">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>

        <label>Số Lượng:</label>
        <input type="number" name="quantity" class="form-control" required>

        <label>Trạng Thái:</label>
        <select name="status" class="form-control">
    <option value="pending">Chờ xử lý</option>
    <option value="confirmed">Đã xác nhận</option>
    <option value="canceled">Đã hủy</option>
</select>


        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
@endsection  {{-- Đóng @section('content') đúng cách --}}
