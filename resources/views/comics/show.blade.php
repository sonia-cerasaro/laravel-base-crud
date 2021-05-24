@extends('layouts.app')

@section('main')
    <h2>{{$comic->series}}</h2>
    <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
    <h5>{{$comic->price}}</h5>
    <h5>{{$comic->title}}</h5>
    <a href="{{route('comics.index')}}">Torna indietro</a>
    <a href="{{route('home')}}">Home</a>

    <form class="" action="{{route('comics.destroy', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('DELETE')
      <input type="submit" value="delete">
    </form>

@endsection
