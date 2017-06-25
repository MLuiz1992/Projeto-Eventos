@extends('main')
@section('content')
@if(Auth::check())
    <div class="container">
        <div class="row">

            <h1 class="page-header">Edição de Filmes</h1>

            <div class="col-md-6">
                <form action="{{ route('filmes.update', $filme->id) }}" method="post">
                    {{csrf_field()}}

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="nome">Título</label>
                        <input id="nome" class="form-control" type="text" name="titulo" value="{{$filme->titulo}}">

                    </div>
                    <div class="form-group">
                        <label for="ano">Ano</label>
                        <input id="ano" class="form-control" type="text" name="ano" value="{{$filme->ano}}">
                    </div>

                    <div class="form-group">
                    <label for="ano">Gênero</label>
                    <select name="genero" id="genero" class="form-control">
                            
                            @foreach($generos as $genero)
                                <option value="{{$genero->id}}">{{$genero->nome}}</option>
                            @endforeach
                            
                    </select>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    @else
        <h1 class="text-center">Opa fion, tá se achando espertinho né? Faz o login, ô Animal de teta!</h1>
@endif
@endsection