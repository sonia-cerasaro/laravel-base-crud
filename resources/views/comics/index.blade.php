@extends('layouts.app')

@section('main')
<main>
  @foreach($comics as $comic)
  <div class="card">
    <a href="{{route('comics.show', ['comic' => $comic->id])}}">
      <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
      <h4>{{$comic->title}}</h4>
      <h5>{{$comic->price}}</h5>
      <p>{{$comic->series}}</p>
    </a>
    <a href="{{route('comics.show', ['comic' => $comic->id])}}">
      Open
    </a>
    <a href="{{route('comics.edit', ['comic' => $comic->id])}}">
      Edit
    </a>
    <!-- <form class="" action="{{route('comics.destroy', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('DELETE')
      <input type="submit" value="delete">
    </form> -->
  </div>
  @endforeach
</main>
<!-- <a href="{{route('comics.create',)}}">
  Create
</a> -->

@endsection
