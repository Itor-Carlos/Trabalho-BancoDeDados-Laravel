<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Info(title="User Controller", version="0.1")
 */
class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/users",
     *     summary="Create a new user",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"cpf","name","email"},
     *             @OA\Property(property="cpf", type="integer", example="12345678910"),
     *             @OA\Property(property="name", type="string", example="Itor Carlos"),
     *             @OA\Property(property="data_nascimento", type="date", example="2007-04-25")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validacao = Validator::make($request->all(), [
            'cpf' => 'required|integer',
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

    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Get list of users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="List of users",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index()
    {
        return view('list',["users" => User::all()]);
    }

    public function salvar(){
        return view('insert');
    }
}
