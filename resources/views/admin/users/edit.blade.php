@extends('adminlte::page') {{-- Sửa để giữ sidebar AdminLTE --}}

@section('title', 'Edit User')

@section('content_header')
   
@endsection

@section('content')
<div class="pagetitle">
    <h1>Edit User</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-6"> {{-- Chỉnh width để form trông đẹp hơn --}}
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Name Input --}}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email Input (Không cho sửa nếu muốn) --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" disabled>
                        </div>

                        {{-- Role Selection --}}
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="usertype" class="form-control">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>

                        {{-- Action Buttons --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
