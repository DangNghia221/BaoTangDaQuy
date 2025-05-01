@extends('adminlte::page')

@section('title', 'Lịch Sử Mua Hàng')

@section('content_header')
@endsection

@section('content')
    <h2>Lịch Sử Mua Hàng</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách</th>
                <th>Email</th>
                <th>Tên sản phẩm</th>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
                <th>Ngày Mua</th>
                <th>Trạng Thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shoppingHistories as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->user->name ?? 'N/A' }}</td>
                    <td>{{ $history->user->email ?? 'N/A' }}</td>
                    <td>{{ $history->shop->name ?? 'N/A' }}</td>
                    <td>{{ $history->quantity }}</td>
                    <td>{{ number_format($history->quantity * $history->shop->price, 0, ',', '.') }} đ</td> <!-- Tổng tiền -->
                    <td>{{ \Carbon\Carbon::parse($history->purchased_at)->format('d/m/Y H:i') }}</td>
                    
                    @php
                        $statusText = [
                            'confirmed' => 'Đã xác nhận',
                            'canceled' => 'Đã hủy',
                            'pending' => 'Chờ xử lý'
                        ];
                    @endphp
                    
                    <td>
                        {{ $statusText[$history->status] ?? 'Chưa xác định' }}
                        @if($history->status == 'pending')
                            <!-- Thêm nút hành động nếu trạng thái là pending -->
                            <form action="{{ route('admin.shopping.confirm', $history->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Xác Nhận</button>
                            </form>
                        @endif
                    </td>

                    <td>
                        {{-- Nút xóa --}}
                        <form action="{{ route('admin.shopping.destroy', $history->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa lịch sử mua này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
