@extends('base')
@section('page-title')
All Promos
@endsection

@section('page-content')
<form action="{{ route('promos.index') }}">

<div style="background-color:#212529; padding: 1rem;" class="nes-field is-inline">
  <label for="dark_field" style="color:#fff;">Search</label>
  <input type="text" id="dark_field" name="search" class="nes-input is-dark" placeholder="Search by name">
  <button class="nes-btn">find</button>
</div>


</form>

@forelse ($promos ?? '' as $promo)
<div class="nes-container is-rounded mt-2">

  <span style="font-size: 1.5rem;">[{{ $promo->name }}]</span>
  <span>{{ $promo->specialty }}</span>
  <p>
    <form action="{{ route('promos.destroy', ['promo' => $promo]) }}" method="POST">
      @csrf
      @method('DELETE')
      <a class="nes-btn" href="{{ route('promos.show', ['promo' => $promo]) }}">Details</a>
      <a class="nes-btn is-success" href="{{ route('promos.edit', ['promo' => $promo]) }}">Edit</a>
      <button class="nes-btn is-error">Delete</button>
    </form>
  </p>
</div>
@empty
    <h1>No promos found</h1>
    <a href="{{ route('promos.create') }}" class="nes-btn is-success">Create one</a>
@endforelse
@endsection