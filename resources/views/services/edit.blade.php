@extends('layouts.app')

@section('content')
    <main>
        <section class="edit-service">
            <h1>Edit Service</h1>
            <form action="{{ route('services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Service Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="details">Details:</label>
                    <textarea id="details" name="details" required>{{ old('details', $service->details) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price (PKR):</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $service->price) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Save Changes</button>
                <form action="{{ route('services.index') }}" method="GET" style="display: inline;">
                            <button type="submit" class="btn btn-warning" style="margin-bottom:3px;">Cancel</button>
                        </form>
                <!-- <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a> -->
            </form>
        </section>
    </main>
@endsection
