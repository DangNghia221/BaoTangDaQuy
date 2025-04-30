@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@endsection

@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên Sản Phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô Tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá Tiền</label>
            <div class="input-group">
                <input type="number" name="price" class="form-control" min="0" step="1000" required>
                <span class="input-group-text">VND</span>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Số Lượng</label>
            <input type="number" name="quantity" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày Diễn Ra</label> 
            <input type="date" name="event_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
@endsection
