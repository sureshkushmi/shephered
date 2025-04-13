<!-- resources/views/admin/pages/index.blade.php -->
@extends('admin.admin')

@section('content')
    <h1>Pages</h1>
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create Page</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
