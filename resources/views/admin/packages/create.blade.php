@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Add New Package</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Package</button>
    </form>
</div>
@endsection
