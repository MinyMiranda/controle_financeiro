<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Http\Requests\HandlingMoneyRequest;
use App\Http\Requests\TransferMoneyRequest;
use App\UserClass;

class UserController extends Controller
{
    /**
     * Cria novo usuário
     *  
     * @param \Illuminate\Http\Requests\StoreUserRequest   $request
     * @return string JSON
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return response()->json("Usuário criado com sucesso!");
    }

    /**
     * Retorna saldo na conta do usuário
     *  
     * @param string  $cpf
     * @return string JSON
     */
    public function balance($cpf)
    {
        return response()->json(
            User::getUserBalance($cpf)
        );
    }

    /**
     * Retorna extrato do usuário
     *  
     * @param string  $cpf
     * @return string JSON
     */
    public function historic($cpf)
    {
        return response()->json(
            User::getUserHistoric($cpf)
        );
    }

    /**
     * Realiza débito da conta do usuário
     *  
     * @param \Illuminate\Http\Requests\HandlingMoneyRequest   $request
     * @return string JSON
     */
    public function debit(HandlingMoneyRequest $request)
    {

        $debit = new UserClass;
        return response()->json(
            $debit->moneyDebit($request->validated())
        );
    }

    /**
     * Realiza crédito na conta do usuário
     *  
     * @param \Illuminate\Http\Requests\HandlingMoneyRequest   $request
     * @return string JSON
     */
    public function credit(HandlingMoneyRequest $request)
    {
        $credit = new UserClass;
        return response()->json(
            $credit->moneyCredit($request->validated())
        );
    }

     /**
     * Realiza crédito na conta do usuário
     *  
     * @param \Illuminate\Http\Requests\HandlingMoneyRequest   $request
     * @return string JSON
     */
    public function transfer(TransferMoneyRequest $request)
    {
        $credit = new UserClass;
        return response()->json(
            $credit->moneyTransfer($request->validated())
        );
    }
}
