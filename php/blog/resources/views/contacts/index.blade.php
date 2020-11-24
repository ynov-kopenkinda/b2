@extends('layouts.default')

@section('title')
  Contact Index
@endsection

@section('content')

  <h1>🗒 Contacts list</h1>
  <div class="row"> 
    @forelse ($storage ?? [] as $contact)
    <div class="col-12 col-md-4 mb-4">
      <div class="card">
        <div class="card-header">
          {{$contact['firstname']}} 
          {{$contact['lastname']}}
        </div>
        <div class="card-body">
          {{$contact['phonenumber']}} <br/>
          {{$contact['email']}}
        </div>
        <div class="card-footer">
        <a href="{{route('contacts.edit', $contact['id'])}}" class="btn btn-primary">Edit</a>
        <a href="{{route('contacts.destroy', $contact['id'])}}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
    @empty
    <h6 class="text-center w-100">No contacts found. 😢</h6>
    @endforelse
  </div>

@endsection