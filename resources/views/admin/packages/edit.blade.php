@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Edit Package</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.packages.update', $package->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $package->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Price:</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $package->price) }}" required>
        </div>

        <div class="mb-3">
            <label>Image:</label>
            @if ($package->image)
                <div>
                    <img src="{{ asset('storage/' . $package->image) }}" alt="Current Image" style="width: 100px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control">{{ old('description', $package->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>
</div>
@endsection
