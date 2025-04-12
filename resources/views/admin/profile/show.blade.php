@extends('admin.admin')

@section('content')
<div class="container">
    <h2>User Profile</h2>

    <div class="mb-3">
        <label>Name:</label>
        <p>{{ $user->name }}</p>
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <p>{{ $user->email }}</p>
    </div>

    <div class="mb-3">
        <label>Profile Image:</label>
        @if ($user->image)
            <div>
                <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" style="width: 100px;">
            </div>
        @else
            <p>No profile image available.</p>
        @endif
    </div>

    <div class="mb-3">
        <label>Description:</label>
        <p>{{ $user->description ?? 'No description provided.' }}</p>
    </div>
</div>
@endsection
