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
            'cpf' => 'required|cpf',
            'name' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);

        if ($validacao->fails()) {
            return redirect()
                ->back()
                ->withErrors($validacao)
                ->withInput();
        }

        $usuario = User::create([
            'cpf' => $request->cpf,
            'name' => $request->name,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return redirect('/users');
    }



    public function index()
    {
        return view('list',["users" => User::all()]);
    }

    public function salvar(){
        return view('insert');
    }
}
