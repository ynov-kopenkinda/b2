@extends('templates.page')

@section('title')
Restaurants
@endsection

@section('content')
<div class="row">
  @forelse ($restaurants ?? [] as $restaurant)
  <div class="col-12 col-sm-6 col-lg-4">
    <div class="card">
      <div class="card-title">
        {{$restaurant->name}}
      </div>
      <p>
        <span class="badge">{{$restaurant->state}}</span>
      </p>
      <div class="mt-20">
        <a href="{{route('restaurants.show', $restaurant)}}" class="btn btn-primary">More</a>
        <a href="{{route('restaurants.edit', $restaurant)}}" class="btn mx-2">Edit</a>
        <form class="d-inline" method="POST" action="{{route('restaurants.destroy', $restaurant)}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">
    <h1>😢 Nothing to show here...</h1>
  </div>
  @endforelse
</div>
@endsection