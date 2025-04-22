@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Sản Phẩm</h1>
@endsection

@section('content')

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả Sản Phẩm</label>
            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá Tiền (VND)</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số Lượng</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
            @error('quantity')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="event_date" class="form-label">Ngày Diễn Ra</label> {{-- ✅ THÊM --}}
            <input type="date" id="event_date" name="event_date" class="form-control"
                   value="{{ old('event_date', \Carbon\Carbon::parse($product->event_date)->format('Y-m-d')) }}" required>
            @error('event_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($product->image)
                <p>Current image:</p>
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
