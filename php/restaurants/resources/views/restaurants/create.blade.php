@extends('templates.page')

@section('title')
Restaurants
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{route('restaurants.store')}}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="name" class="required">Full name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Full name" required>
        </div>
        <div class="form-group">
          <label for="address" class="required">Address</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
        </div>
        <div class="form-group">
          <label for="city" class="required">City</label>
          <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
        </div>
        <div class="form-group">
          <label for="postal_code" class="required">Post Code</label>
          <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="XXXXX" required>
        </div>
        <div class="form-group">
          <label for="website" class="required">Website</label>
          <input type="text" class="form-control" name="website" id="website" placeholder="Website" required>
        </div>
        
        <div class="form-group">
          <label for="food_type" class="required">Food type</label>
          <input type="text" class="form-control" name="food_type" id="food_type" placeholder="Food type" required>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description" placeholder="Write a short description about this restaurant."></textarea>
        </div>

        <div class="form-group">
          <label for="state" class="required">State</label>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-open" value="OPEN" required>
            <label for="state-open">OPEN</label>
          </div>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-closed" value="CLOSED" required checked>
            <label for="state-closed">CLOSED</label>
          </div>
          <div class="custom-radio">
            <input type="radio" name="state" id="state-working" value="WORKING" required>
            <label for="state-working">WORKING</label>
          </div>
        </div>

        <button class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection