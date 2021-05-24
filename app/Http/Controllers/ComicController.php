<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $comics = Comic::all();                           //:: e' una funzione statica

      return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $data = $request->all();

      $comic_obj = new Comic();
      $comic_obj->thumb = $comic['thumb'];
      $comic_obj->price = $comic['price'];
      $comic_obj->series = $comic['series'];
      $comic_obj->description = $comic['description'];
      $comic_obj->sale_date = $comic['sale_date'];
      $comic_obj->type = $comic['type'];

      $comic = Comic::orderBy('id', 'desc')->first();

      return redirect()->route('comics.show', compact('comic'));  //le funzioni store e update non ti fornisce la vista ma una volta fatte le loro operazioni di aggiornametento ti riderazionano in un altra pagina.
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $comic = Comic::find($id);
      if($comic){
        $data = [ 'comic' => $comic ];
        return view('comics.show', $data);
      }
      abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comic = Comic::find($id);
      if($comic)
      {
        $data = [ 'comic' => $comic ];
        return view('comics.edit', $data);
      }
      abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();
      $comic = Comic::find($id);
      $comic->update($data);
      return redirect()->route('comic.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comic = Comic::find($id);
      $comic->delete();
      return redirect()->route('comic.index');
    }
}
