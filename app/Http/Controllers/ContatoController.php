<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;


class ContatoController extends Controller
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
    public function editarContato(Request $request)
    {
        $contatos = DB::table('contato')
            ->where('id', $request->input('id'))
            ->get();

        return view('editar_contato', compact('contatos'));
    }

    public function salvarEditarContato(Request $request)
    {

        DB::table('contato')
            ->where('id', $request->input('id'))
            ->update(['name' => $request->input('nome'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'date_birth' => $this->inverteData($request->input('data'))]);

        return redirect('/mostrar');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mostrarContatos()
    {
        $id_user = Auth::User()->id;

        $contatos = DB::table('contato')
            ->where('user_id', $id_user)
            ->get();

        return view('listar_contatos', compact('contatos'));
    }


    public function excluirContato(Request $request)
    {
        $id = $request->input('id');
        echo($id);
        DB::table('contato')->where('id', '=', $id)->delete();

        return redirect('/mostrar');
        // return view('listar_contatos',compact('contatos'));
    }

    public function salvarContato(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:contato',
            'email' => '|email|max:255',
            'phone_number' => 'required|max:15|unique:contato',
        ]);


        $name = $request->input('name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $date_birth = $this->inverteData($request->input('data'));
        $user_id = Auth::User()->id;

        DB::table('contato')->insert(
            ['name' => $name, 'email' => $email, 'phone_number' => $phone_number, 'date_birth' => $date_birth, 'user_id' => $user_id]
        );


        return redirect('/mostrar');
    }

    function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }


}
