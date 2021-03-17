@extends('layouts.app')
@section('title')
Edit {{ $contact->name }}
@endsection
@section('content')
<div id="form-edit-contact">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Name:</span>
        </div>
        <input type="text" id="name-of-the-contact" class="form-control" placeholder="Name" aria-label="Name" value="{{ $contact->name }}">
    </div>
    @if (sizeof($contact->phones) > 0):
        <h3 id="h3-phone">Phones</h3>
        @foreach ($contact->phones as $phone)
            <div class="input-group phone-number mb-3" id="phone-number-{{ $phone->id }}">
		<div class="input-group-prepend">
                    <span class="input-group-text">Phone:</span>
		</div>
		<input type="text" class="form-control" id="phone-number-of-contact-{{ $phone->id }}" placeholder="Phone" aria-label="Phone" value="{{ $phone->content }}">
		<button class="btn btn-primary update-phone" data-id="{{ $phone->id }}">Update</button>
		<button class="btn btn-danger delete-phone" data-id="{{ $phone->id }}">Delete</button>
            </div>
        @endforeach        
    @endif 
    @if (sizeof($contact->emails) > 0):
        <h3 id="h3-email">Emails</h3>
        @foreach ($contact->emails as $email)
            <div class="input-group email-address mb-3" id="email-address-{{ $email->id }}">
		<div class="input-group-prepend">
                    <span class="input-group-text">Email:</span>
		</div>
		<input type="text" class="form-control" id="email-address-of-contact-{{ $email->id }}" placeholder="Email" aria-label="Email" value="{{ $email->content }}">
            <button class="btn btn-primary update-email" data-id="{{ $email->id }}">Update</button>
            <button class="btn btn-danger delete-email" data-id="{{ $email->id }}">Delete</button>
        </div>
        @endforeach        
    @endif         
    <div class="input-group mb-3">
        <button class="btn btn-success" id="push-update" data-id="{{ $contact->id }}">Update</button>
    </div>
</div>
@endsection
