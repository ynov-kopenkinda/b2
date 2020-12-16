@extends('templates.page')

@section('title')
Home page
@endsection

@section('content')
<h1>Nothing to show here</h1>
<a href="{{route('restaurants.index')}}" class="btn btn-primary">Go to restaurant list</a>
@endsection