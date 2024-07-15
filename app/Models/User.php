<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          description="Name",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="data_nascimento",
 *          description="Data de nascimento",
 *          type="date",
 *          format="date"
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
