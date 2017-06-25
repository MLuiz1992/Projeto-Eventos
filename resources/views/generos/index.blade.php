@extends('main')

@section('title', '| Todos os Gêneros')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<h1>Gêneros</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($generos as $genero)
					<tr>
						<th>{{ $genero->id }}</th>
						<td>{{ $genero->nome }}</td>
						<td>@if (Auth::check())
                        <a class="btn btn-primary" href="/generos/{{$genero->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('generos.destroy', $genero->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button class="btn btn-danger">Apagar</button>

                                        </form>
                                        @else
                                        @endif
                                        </td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="col-md-5">
			<div class="well">
				{!! Form::open(['route' => 'generos.store', 'method' => 'POST']) !!}
					<h2>Cadastrar novo Gênero</h2>
					{{ Form::label('nome', 'Gênero:') }}
					{{ Form::text('nome', null, ['class' => 'form-control']) }}

					&nbsp
					@if(Auth::check())
                    {{ Form::submit('Criar novo Gênero', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                    @else
                    <button class="btn btn-primary btn-block btn-h1-spacing" type="submit" disabled="disabled">Faça o login para Cadastrar!</button>
                    @endif
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection