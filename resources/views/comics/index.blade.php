@extends('layouts.app')

@section('main')
<main>
  @foreach($comics as $comic)
  <div class="card">
    <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
    <h4>{{$comic->title}}</h4>
    <h5>{{$comic->price}}</h5>
    <p>{{$comic->series}}</p>
  </div>
  @endforeach

</main>

@endsection
