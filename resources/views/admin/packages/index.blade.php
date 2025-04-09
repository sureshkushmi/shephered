@extends('admin.admin')
@section('Title','Manage Packages')
@section('content')
<div class="col-12">
    <h1>Package List</h1>
    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary mb-3">Add New Package</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
            <tr>
                <td>{{ $package->title }}</td>
                <td>{{ $package->description }}</td>
                <td>{{ $package->price }}</td>
                <td>{{ $package->image }}</td>
                <td>
                    <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection