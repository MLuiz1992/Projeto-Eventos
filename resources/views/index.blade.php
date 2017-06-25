@extends('main')

@section('title', '| Trabalho Matheus e Maxwell')

@section('content')
    <div class="container text-center">
    @if (Auth::check())
        <h1>Seja bem-vindo! Navegue à vontade!</h1>
        </div>
        <div class="col-md-6">
            <h2>Sobre:</h2>
            <p align="justify">Sistema desenvolvido por Matheus Oliveira e Maxwell Arruda
            como atividade para a aula de Programação para a Web II. Nele
            o usuário logado tem a permissão de cadastrar Filmes, Gêneros,
            e Listas de Reprodução, além de poder avaliar e visualizar as
            listas de outro usuário. Já o visitante pode tanto visualizar os Filmes,
            Gêneros e Listas como também avaliar e visualisar as listas dos demais
            usuários.</p>
        </div>
        <div class="col-md-6">
        <h2>O que foi utilizado?</h2>
            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Tecnologias:</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>PHP</td>
            </tr>
            <tr>    
                <td>Laravel</td>
            </tr>
            <tr>
                <td>JavaScript</td>
            </tr>
            <tr>
                <td>HTML</td>
            </tr>
            <tr>
                <td>Bootstrap</td>
            </tr>
            <tr>
                <td>CSS</td>
            </tr>
            </tbody>
            </table>
        </div>
       
        <div class="col-md-12">
            <div class="text-center">
            <hr>
        <h1>A dupla:</h1>
        <div class="col-sm-6">
        <img src="Mattt.png" alt="Matheus Oliveira" height="500" width="500" style="border-radius: 250px;">
        <br />
        <h3>Matheus Oliveira</h3>
        <p align="justify">Nascido na cidade de Conchal-SP, tem 16 anos e está cursando o último
        ano do curso técnico de Informática para a Internet na ETEC Pedro Ferreira Alves, torce para o São Paulo Futebol Clube.</p>
        </div>
        <div class="col-sm-6">
        <img src="Maxxx.jpg" alt="Maxwell Arruda" height="500" width="500" style="border-radius: 250px;">
        <br />
        <h3>Maxwell Arruda</h3>
        <p align="justify">Nascido na cidade de Varginha-MG, tem 16 anos e também está cursando o último
        ano do curso técnico de Informática para a Internet na ETEC Pedro Ferreira Alves exercendo paralelamente a função de estagiário,
        torce para o São Paulo Futebol Clube.</p>

        </div>
        </div>
        </div>
    @else
    <h1>
    Seja bem vindo ao sistema, faça o Login para continuar!
    </h1>
    @endif
    </div>
@endsection