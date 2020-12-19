@extends('base')
@section('page-title')
{{ $student->name }} - {{ $student->surname }}
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
      <div class="nes-balloon from-left">
        <p>Name: {{ $student->name }}</p>
        <p>Surname: {{ $student->surname }}</p>
      </div>
      <br>
      <div class="nes-balloon from-left">
        <p>This student participates in:</p>
        <ul>
          @forelse ($student->modules ?? [] as $module)
              <li><a href="{{ route('modules.show', ['module' => $module]) }}">{{ $module->name }}</a></li>
          @empty
              <li>Nothing</li>
          @endforelse
        </ul>
      </div>
      <br>
      <div class="nes-balloon from-left">
        <p>This student is part of: <a href="{{ route('promos.show', $student->promo) }}">{{ $student->promo->name }} - {{ $student->promo->specialty }}</a></p>
      </div>
    </div>
  </section>
</section>


<form action="{{ route('students.destroy', ['student' => $student]) }}" method="POST">
  @csrf
  @method('DELETE')
  <a class="nes-btn is-success" href="{{ route('students.edit', ['student' => $student]) }}">Edit</a>
  <button class="nes-btn is-error">Delete</button>
</form>
  
@endsection