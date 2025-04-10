@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Product</h1>
@endsection

@section('content')
    <a href="{{ route('product.index') }}" class="btn btn-secondary mb-3">Back to Product List</a>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (VND)</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}" required>
    @error('quantity')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($product->image)
                <p>Current image:</p>
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
@endsection
