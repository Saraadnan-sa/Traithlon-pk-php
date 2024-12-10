@extends('layouts.app')

@section('content')
<main>
    <section class="contact">
        <div class="contact-overlay">
            <div class="flex-main">
                <div class="flex-vertical">
                    <div class="item1">Contact Us</div>

                    <!-- Success Message -->
                    <!-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif -->
                    <!-- Success Message -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                    <div class="item2">
                        <div class="contact-form">
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Your name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="xyz@gmail.com" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="text" id="phone" name="phone" placeholder="1234567890" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message:</label>
                                    <textarea id="message" name="message" placeholder="Your message here..." class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="flex-vertical">
                    <div class="item3">
                        <div class="gmap_canvas">
                            <iframe
                                id="gmap_canvas"
                                src="https://maps.google.com/maps?q=multan+cantt&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"></iframe>
                        </div>
                    </div>

                    <div class="item4">
                        <div class="contact-item">
                            <i class="fa fa-phone"></i>
                            <span>Call us: 051-7654321</span>
                        </div>
                        <div class="contact-item">
                            <i class="fa fa-map-marker"></i>
                            <span>Address: Apartment basement, Multan Cantt</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>Email: Triathlon@fitnessstudio.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection