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
                            <?php

                            use Spatie\Html\Facades\Html;

                            echo Html::form()
                                ->action(route('contact.store'))
                                ->method('POST')
                                ->children([
                                    Html::input('hidden', '_token')->value(csrf_token()),

                                    Html::div([
                                        Html::label('Name:', 'name'),
                                        Html::text('name')->id('name')->placeholder('Your name')->class('form-control')->required(),
                                        Html::span()->id('nameError')->class('error'),
                                    ])->class('form-group'),

                                    Html::div([
                                        Html::label('Email:', 'email'),
                                        Html::email('email')->id('email')->placeholder('xyz@gmail.com')->class('form-control')->required(),
                                        Html::span()->id('emailError')->class('error'),
                                    ])->class('form-group'),

                                    Html::div([
                                        Html::label('Phone Number:', 'phone'),
                                        Html::text('phone')->id('phone')->placeholder('1234567890')->class('form-control')->required(),
                                        Html::span()->id('phoneError')->class('error'),
                                    ])->class('form-group'),

                                    Html::div([
                                        Html::label('Message:', 'message'),
                                        Html::textarea('message')->id('message')->placeholder('Your message here...')->class('form-control')->required(),
                                        Html::span()->id('messageError')->class('error'),
                                    ])->class('form-group'),

                                    Html::button('Submit')
                                        ->type('submit')
                                        ->class('btn btn-primary'),
                                ])
                                ->toHtml();
                            ?>
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