<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editarUsuario(Request $request)
    {
        $usuarios = DB::table('users')
            ->where('id', $request->input('id'))
            ->get();

        return view('usuarios.editar_usuario', compact('usuarios'));
    }

    public function salvarEditarUsuario(Request $request)
    {

        DB::table('users')
            ->where('id', $request->input('id'))
            ->update(['name' => $request->input('nome'),
                'email' => $request->input('email'),
                'password' =>Hash::make($request->input('senha'))]);

        return redirect('/mostrarUsuario');
    }

    public function mostrarUsuario()
    {

        $usuarios = User::all();

        return view('usuarios.listar_usuarios', compact('usuarios'));
    }


    public function excluirUsuario(Request $request)
    {
        $id = $request->input('id');
        DB::table('contato')->where('user_id', '=', $id)->delete();
        DB::table('users')->where('id','=',$id)->delete();
        return redirect('/mostrarUsuario');
    }

    public function salvarUsuario(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required|email|max:255|unique:users',

        ]);


        DB::table('users')
            ->where('id', $request->input('id'))
            ->update(['name' => $request->input('nome'),
                'email' => $request->input('email'),
                'password' =>Hash::make($request->input('senha'))]);


        $name = $request->input('nome');
        $email = $request->input('email');
        $password =Hash::make($request->input('senha'));


        DB::table('users')->insert(
            ['name' => $name, 'email' => $email,'password' => $password]
        );
        return redirect('/mostrarUsuario');
    }


}
