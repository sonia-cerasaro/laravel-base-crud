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

      $request->validate([
        'series' => 'required|unique:comics|string|max:255',
        'thumb' => 'string',
        'description' => 'string',
        'price' => 'required|digits_between',
        'title' => 'required',
        'sale_date' => 'required',
        'date' => 'required|date',
        'type' => 'required|string',
      ]);

      $data = $request->all();

      $comic_obj = new Comic();

      $comic_obj = save($data);

      $comic = Comic::orderBy('id', 'desc')->first();

      return redirect()
      ->route('comics.show', compact('comic'));  //le funzioni store e update non ti fornisce la vista ma una volta fatte le loro operazioni di aggiornametento ti riderazionano in un altra pagina.
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
      if($comic) {
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
      $request->validate([
        'series' => 'required|unique:comics|string|max:255',
        'thumb' => 'string',
        'description' => 'string',
        'price' => 'required|digits_between',
        'title' => 'required',
        'sale_date' => 'required',
        'date' => 'required|date',
        'type' => 'required|string',
      ]);

      $data = $request->all();
      $comic = Comic::find($id);
      $comic->update($data);
      return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }

}
