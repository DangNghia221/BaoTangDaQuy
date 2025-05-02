@extends('adminlte::page')

@section('title', 'Quản Lý Vé')

@section('content_header')
@endsection

@section('content')
    <h2>Quản Lý Vé</h2>
    <a href="{{ route('bookings.create') }}" class="btn btn-success mb-3">Thêm Đặt Vé</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách</th>
                <th>Email</th>
                <th>Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá Tiền</th> 
                <th>Trạng Thái</th>
                <th>Ngày Đặt</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name ?? 'N/A' }}</td>
                    <td>{{ $booking->user->email ?? 'N/A' }}</td>
                    <td>{{ $booking->product->name ?? 'N/A' }}</td>
                    <td>{{ $booking->quantity }}</td>
                    <td>{{ number_format($booking->price, 0, ',', '.') }} đ</td>
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
                            <!-- Nút Thanh Toán -->
                            <form action="{{ route('bookings.pay', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Thanh Toán</button>
                            </form>
                            <!-- Nút Hủy -->
                            <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn đặt này?')">Hủy</button>
                            </form>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i') }}</td>
                    <td>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
