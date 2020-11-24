@extends ('layouts.default')

@section ('title')
Create Contact
@endsection


@section('content')

<form class="card" method="post" action="{{route('contacts.store')}}">
  @csrf
  @method('POST')
  <div class="card-header">
    <h3>🗒 Create contact</h3>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label class="col-3 col-form-label">First Name</label>
      <div class="col-9"><input type="text" class="form-control" name="firstname"></div>
    </div>
    <div class="form-group row">
      <label class="col-3 col-form-label">Last Name</label>
      <div class="col-9"><input type="text" class="form-control" name="lastname"></div>
    </div>
    <div class="form-group row">
      <label class="col-3 col-form-label">Phone number</label>
      <div class="col-9"><input type="text" class="form-control" name="phone"></div>
    </div>
    <div class="form-group row">
      <label class="col-3 col-form-label">E-mail</label>
      <div class="col-9"><input type="email" class="form-control" name="email"></div>
    </div>
    <div class="form-group">
      <label class="form-label">Comments *</label>
      <textarea name="comments" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

@endsection
