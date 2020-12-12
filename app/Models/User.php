<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ramsey\Uuid\Type\Integer;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'balance',
    ];

    /**
     * Relacionamento
     * 
     */
    public function historic()
    {
        return $this->hasMany(Historic::class);
    }

    /**
     * Retorna saldo do usuário
     *  
     * @param string   $cpf
     * @return \App\User
     */
    public static function getUserBalance($cpf)
    {
        return User::where('cpf', $cpf)->first('balance');
    }

    /**
     * Retorna o histórico de movimentações do usuário
     *  
     * @param string   $cpf
     * @return \App\Historic
     */
    public static function getUserHistoric($cpf)
    {
        return User::firstWhere('cpf', $cpf)->historic;
    }

    /**
     * Decrementa do saldo da conta do usuário
     *  
     * @param array   $request
     * 
     */
    public static function postDebitAccount(string $cpf, float $value)
    {
        return User::where('cpf', $cpf)->decrement('balance', $value);
    }

     /**
     * Incrementa o saldo da conta do usuário
     *  
     * @param array   $request
     * 
     */
    public static function postCreditAccount(string $cpf, float $value )
    {
        return User::where('cpf', $cpf)->increment('balance', $value);
    }

    public static function registerAction($cpf,$array){
        $user=User::firstWhere('cpf', $cpf);
        $user->historic()->create($array);
    }
}
