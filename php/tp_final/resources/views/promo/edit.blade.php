@extends('base')
@section('page-title')
Edit Promo
@endsection

@section('page-content')
<form action="{{ route('promos.update', ['promo' => $promo]) }}" method="POST">
@csrf
@method('PUT')

<div class="nes-field mt-2">
  <label for="name">Promo name</label>
  <input type="text" id="name" name="name" class="nes-input" required value="{{ $promo->name }}">
</div>
<div class="nes-field mt-2">
  <label for="specialty">Promo specialty</label>
  <input type="text" id="specialty" name="specialty" class="nes-input" required value="{{ $promo->specialty}}">
</div>
<div class="nes-field mt-2">
  <button type="submit" class="nes-btn is-success">Update</button>
</div>
  

</form>
@endsection