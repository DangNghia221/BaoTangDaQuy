@extends('adminlte::page')

@section('title', 'Quản lý thông tin website')

@section('content_header')
    <h1>Quản lý thông tin website</h1>
@endsection

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Thông tin Website -->
    <div class="card card-lightblue">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-info-circle"></i> Thông tin Website</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="site_name">Tên website</label>
                <input type="text" class="form-control" name="site_name" value="{{ $setting->site_name ?? '' }}">
            </div>

            <div class="form-group">
                <label for="site_description">Mô tả website</label>
                <textarea class="form-control" name="site_description">{{ $setting->site_description ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="site_keywords">Từ khóa</label>
                <textarea class="form-control" name="site_keywords">{{ $setting->site_keywords ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="logo">Logo</label><br>
                @if($setting && $setting->logo)
                    <img src="{{ asset('storage/' . $setting->logo) }}" width="100" class="mb-2">
                @endif
                <input type="file" class="form-control-file" name="logo">
            </div>

            <div class="form-group">
                <label for="favicon">Favicon</label><br>
                @if($setting && $setting->favicon)
                    <img src="{{ asset('storage/' . $setting->favicon) }}" width="32" class="mb-2">
                @endif
                <input type="file" class="form-control-file" name="favicon">
            </div>

            <div class="form-group">
                <label for="sitemap">Sitemap</label>
                <input type="text" class="form-control" name="sitemap" value="{{ $setting->sitemap ?? '' }}">
            </div>
        </div>
    </div>

    <!-- Hệ thống -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-cogs"></i> Hệ thống</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Bảo trì:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="is_active" value="1" class="form-check-input" {{ ($setting->is_active ?? 1) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label">Hoạt động</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="is_active" value="0" class="form-check-input" {{ ($setting->is_active ?? 1) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label">Bảo trì</label>
                </div>
            </div>

            <div class="form-group">
                <label>Loại trang:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="site_type" value="cart" class="form-check-input" {{ ($setting->site_type ?? 'cart') == 'cart' ? 'checked' : '' }}>
                    <label class="form-check-label">Có giỏ hàng</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="site_type" value="simple" class="form-check-input" {{ ($setting->site_type ?? 'cart') == 'simple' ? 'checked' : '' }}>
                    <label class="form-check-label">Đơn giản</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Thông tin liên hệ -->
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-phone"></i> Thông tin liên hệ</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $setting->email ?? '' }}">
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ $setting->phone ?? '' }}">
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea class="form-control" name="address">{{ $setting->address ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="business_info">Thông tin kinh doanh</label>
                <textarea class="form-control" name="business_info">{{ $setting->business_info ?? '' }}</textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Lưu thay đổi</button>
</form>
@endsection
