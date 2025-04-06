@extends('adminlte::page')

@section('title', 'Thêm vé')

@section('content_header')
    <h1>Thêm vé</h1>
@endsection

@section('content')
    
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <label>Khách Hàng:</label>
        <select name="user_id" class="form-control">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label>Sản Phẩm:</label>
        <select name="product_id" id="productSelect" class="form-control">
            @foreach($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                    {{ $product->name }} ({{ number_format($product->price, 0, ',', '.') }} đ)
                </option>
            @endforeach
        </select>

        <label>Số Lượng:</label>
        <input type="number" name="quantity" id="quantityInput" class="form-control" value="1" min="1" required>

        <label>Giá Tiền (tự động):</label>
        <input type="text" id="priceDisplay" class="form-control" disabled>
        {{-- Nếu cần lưu giá vào DB thì dùng input ẩn --}}
        <input type="hidden" name="price" id="priceInput">

        <label>Trạng Thái:</label>
        <select name="status" class="form-control">
            <option value="pending">Chờ xử lý</option>
            <option value="confirmed">Đã xác nhận</option>
            <option value="canceled">Đã hủy</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Thêm</button>
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

    // Gọi lần đầu
    updatePrice();
</script>
@endsection
