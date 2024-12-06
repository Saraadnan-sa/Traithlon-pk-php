@extends('layouts.app')

@section('content')
<main>
    <section class="services">
        <h1>Our Services</h1>
        <p>
            Explore the different fitness programs we offer at Triathlon PK. Our
            expert trainers are dedicated to helping you achieve your fitness
            goals through personalized and engaging training sessions.
        </p>

        <!-- Table to display services -->
        <table id="servicesTable">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Details</th>
                    <th>Price</th>
                    @if(auth()->user() && auth()->user()->role === 'admin')
                    <th>Actions</th>
                    @else
                    <th>Sign Up</th>
                    @endif
                </tr>
            </thead>
            <tbody id="servicesTableBody">
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->details }}</td>
                    <td>PKR {{ number_format($service->price, 2) }}</td>
                    @if(auth()->user() && auth()->user()->role === 'admin')
                    <td>
                        <!-- Edit Button -->
                        <!-- <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a> -->
                        <form action="{{ route('services.edit', $service->id) }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-warning" style="margin-bottom:3px;">Edit</button>
                        </form>

                        <!-- Delete Button -->
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    @else
                    <td><a href="home.html" class="join-now-btn">Join Now</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Admin Add New Service Button -->
        @if(auth()->user() && auth()->user()->role === 'admin')
        <div class="admin-actions" style="z-index: 1000; position: relative; margin-top: 10px;">
            <form action="{{ route('services.create') }}" method="get" style="display: inline;">
                <button type="submit" class="btn btn-primary">Add New Service</button>
            </form>
        </div>
        @endif
    </section>
</main>
@endsection