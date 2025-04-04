@extends('adminlte::page')

@section('title', 'Quản Lý Vé')

@section('content_header')
   
@endsection

@section('content')  {{-- Bổ sung @section('content') để tránh lỗi --}}
    <h2>Quản Lý Đặt Vé</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-success">Thêm Đặt Vé</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách</th>
                <th>Email</th>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Trạng Thái</th>
                <th>Ngày Đặt</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->user->email }}</td>
                    <td>{{ $booking->product->name }}</td>
                    <td>{{ $booking->quantity }}</td>
                    @php
    $statusText = [
        'pending' => 'Chờ xử lý',
        'confirmed' => 'Đã xác nhận',
        'canceled' => 'Đã hủy'
    ];
@endphp
<td>
    {{ $statusText[$booking->status] ?? 'Không xác định' }} 
    @if($booking->status == 'pending')
        <form action="{{ route('bookings.pay', $booking->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm">Thanh Toán</button>
        </form>
    @endif
</td>

                    <td>{{ $booking->booking_date }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection  {{-- Đóng @section('content') đúng cách --}}
