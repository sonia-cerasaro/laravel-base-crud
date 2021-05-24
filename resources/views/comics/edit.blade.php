@extends('layouts.app')

@section('main')
  <main>
    <form class="" action="{{route('comics.store', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('GET')
      <input type="text" name="series" value="{{$comic->series}}" placeholder="series">
      <input type="text" name="thumb" value="{{$comic->thumb}}" placeholder="image">
      <input type="number" name="price" value="{{$comic->price}}" placeholder="serie">
      <input type="text" name="title" value="{{$comic->title}}" placeholder="title">
      <textarea name="description" value="{{$comic->description}}" placeholder="description"></textarea>
      <input type="date" name="sale_date" value="{{$comic->sale_date}}" placeholder="date">
      <input type="text" name="type" value="{{$comic->type}}" placeholder="type">
      <input type="submit" name="" value="send">
      <a href="{{route('comics.edit', ['comic'=>$comic->id])}}"></a>
    </form>
  </main>
@endsection
