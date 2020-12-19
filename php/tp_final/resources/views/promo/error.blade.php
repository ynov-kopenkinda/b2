@extends('base')
@section('page-title')
Deletion error
@endsection

@section('page-content')
<h4 style="color: red">Please Delete all students in promo (or move to another promo) before deleting it.</h4>
<a href="{{ route('promos.show', ['promo' => $promo]) }}" class="nes-btn">Go back</a>
@endsection