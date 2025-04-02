@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@endsection

@section('content')
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
    <label class="form-label">Price</label>
    <div class="input-group">
        <input type="number" name="price" class="form-control" min="0" step="1000">
        <span class="input-group-text">VND</span>
    </div>
</div>


       

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
