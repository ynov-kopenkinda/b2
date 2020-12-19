@extends('base')
@section('page-title')
Create Promo
@endsection

@section('page-content')
<form action="{{ route('promos.store') }}" method="POST">
@csrf
@method('POST')

<div class="nes-field mt-2">
  <label for="name">Promo name</label>
  <input type="text" id="name" name="name" class="nes-input" required>
</div>
<div class="nes-field mt-2">
  <label for="specialty">Promo specialty</label>
  <input type="text" id="specialty" name="specialty" class="nes-input" required>
</div>

@if (sizeof($modules ?? []) > 0)
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

@if (sizeof($students ?? []) > 0)
<div class="nes-field mt-2">
  <h4>Students:</h4>
  @foreach($students as $student)
      <label>
        <input type="checkbox" class="nes-checkbox" id="student-{{ $student->id }}" value="{{ $student->id }}" name="students[]"/>
        <span>{{ $student->name }} {{ $student->surname }} ({{ $student->email }})</span>
      </label>
  @endforeach
</div>
@endif

<div class="nes-field mt-2">
  <button type="submit" class="nes-btn is-success">Create</button>
</div>

</form>
@endsection