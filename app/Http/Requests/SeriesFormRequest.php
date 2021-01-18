<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/* Essa classe tem como objetivo fazer algumas validações enquanto
 utiliza os métodos da classe FormRequest para injeção de ações que estão sendo utilizadas da requisição. */
 /* A validação é uma funcionalidade do Laravel e está disponível na documentação para entendê-la. */

class SeriesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()  //Método para verificar se o usuário está autorizado a acessar a requisição.
    {
        return true; //Nesse caso, todos são autorizados.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()  //Buscando e aplicando as (regras) de validação da requisição aqui.
    {
        /* Só irá entrar nesse retorno, se a chave (nome da série) recebida como referência da classe SeriesController
        atender as regras de validação (required ou min) extendidas da classe validate */
        return [
            'nome' => 'required|min:3'
        ];
    }

    public function messages() //Exibirá a mensagem automaticamente na tela quando for utilizado as (regras) do método rules.
    {
        /* Esse retorno executará quando preenchido as regras required ou min que são regras extendidas da classe validate */
        return [
            'nome.required' => 'O campo :attribute é obrigatório', //Imprime essa mensagem na tela.
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres' //Imprime essa mensagem na tela.
        ];
    }
}
