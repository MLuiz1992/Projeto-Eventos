@extends('main')

@section('title', '| Todos os Solicitantes')

@section('content')

	<div class="row">
		<div class="col-md-7">
			<h1>Solicitantes</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th>E-Mail</th>
						<th>Telefone</th>
						<th>Usuário</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($solicitantes as $solicitante)
					<tr>
						<th>{{ $solicitante->id }}</th>
						<td>{{ $solicitante->nome }}</td>
						<td>{{ $solicitante->email }}</td>
						<td>{{ $solicitante->telefone }}</td>
						<td>{{ $solicitante->user_id }}</td>
						<td>@if (Auth::check())
                        <a class="btn btn-primary" href="/solicitantes/{{$solicitante->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('solicitantes.destroy', $solicitante->id)}}" method="post">
                                        
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

		<div class="col-md-4">
			<div class="well">
				{!! Form::open(['route' => 'solicitantes.store', 'method' => 'POST']) !!}
					<h2>Cadastrar novo Solicitante</h2>
					{{ Form::label('nome', 'Nome:') }}
					{{ Form::text('nome', null, ['class' => 'form-control']) }}

					{{ Form::label('email', 'E-Mail:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}

					{{ Form::label('telefone', 'Telefone:') }}
					{{ Form::number('telefone', null, ['class' => 'form-control']) }}

					<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->name}}">
					&nbsp
					@if(Auth::check())
                    {{ Form::submit('Cadastrar novo Solicitante', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                    @else
                    <button class="btn btn-primary btn-block btn-h1-spacing" type="submit" disabled="disabled">Faça o login para Cadastrar!</button>
                    @endif				
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection