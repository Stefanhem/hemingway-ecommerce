@extends('layouts.app')
@section('content')
    <div class="section-4">
        <div class="container-2 cc-heading-wrap">
            <h1 class="heading">Pošaljite nam poruku</h1>
            <div class="paragraph-bigger cc-bigger-light">Hey there, fill out this form</div>
        </div>
        <div class="container-2">
            <div class="get-in-touch-form-wrap w-form">
                <form id="wf-form-Get-In-Touch-Form" name="wf-form-Get-In-Touch-Form" data-name="Get In Touch Form" class="get-in-touch-form">
                    <div class="credentials-inputs-wrap">
                        <div class="contact-name-field-wrap"><label for="name" class="contact-field-label">Ime</label><input type="text" class="text-field cc-contact-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="Enter your name" id="Name"></div>
                        <div class="email-name-field-wrap"><label for="Email" class="contact-field-label">Email</label><input type="email" class="text-field cc-contact-field w-input" maxlength="256" name="Email" data-name="Email" placeholder="Enter your email" id="Email" required=""></div>
                    </div><label class="contact-field-label">Message</label><textarea id="field" name="field" placeholder="Enter your message" maxlength="5000" data-name="Field" class="text-field cc-textarea cc-contact-field w-input"></textarea><input type="submit" value="Submit" data-wait="Please wait..." class="button w-button"></form>
                <div class="status-message cc-success-message w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="status-message cc-error-message w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-section">
        <h1 class="heading contact-heading">Ili nas kontaktirajte</h1>
        <p class="paragraph-2 contact">Hemingway leather Serbia<br>ulica i broj, 11000 Belgrade<br>+381 64 2345 524<br>hemingwayleather@gmail.com</p>
    </div>
@endsection
