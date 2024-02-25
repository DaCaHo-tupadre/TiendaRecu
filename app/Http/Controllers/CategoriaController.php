<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('Categorias.categorias', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Categoria::create($request->all());

        return redirect()->route('verCategorias')->with('success', 'Categoría creada correctamente');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('Categorias.categoriasEdit', compact('categoria'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $categoria = Categoria::findOrFail($request->input('id'));
        $categoria->update($request->all());

        return redirect()->route('verCategorias')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Request $request)
    {
        $idCategoria = $request->input('id_categoria');
        $categoria = Categoria::findOrFail($idCategoria);
        $categoria->delete();
        return redirect()->route('verCategorias')->with('success', 'Categoría eliminada correctamente');
    }
}
