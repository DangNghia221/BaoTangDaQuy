@extends('adminlte::page')

@section('title', 'Thêm Danh Mục Shop')

@section('content_header')
    <h1>Thêm Danh Mục Shop</h1>
@endsection

@section('content')
    <form action="{{ route('shopcategory.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="name">Tên danh mục:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
                    <a href="{{ route('shopcategory.index') }}" class="btn btn-secondary ml-2">Quay lại</a>
                </div>

            </div>
        </div>
    </form>
@endsection
