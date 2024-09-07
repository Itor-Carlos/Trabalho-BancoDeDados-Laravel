<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema(
 *      schema="User",
 *      type="object",
 *      title="User",
 *      required={"cpf", "name", "data_nascimento"},
 *      @OA\Property(
 *          property="cpf",
 *          description="CPF",
 *          type="biginteger",
 *          example=12345678910
 *      ),
 *      @OA\Property(
 *          property="name",
 *          description="Name",
 *          type="string",
 *          example="Itor Carlos"
 *      ),
 *      @OA\Property(
 *          property="data_nascimento",
 *          description="Data de nascimento",
 *          type="string",
 *          format="date",
 *          example="2007-04-25"
 *      )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'cpf',
        'name',
        'data_nascimento',
    ];
}
