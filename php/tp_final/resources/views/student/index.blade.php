@extends('base')
@section('page-title')
All Students
@endsection

@section('page-content')

<form action="{{ route('students.index') }}">
  <div style="background-color:#212529; padding: 1rem;" class="nes-field is-inline">
    <label for="dark_field" style="color:#fff;">Search</label>
    <input type="text" id="dark_field" name="search" class="nes-input is-dark" placeholder="Search by name">
    <button class="nes-btn">find</button>
  </div>
</form>

@forelse ($students ?? '' as $student)
<div class="nes-container is-rounded mt-2">

  <span style="font-size: 1.5rem;">{{ $student->name }} {{ $student->surname }}</span>
  <p>
    <form action="{{ route('students.destroy', ['student' => $student]) }}" method="POST">
      @csrf
      @method('DELETE')
      <a class="nes-btn" href="{{ route('students.show', ['student' => $student]) }}">Details</a>
      <a class="nes-btn is-success" href="{{ route('students.edit', ['student' => $student]) }}">Edit</a>
      <button class="nes-btn is-error">Delete</button>
    </form>
  </p>
</div>
@empty
    <h1>No students found</h1>
    <a href="{{ route('students.create') }}" class="nes-btn is-success">Create one</a>
@endforelse
@endsection