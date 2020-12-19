@extends('base')
@section('page-title')
All Modules
@endsection

@section('page-content')
<form action="{{ route('modules.index') }}">
  <div style="background-color:#212529; padding: 1rem;" class="nes-field is-inline">
    <label for="dark_field" style="color:#fff;">Search</label>
    <input type="text" id="dark_field" name="search" class="nes-input is-dark" placeholder="Search by name">
    <button class="nes-btn">find</button>
  </div>
</form>

@forelse ($modules ?? [] as $module)
<div class="nes-container is-rounded mt-2">

  <span style="font-size: 1.5rem;">[{{ $module->name }}]</span>
  <p>{{ $module->description }}</p>
  <p>
    <form action="{{ route('modules.destroy', ['module' => $module]) }}" method="POST">
      @csrf
      @method('DELETE')
      <a class="nes-btn" href="{{ route('modules.show', ['module' => $module]) }}">Details</a>
      <a class="nes-btn is-success" href="{{ route('modules.edit', ['module' => $module]) }}">Edit</a>
      <button class="nes-btn is-error">Delete</button>
    </form>
  </p>
</div>
@empty
    <h1>No modules found</h1>
    <a href="{{ route('modules.create') }}" class="nes-btn is-success">Create one</a>
@endforelse
@endsection