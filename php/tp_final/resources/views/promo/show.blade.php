@extends('base')
@section('page-title')
{{ $promo->name }} - {{ $promo->specialty }}
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
      <div class="nes-balloon from-left"><p>Promo name: {{ $promo->name }}</p></div>
      <br>
      <div class="nes-balloon from-left"><p>Promo specialty: {{ $promo->specialty }}</p></div>
      <br>
      <div class="nes-balloon from-left">
        <p>Related modules:</p>
        <ul>
          @forelse ($promo->modules ?? [] as $module)
              <li><a href="{{ route('modules.show', ['module' => $module]) }}">{{ $module->name }}</a></li>
          @empty
              <li>none</li>
          @endforelse
        </ul>
      </div>
    </div>
  </section>
</section>


<form action="{{ route('promos.destroy', ['promo' => $promo]) }}" method="POST">
  @csrf
  @method('DELETE')
  <a class="nes-btn is-success" href="{{ route('promos.edit', ['promo' => $promo]) }}">Edit</a>
  <button class="nes-btn is-error">Delete</button>
</form>
  
@endsection