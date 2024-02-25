<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Usuarios.usuarios')->with('users', $users);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validar los datos del formulario
        $request->validate([
            'dni' => 'required|string|max:9|unique:users',
            'email' => 'required|email|unique:users',
            'nombre' => 'required|string|max:20|unique:users',
            'nick' => 'required|string|max:20|unique:users',
            'password' => 'required|string',
            'apellidos' => 'required|string|max:30',
            'fecha_nacimiento' => 'required|date',
            'rol' => 'required|in:admin,user',
        ]);

        // Crear el usuario
        User::create($request->all());

        return redirect()->route('verUsuarios')->with('successStore','User creado correctamente');
    }


    public function destroy(Request $request)

    {
        //dd($request);
        $idSolicitado = $request->input('idSolicitado');

        try {
            $user = User::findOrFail($idSolicitado);

            $user->delete();

            return redirect()->route('verUsuarios')->with('successDestroy', 'User eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('verUsuarios')->with('errorDestroy', 'Error al intentar eliminar Usuario'.$e);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Usuarios.usuariosEdit')->with('user', $user);
    }

    public function update(Request $request)

    {

        $id = $request->input('id');
        $user = User::findOrFail($id);

        $request->validate([

            'dni' => 'required|string|max:9',
            'email' => 'required|email',
            'nombre' => 'required|string|max:20',
            'nick' => 'required|string|max:20',
            'password' => 'required|string',
            'apellidos' => 'required|string|max:30',
            'rol' => 'required|in:admin,user',

        ]);
        if (Hash::needsRehash($request->input('password'))) {
            $hashedPassword = Hash::make($request->input('password'));
        } else {
            $hashedPassword = $request->input('password');
        }
        $user->update([
            'dni' => $request->input('dni'),
            'email' => $request->input('email'),
            'nombre' => $request->input('nombre'),
            'nick' => $request->input('nick'),
            'password' => $hashedPassword, // Utiliza la contraseña hasheada
            'apellidos' => $request->input('apellidos'),
            'rol' => $request->input('rol'),
        ]);
        //dd($user);
        return redirect()->route('verUsuarios')->with('successUpdate', 'User actualizado correctamente');
    }
}
