@extends('base')
@section('page-title')
Create Student
@endsection

@section('page-content')
@if (sizeof($promos ?? []) > 0)
<form action="{{ route('students.store') }}" method="POST">
@csrf
@method('POST')

<div class="nes-field mt-2">
  <label for="name">Student Name</label>
  <input type="text" id="name" name="name" class="nes-input" required>
</div>
<div class="nes-field mt-2">
  <label for="surname">Student surname</label>
  <input type="text" id="surname" name="surname" class="nes-input" required>
</div>
<div class="nes-field mt-2">
  <label for="email">Student email</label>
  <input type="email" id="email" name="email" class="nes-input" required>
</div>


<div class="nes-field mt-2">
  <label for="promo_id">Promo</label>
  <div class="nes-select">
    <select required id="promo_id" name="promo_id">
      @foreach ($promos as $promo)
        <option value="{{ $promo->id }}">{{ $promo->name }} - {{ $promo->specialty }}</option>
      @endforeach
    </select>
  </div>
</div>

@if ($modules ?? false)
<div class="nes-field mt-2">
  <h4>Modules</h4>
  @foreach($modules as $module)
      <label>
        <input type="checkbox" class="nes-checkbox" id="module-{{ $module->id }}" value="{{ $module->id }}" name="modules[]"/>
        <span>{{ $module->name }}</span>
      </label>
  @endforeach
</div>
@endif

<div class="nes-field mt-2">
  <button type="submit" class="nes-btn is-success">Create</button>
</div>

</form>
@else
  <h1>Create a Promo first</h1>
  <a href="{{ route('promos.create') }}" class="nes-btn is-success">Create</a>
@endif

@endsection