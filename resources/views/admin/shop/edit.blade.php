@extends('adminlte::page')

@section('title', 'Chỉnh sửa Sản Phẩm')

@section('content_header')
    <h1>Chỉnh sửa Sản Phẩm</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Form chỉnh sửa sản phẩm -->
            <form action="{{ route('shop.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tên sản phẩm -->
                <div class="form-group">
                    <label>Tên sản phẩm:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $shop->name) }}" required>
                </div>

                <!-- Mô tả -->
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea name="description" class="form-control" rows="5">{!! old('description', $shop->description) !!}</textarea>
                </div>

                <!-- Danh mục -->
                <div class="form-group">
                    <label>Danh mục:</label>
                    <select name="category_id" class="form-control" required>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" {{ $shop->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

                </div>

                <!-- Giá -->
                <div class="form-group">
                    <label>Giá:</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $shop->price) }}" required>
                </div>

                <!-- Hình ảnh -->
                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" name="image" class="form-control">
                    @if($shop->image)
                        <img src="{{ asset('storage/' . $shop->image) }}" width="100" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                <a href="{{ route('shop.index') }}" class="btn btn-secondary ml-2">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
