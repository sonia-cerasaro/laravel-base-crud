@extends('layouts.app')

@section('main')
  <main>
    <form class="" action="{{route('comics.update', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('PATCH')
      <input type="text" name="series" value="{{$comic->series}}" placeholder="title">
      <input type="text" name="thumb" value="" placeholder="image">
      <input type="text" name="price" value="" placeholder="serie">
      <input type="text" name="title" value="" placeholder="serie">
      <input type="submit" name="" value="send">
    </form>
    <form class="" action="{{route('comics.destroy', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('DELETE')
      <input type="delete" name="delete" value="delete">
    </form>
  </main>
@endsection
