<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        return view('Productos.productos', compact('productos'));
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'unidades' => 'required|integer',
            'precio_unitario' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id_categoria',
        ]);

        // Crear un nuevo producto
        Producto::create($request->all());

        return redirect()->route('verProductos')->with('success', 'Producto creado correctamente');
    }


    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('Productos.productosEdit', compact('producto'));
    }


    public function update(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'unidades' => 'required|integer',
            'precio_unitario' => 'required|numeric',
            'categoria' => 'required|exists:categorias,id_categoria',
        ]);

        $producto = Producto::findOrFail($request->input('id_producto'));

        // Actualizar el producto
        $producto->update($request->all());

        return redirect()->route('verProductos')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Request $request)
    {
        $idProducto = $request->input('id_producto');
        $producto = Producto::findOrFail($idProducto);
        $producto->delete();
        return redirect()->route('verProductos')->with('success', 'Producto eliminado correctamente');
    }
}
