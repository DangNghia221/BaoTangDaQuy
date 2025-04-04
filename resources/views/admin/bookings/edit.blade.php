@extends('adminlte::page')

@section('title', 'Sửa vé')

@section('content_header')
   <h1>Sửa Vé</h1>
@endsection

@section('content')
    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Khách Hàng:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <label>Sản Phẩm:</label>
        <select name="product_id" class="form-control">
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $booking->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>

        <label>Số Lượng:</label>
        <input type="number" name="quantity" class="form-control" value="{{ $booking->quantity }}" required>

        <label>Trạng Thái:</label>
        <select name="status" class="form-control">
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
            <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
        </select>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
