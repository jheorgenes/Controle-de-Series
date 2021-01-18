<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Método para visualizar toda a lista de Séries
     *
     * @param Request $request //Request está utilizando a injeção de dependências para o objeto $request
     * @return void
     */
    public function index (Request $request)
    {   /* $serie vai enviar para a requisição, uma lista de séries ordenadas */
        $series = Serie::query() //Var $series recebe a ação query da classe Serie
            ->orderBy('nome') //ordenando por nome
            ->get(); //pegando a requisição e exibindo-a


        /* $mensagem vai enviar uma sessão na requisição, exibindo uma mensagem e apagando-a em seguida quando a próxima requisição acontecer */
        $mensagem = $request->session()->get('mensagem'); //var mensagem recebe a ação do método session do objeto request, pegando a mensagem e a enviando.
        $request->session()->remove('mensagem'); //através do objeto request que recebe a sessão, executará a ação remove ('mensagem')

        //Retorna os valores da Variável $series para o arquivo index da view
        return view('series.index', compact ('series','mensagem'));
        /* A propriedade compact (nativa php) quando é utilizada no retorno,
        ela passa como parametro o valor adicionado na variável e injeta na variável (com o mesmo nome) aonde é buscado o retorno */
    }

    /**
     * Método para visualizar um item da lista
     *
     * @return tela de criação de séries
     */
    public function create()
    {
        //Retorna os valores da Variável $series para arquivo create da view
        return view('series.create');
    }

    /**
     * Método para criar uma Série na lista
     *
     * @param SeriesFormRequest $request //$request objeto está usando os atributos e métodos da classe SeriesFormRequest
     * Essa classe extende da classe FormRequest (necessária para também implementar seus métodos)
     * @return redirecionamento para a lista de séries
     */
    public function store(SeriesFormRequest $request)
    {

        $serie = Serie::create($request->all()); //Var $serie recebe toda a requisão criada pelo método create que foi chamado
        $request->session() //Grava a sessão
                ->flash( //Exibe a mensagem que dura somente uma requisição
                    'mensagem',
                    "Serie {$serie->id} criada com sucesso {$serie->nome}" //Mensagem da sessão que será enviada
            );

        return redirect()->route('listar_series'); //Redireciona para a página /series utilizando o nome (declarado na rota)
    }

    /**
     * Método para remover uma Série da lista
     *
     * @return redirecionamento para a lista de séries
     */
    public function destroy(Request $request)
    {
        Serie::destroy($request->id); //Utiliza o Fascade para executar o método destroy, aonde (através da injeção de dependências) o objeto request (que foi recebido como parametro) aponta o id

        $request->session() //Grava a sessão
                ->flash( //Exibe a mensagem que dura somente uma requisição
                    'mensagem',
                    "Série foi removida com sucesso"
                );
        return redirect()->route('listar_series'); //Redireciona para a página /series utilizando o nome (declarado na rota)
    }
}

