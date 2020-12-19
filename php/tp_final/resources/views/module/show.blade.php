@extends('base')
@section('page-title')
Module {{ $module->name }}
@endsection

@section('page-content')

<style>
  .msg-grid {
    display: grid;
    grid-template-columns: 112px 1fr;
  }
</style>

<section class="message-list">
  <section class="message -left msg-grid">
    <i class="nes-pokeball"></i>
    <div>
      <div class="nes-balloon from-left"><p>Module name: {{ $module->name }}</p></div>
      <br>
      <div class="nes-balloon from-left">
        <p>Module description:</p>
        <p>{{ $module->description }}</p>
      </div>
      <br>
      <div class="nes-balloon from-left">
        <p>In Promos:</p>
        <ul>
          @forelse ($module->promos ?? [] as $promo)
              <li><a href="{{ route('promos.show', ['promo' => $promo]) }}">{{ $promo->name }} - {{ $promo->specialty   }}</a></li>
          @empty
              <li>none</li>
          @endforelse
        </ul>
      </div>
      <br>
      <div class="nes-balloon from-left">
        <p>Attendees:</p>
        <ul>
          @forelse ($module->students ?? [] as $student)
              <li><a href="{{ route('students.show', ['student' => $student]) }}">{{ $student->name }} {{ $student->surname }} ({{ $student->email }})</a></li>
          @empty
              <li>None</li>
          @endforelse
        </ul>
      </div>
    </div>
  </section>
</section>

<form action="{{ route('modules.destroy', ['module' => $module]) }}" method="POST">
  @csrf
  @method('DELETE')
  <a class="nes-btn is-success" href="{{ route('modules.edit', ['module' => $module]) }}">Edit</a>
  <button class="nes-btn is-error">Delete</button>
</form>
  
@endsection