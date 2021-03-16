@extends('layouts.app')
@section('title')
    Contacts
@endsection
@section('content')
<button class="btn btn-primary" id="create-contact">Create</button>
<div id="form-create-contact" style="display: none;">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Name:</span>
        </div>
        <input type="text" id="name-of-contact" class="form-control" placeholder="Name" aria-label="Name">
    </div>    
    <div class="input-group mb-3">
        <button class="btn btn-success" id="push-create">Create</button>
    </div>
</div>
<table class="table" id="table-list-contacts">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone numbers</th>
      <th scope="col">Emails</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($contacts as $contact)
    <tr class="contact" id="contact-{{ $contact->id }}">
      <th scope="row">{{ $contact->id }}</th>
      <td>{{ $contact->name }}</td>
      <td>
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactModal{{ $contact->id }}">
        View
        </button>

        <!-- Modal -->
        <div class="modal fade" id="contactModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="contactModal{{ $contact->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModal{{ $contact->id }}Label">{{ $contact->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (sizeof($contact->phones) > 0):
                    <h3>Phone Numbers: </h3>
                    @foreach ($contact->phones as $phone)
                        {{ $phone->content }}
                    @endforeach                    
                @else 
                    __('No Phone numbers for this contact')
                @endif
                @if (sizeof($contact->emails) > 0):
                    <h3>Email addresses: </h3>
                    @foreach ($contact->emails as $email)
                        {{ $email->content }}
                    @endforeach                    
                @else 
                    __('No Email Addresses for this contact')
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
      </td>
      <td>
        <button class="btn btn-danger delete-contact" id="{{ $contact->id }}">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection