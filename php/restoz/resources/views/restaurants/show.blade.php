@extends('templates.page')

@section('title')
Restaurants
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-title">
        {{$restaurant->name}}
      </div>
      {{-- <p>
        {{$restaurant}}
      </p> --}}
      <p><strong>Address: </strong>{{$restaurant->address}}</p>
      <p><strong>City: </strong>{{$restaurant->city}}</p>
      <p><strong>Post Code: </strong>{{$restaurant->postal_code}}</p>
      <p><strong>Website: </strong> <a href="{{$restaurant->website}}">{{$restaurant->website}}</a></p>
      <p><strong>Description: </strong>{{$restaurant->description}}</p>
      <p><strong>Food Type: </strong>{{$restaurant->food_type}}</p>
      <div class="text-right">
        <a href="{{route('restaurants.edit', $restaurant)}}" class="btn mx-2">Edit</a>
        <form class="d-inline" method="POST" action="{{route('restaurants.destroy', $restaurant)}}">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection