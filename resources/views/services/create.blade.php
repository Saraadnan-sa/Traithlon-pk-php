@extends('layouts.app')

@section('content')
<main>
    <section class="add-service">
        <h1>Add New Service</h1>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Service Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" id="details" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (PKR)</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-bottom:3px;">Add Service</button>
        </form>
    </section>
</main>
@endsection