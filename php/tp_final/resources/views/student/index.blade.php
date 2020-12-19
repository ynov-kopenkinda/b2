@extends('base')
@section('page-title')
All Students
@endsection

@section('page-content')
@forelse ($students ?? '' as $student)
<div class="nes-container is-rounded mt-2">

  <span style="font-size: 1.5rem;">{{ $student->name }}</span>
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