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
    <form class="" action="{{route('comics.store')}}" method="post">
      @csrf
      @method('POST')
      <input type="text" name="series" placeholder="series">
      <input type="text" name="thumb" placeholder="image">
      <input type="number" name="price" placeholder="price">
      <input type="text" name="title" placeholder="title">
      <textarea name="description" placeholder="description"></textarea>
      <input type="date" name="sale_date" placeholder="date">
      <input type="text" name="type" placeholder="type">
      <input type="submit" name="" value="save">
    </form>
  </main>
@endsection
