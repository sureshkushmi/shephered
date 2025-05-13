@extends('layouts.app')

@section('title', 'Our Tour Packages | Shepherd Adventure Trekking')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Our Tour Packages</h1>

        <div class="row">
            @forelse ($packages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if ($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" class="card-img-top" alt="{{ $package->title }}">
                        @else
                            <img src="{{ asset('images/default-package.jpg') }}" class="card-img-top" alt="Default Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $package->title }}</h5>
                            <p class="card-text text-muted mb-2">
                                <strong>Price:</strong> ${{ number_format($package->price, 2) }}
                            </p>
                            <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($package->description), 100) }}</p>
                            <a href="#" class="btn btn-primary mt-auto">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No packages available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
