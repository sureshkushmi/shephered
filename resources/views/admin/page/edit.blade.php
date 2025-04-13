<!-- resources/views/admin/pages/edit.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Edit Page</h1>
    <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="slug">Slug (e.g., about-us, contact-us)</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $page->slug }}" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $page->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5" required>{{ $page->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Page</button>
    </form>
@endsection
