@extends('layouts.app')

@section('main')
    <h2>{{$comic->series}}</h2>
    <a href="{{route('comics.show', ['comic' => $comic->id])}}">
    <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
    <h5>{{$comic->price}}</h5>
    </a>
@endsection
