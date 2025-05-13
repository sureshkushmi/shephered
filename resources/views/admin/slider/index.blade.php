@extends('admin.admin')
@section('Title','Manage Slider')
@section('content')
<div class="col-12">
    <h1>Slider List</h1>
    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3">Add New Slider</a>

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
            @foreach($data as $datas)
            <tr>
                <td>{{ $datas->title }}</td>
                <td>{{ $datas->subtitle }}</td>
                <td>{{ $datas->image }}</td>
                <td><img src="{{ asset('storage/' . $datas->image) }}" alt="Current Image" style="width: 100px;"></td>
                <td>
                    <a href="{{ route('admin.slider.edit', $datas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.slider.destroy', $datas->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this package?');
    }
</script>