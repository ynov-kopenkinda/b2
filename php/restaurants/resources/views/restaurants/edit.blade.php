@extends('templates.page')

@section('title')
Restaurants
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{route('restaurants.update', $restaurant->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name" class="required">Full name</label>
          <input value="{{$restaurant->name}}" type="text" class="form-control" name="name" id="name" placeholder="Full name" required>
        </div>
        <div class="form-group">
          <label for="address" class="required">Address</label>
          <input value="{{$restaurant->address}}" type="text" class="form-control" name="address" id="address" placeholder="Address" required>
        </div>
        <div class="form-group">
          <label for="city" class="required">City</label>
          <input value="{{$restaurant->city}}" type="text" class="form-control" name="city" id="city" placeholder="City" required>
        </div>
        <div class="form-group">
          <label for="postal_code" class="required">Post Code</label>
          <input value="{{$restaurant->postal_code}}" type="text" class="form-control" name="postal_code" id="postal_code" placeholder="XXXXX" required>
        </div>
        <div class="form-group">
          <label for="website" class="required">Website</label>
          <input value="{{$restaurant->website}}" type="text" class="form-control" name="website" id="website" placeholder="Website" required>
        </div>
        
        <div class="form-group">
          <label for="food_type" class="required">Food type</label>
          <input value="{{$restaurant->food_type}}" type="text" class="form-control" name="food_type" id="food_type" placeholder="Food type" required>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" placeholder="Write a short description about this restaurant.">{{$restaurant->description}}</textarea>
        </div>

        <div class="form-group">
          <label for="state" class="required">State</label>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-open" value="OPEN" required
            @if ($restaurant->state == 'OPEN')
              checked
            @endif
            >
            <label for="state-open">OPEN</label>
          </div>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-closed" value="CLOSED" required
            @if ($restaurant->state == 'CLOSED')
              checked
            @endif>
            <label for="state-closed">CLOSED</label>
          </div>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-working" value="WORKING" required
            @if ($restaurant->state == 'WORKING')
              checked
            @endif>
            <label for="state-working">WORKING</label>
          </div>
        </div>

        <button class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection