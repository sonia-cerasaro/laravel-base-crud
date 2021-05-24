@extends('layouts.app')

@section('main')
  <main>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>
              {{ $error }}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
    <form class="" action="{{route('comics.update', ['comic'=>$comic->id])}}" method="post">
      @csrf
      @method('PUT')
      <input type="text" name="series" value="{{$comic->series}}" placeholder="series">
      <input type="text" name="thumb" value="{{$comic->thumb}}" placeholder="image">
      <input type="number" name="price" value="{{$comic->price}}" placeholder="price">
      <input type="text" name="title" value="{{$comic->title}}" placeholder="title">
      <textarea name="description" placeholder="description">
        {{$comic->description}}
      </textarea>
      <input type="date" name="sale_date" value="{{$comic->sale_date}}" placeholder="date">
      <input type="text" name="type" value="{{$comic->type}}" placeholder="type">
      <input type="submit" name="" value="save">
    </form>
  </main>
@endsection
