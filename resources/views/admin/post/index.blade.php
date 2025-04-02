@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Quản Lý Bài Viết</h1>
@endsection

@section('content')
<a href="{{ route('post.create') }}" class="btn btn-success">Add New Post</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Status</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" width="50" alt="Post Image">
                @else
                    No Image
                @endif
            </td>
            <td>{{ ucfirst($post->status) }}</td>
            <td>{{ $post->user->name ?? 'Unknown' }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection