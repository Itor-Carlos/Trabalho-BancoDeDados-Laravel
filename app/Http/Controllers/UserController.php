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
            'cpf' => 'required|numeric|digits:11|unique:users,cpf',
            'name' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);

        if ($validacao->fails()) {
            $erros = $validacao->errors();
            $errosFormatados = [];

            foreach ($erros->toArray() as $campo => $mensagens) {
                $errosFormatados[$campo] = implode(', ', $mensagens);
            }

            return response()->json($errosFormatados);
        }

        $usuario = User::create([
            'cpf' => $request->cpf,
            'name' => $request->name,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return response()->json($usuario,201);
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
        $userArray = User::all()->toArray();
        foreach ($userArray as &$user) {
            $user['cpf'] = $this->formatCpf($user['cpf']);
        }
        unset($user);
        return response()->json($userArray);
    }

    public function salvar(){
        return view('insert');
    }

    public function buscar(){
        return view('find_user');
    }

     /**
     * @OA\Get(
     *     path="/user",
     *     summary="Obtém informações de um usuário pelo CPF",
     *     description="Retorna os dados do usuário com base no CPF fornecido.",
     *     operationId="getUser",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="cpf",
     *         in="query",
     *         description="CPF do usuário",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="12345678900"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuário encontrado",
     *         @OA\JsonContent(
     *             @OA\Property(property="nome", type="string", example="João Silva"),
     *             @OA\Property(property="cpf", type="string", example="12345678900"),
     *             @OA\Property(property="data_nascimento", type="string", example="1990-01-01")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado"
     *     )
     * )
     */
        public function getUser(Request $request)
    {
        $cpfUser = $request->input('cpf');
        $user = User::where('cpf', $cpfUser)->first();

        if ($user) {
            if (strlen($user['cpf']) < 11) {
                $user['cpf'] = $this->formatCpf($user['cpf']);
            }
        }

        return $user ? response()->json($user, 200) : response()->json([
            "message" => "Usuário não encontrado"
        ], 404);
    }

    public function formatCpf($cpf)
    {
        return str_pad($cpf, 11, '0', STR_PAD_LEFT);
    }
}
