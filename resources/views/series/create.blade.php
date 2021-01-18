@extends('layout') <!-- Extendendo a estrutura do arquivo layout-->

@section('cabecalho') <!-- Injetando a estrutura do cabelho que está no arquivo layout-->
Adicionar Séries
@endsection

@section('conteudo') <!-- Injetando a estrutura do conteudo que está no arquivo layout-->
@if ($errors->any()) <!-- IF para coletar erros gerados pelo preenchimento do campo Série -->
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) <!-- Coletando lista de erros -->
                <li>{{$error}}</li> <!-- Injetando array de erros coletados e repassando como parametro -->
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf <!-- Gera o token forjado de requisição (precisa ser dentro do método do formulário ou não funcionará) -->
    <div class="form-group">
        <label for="nome" class="">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome"> <!-- Campo para preencher as séries -->
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection


