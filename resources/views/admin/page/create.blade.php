<!-- resources/views/admin/pages/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Create Page</h1>
    <form method="POST" action="{{ route('admin.pages.store') }}">
        @csrf
        <div class="form-group">
            <label for="slug">Slug (e.g., about-us, contact-us)</label>
            <input type="text" class="form-control" name="slug" id="slug" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Page</button>
    </form>
@endsection
