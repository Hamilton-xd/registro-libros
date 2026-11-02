<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id', 'desc')->get();
        return view('libros', compact('libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|digits:4',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anio_publicacion' => $request->anio_publicacion,
        ]);

        return redirect()->route('libros.index')->with('success', '¡Libro registrado con éxito!');
    }
}