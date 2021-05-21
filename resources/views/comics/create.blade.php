@extends('layouts.app')

@section('main')
  <main>
    <form class="" action="{{route('comics.store')}}" method="post">
      @csrf
      @method('POST')
      <input type="text" name="series" value="" placeholder="title">
      <input type="text" name="thumb" value="" placeholder="image">
      <input type="text" name="price" value="" placeholder="serie">
      <input type="text" name="title" value="" placeholder="serie">
      <input type="submit" name="" value="send">
    </form>
    
  </main>
@endsection
