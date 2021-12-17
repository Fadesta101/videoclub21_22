<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas = Movie::all();
        return view('catalog.index',
        array('arrayPeliculas' => $peliculas));
    }

    public function getShow($id)
    {
        return view('catalog.show',
        array(
            'pelicula' => Movie::find($id)));
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function getEdit($id)
    {
        return view('catalog.edit',
        array(
            'id' => $id,
            'pelicula' => Movie::find($id)));
    }

    public function changeRented($id)
    {
        $pelicula = Movie::find($id);
        $pelicula->rented = !($pelicula->rented);
        $pelicula->save();
        return redirect('/catalog/show/' . $id);
    }
}
