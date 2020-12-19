@extends('base')
@section('page-title')
All Promos
@endsection

@section('page-content')
@forelse ($promos ?? '' as $promo)
<div class="nes-container is-rounded mt-2">

  <span style="font-size: 1.5rem;">[{{ $promo->name }}]</span>
  <span>{{ $promo->specialty }}</span>
  <p>
    <form action="{{ route('promos.destroy', ['promo' => $promo]) }}">
      <a class="nes-btn" href="{{ route('promos.show', ['promo' => $promo]) }}">Details</a>
      <a class="nes-btn is-success" href="{{ route('promos.edit', ['promo' => $promo]) }}">Edit</a>
      <button class="nes-btn is-error">Delete</button>
    </form>
  </p>
</div>
@empty
    <h1>No promos found</h1>
@endforelse
@endsection