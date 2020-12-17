@extends('templates.page')

@section('title')
Send us an e-mail
@endsection

@section('content')

<div class="row">
  @if ($success ?? false)
  <div class="col-12">
    <div class="card">
      Sent successefully
    </div>
  </div>
  @endif
  <div class="col-12">
    <div class="card">
      <form action="{{ route('storemail') }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
          <label for="name" class="required">Full name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Full name" required>
        </div>
        <div class="form-group">
          <label for="name" class="required">Your email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Your e-mail" required>
        </div>

        <div class="form-group">
          <label for="message">Your message</label>
          <textarea class="form-control" id="message" name="message" placeholder="Type in your message here."></textarea>
        </div>

        <button class="btn btn-warning">Send</button>

      </form>
    </div>
  </div>
</div>
@endsection