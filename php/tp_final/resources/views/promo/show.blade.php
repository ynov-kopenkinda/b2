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
    </div>
  </section>
</section>
  
@endsection