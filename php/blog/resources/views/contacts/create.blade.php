@extends ('layouts.default')

@section ('title')
Create Contact
@endsection


@section('content')

<form class="card" method="POST" action="{{route('contacts.store')}}">
  @csrf
  <div class="card-header">
    <h3>🗒 Create contact</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="name-input">First name</label>
      <input type="text" class="form-control" name="name" id="name-input" aria-describedby="name-input_help">
      <small id="name-input_help" class="form-text text-muted">Your name</small>
    </div>
    <div class="form-group">
      <label for="phone-input">Phone mumber</label>
      <input type="text" class="form-control" name="phone" id="phone-input" aria-describedby="phone-input_help">
      <small id="phone-input_help" class="form-text text-muted">Your phone: Ex 7 (XXX) XXX XX-XX</small>
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection
