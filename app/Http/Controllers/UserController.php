<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'data_nascimento' => 'required',
        ]);

        if($validacao->fails()){
            return response()->json($validacao->erros(),400);
        }

        $usuario = User::create([
            'cpf' => $request->cpf,
            'name' => $request->name,
            'data_nascimento' => $request->data_nascimento,
        ]);
        return response()->json($usuario,201);
    }


    public function index()
    {
        return view('list',["users" => User::all()]);
    }

    public function salvar(){
        return view('insert');
    }
}
