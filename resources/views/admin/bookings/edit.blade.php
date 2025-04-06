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
        <select name="product_id" id="productSelect" class="form-control">
            @foreach($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->price }}" {{ $booking->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} ({{ number_format($product->price, 0, ',', '.') }} đ)
                </option>
            @endforeach
        </select>

        <label>Số Lượng:</label>
        <input type="number" name="quantity" id="quantityInput" class="form-control" value="{{ $booking->quantity }}" required>

        <label>Giá Tiền:</label>
        <input type="text" id="priceDisplay" class="form-control" disabled>
        <input type="hidden" name="price" id="priceInput" value="{{ $booking->price }}">

        <label>Trạng Thái:</label>
        <select name="status" class="form-control">
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
            <option value="canceled" {{ $booking->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>
    </form>
@endsection

@section('js')
<script>
    function updatePrice() {
        let product = document.querySelector('#productSelect').selectedOptions[0];
        let quantity = document.querySelector('#quantityInput').value;
        let price = product.getAttribute('data-price');
        let total = price * quantity;

        document.querySelector('#priceDisplay').value = Number(total).toLocaleString('vi-VN') + ' đ';
        document.querySelector('#priceInput').value = total;
    }

    document.querySelector('#productSelect').addEventListener('change', updatePrice);
    document.querySelector('#quantityInput').addEventListener('input', updatePrice);

    // Gọi lần đầu khi load
    updatePrice();
</script>
@endsection
