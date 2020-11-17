@extends('layouts.default')

@section('title')
  Contact Index
@endsection

@section('content')

  <h1>🗒 Contacts list</h1>
  <div class="row"> 
    @forelse ($storage ?? [] as $contact)
    <div class="col-12 col-md-3 mb-4">
      <div class="card">
        <div class="card-header">
          {{$contact['name']}}
        </div>
        <div class="card-body">
          {{$contact['phone']}}
        </div>
      </div>
    </div>
    @empty
    <h6 class="text-center w-100">No contacts found. 😢</h6>
    @endforelse
  </div>

@endsection