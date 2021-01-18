@extends('layout') <!-- Extendendo a estrutura (modelo de visualização) do arquivo layout-->

@section('cabecalho') <!-- Injetando a estrutura (modelo de visualização) do cabelho no arquivo layout-->
Séries
@endsection

@section('conteudo') <!-- Injetando a estrutura (modelo de visualização) do conteudo no arquivo layout-->
@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}} <!-- Variável injetada pelo controlador -->
</div>
@endif
<a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a> <!-- Link para a rota que foi declarada com o nome ('form_criar_serie') no arquivo de rotas -->

<ul class="list-group">
    @foreach ($series as $serie) <!-- Laço para buscar as Series que passarem na variável serie (injetada aqui pelo controlador) -->
    <li class="list-group-item
                d-flex
                justify-content-between
                align-items-center"> <!-- css embutido -->
        {{$serie->nome}} <!-- Variáveis injetadas pelo controlador -->

        <!-- Linha abaixo chama o método post (porque o HTML não suporta o método delete diretamente) e encontra o ID do objeto serie -->
        <form method="post" action="/series/{{$serie->id}}"
             onsubmit="return confirm('Tem certeza que deseja remover a serie {{addslashes($serie->nome)}}')"> <!-- Está utilizando JS para retornar a mensagem (tipo um console.log) -->
            @csrf <!-- Gera o token forjado de requisição (precisa ser dentro do método do formulário ou não funcionará) -->
            @method('DELETE') <!-- método ('DELETE') que está sendo utilizando do PHP aqui, identifica o método post do formulário e então executa sua ação (construída no controlador) logo em seguida  -->
            <button class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
    @endforeach
</ul>
@endsection

