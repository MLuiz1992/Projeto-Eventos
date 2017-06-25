@extends('layouts.app')
@section('content')
    @if(Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-header">
                    Cadastrar novo Gênero
                </h1>


                <form method="post" action="{{ route('generos.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" id="nome" value="">
                    </div>

                    <button class="btn btn-success" type="submit">Cadastrar</button>

                </form>
            </div>
        </div>
    </div>
    @else
    <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
    @endif
@endsection