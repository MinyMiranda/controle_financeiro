<?php

namespace App;

use App\Models\Historic;
use App\Models\User;

class UserClass
{

    /**
     * Método que realiza o débito em conta
     * @param array $request
     * @return string
     */
    public function moneyDebit(array $request)
    {
        // Pegando saldo em conta
        $balance = User::getUserBalance($request['cpf'])['balance'];

        // Debita da conta se possível e caso não retorna mensagem de erro
        if ($balance >= $request['value']) {
            User::postDebitAccount($request['cpf'], $request['value']);

            // Registrando ação
            User::registerAction($request['cpf'], [
                'action' => 'Débito',
                'value' => $request['value'],
            ]);

            // Retornando resposta
            return "Débito feito com sucesso!";
        } else {
            // Retornando resposta
            return "Saldo em conta insuficiente para realizar débito!";
        }
    }

    /**
     * Método que realiza o crédito em conta
     * @param array $request
     * @return string
     */
    public function moneyCredit(array $request)
    {
        User::postCreditAccount($request['cpf'], $request['value']);
        // Registrando ação
        User::registerAction($request['cpf'], [
            'action' => 'Crédito',
            'value' => $request['value'],
        ]);

        // Retornando resposta de sucesso
        return "Crédito feito com sucesso";
    }

    /**
     * Método que realiza a transferência
     * @param array $request
     * @return string 
     */
    public function moneyTransfer(array $request)
    {
        User::postDebitAccount($request['cpf_sender'], $request['value']);
        User::postCreditAccount($request['cpf_receiver'], $request['value']);

        // Registrando ação
        User::registerAction($request['cpf_sender'], [
            'action' => 'Transferência',
            'value' => $request['value'],
        ]);

        // Retornando resposta de sucesso
        return "Transferência realizada com sucesso";
    }
}
