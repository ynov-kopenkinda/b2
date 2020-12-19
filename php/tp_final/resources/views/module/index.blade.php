@extends('base')
@section('page-title')
All Promos
@endsection

@section('page-content')
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