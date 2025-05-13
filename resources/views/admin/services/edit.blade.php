@extends('admin.admin')

@section('content')
<div class="container">
    <h2>Edit Service</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.services.update', $services->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $services->title) }}" required>
        </div>


        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control">{{ old('description', $services->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
