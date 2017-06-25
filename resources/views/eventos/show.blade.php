@extends('main')

@section('title', '| Ver Evento')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $evento->nome }}</h1>
			
			<hr>
			<h1>Salas:</h1>
				<ul class="list-group">
				@foreach ($evento->salas as $sala)
				<li class="list-group-item">{{ $sala->nome }}</li>
			    @endforeach
				</ul>
			</tbody>
			</table>

			<hr>
			<h1>Requerimentos:</h1>
			
			<input type="button" class="btn btn-primary" data-toggle="collapse" data-target="#requerimentos" value="Detalhes">
			<div id="requerimentos" class="collapse">
			<hr>
			<ul class="list-group">
				@foreach ($events as $evento)				
					<li class="list-group-item"> <strong>Data:</strong> {{ $evento->data }} </li>
					<li class="list-group-item"> <strong>Início:</strong> {{ $evento->inicio }} </li>
					<li class="list-group-item"> <strong>Término</strong>: {{ $evento->termino }} </li>
					<li class="list-group-item"> <strong>Agendado por:</strong> {{ $evento->user_id }} </li>
					<li class="list-group-item"> <strong>Solicitante:</strong> {{ $evento->solicitante_id }} </li>
					<li class="list-group-item"> <strong>Vai utilizar datashows? </strong> {{ $evento->datashow }} </li>					
					<li class="list-group-item"> <strong>Vai utilizar som?</strong> {{ $evento->som }} </li>
					<li class="list-group-item"> <strong>Número de Microfones:</strong> {{ $evento->microfones }} </li>
					<li class="list-group-item"> <strong>Observações:</strong> {{ $evento->observacoes }} </li>					
				@endforeach
			</ul>	
			</div>
		</div>

				<div class="col-md-4">
			<div class="well">

				<dl class="dl-horizontal">
					<label>Usuário:</label>
					<p>{{ $evento->user_id }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Criado em:</label>
					<p>{{ date('M j, Y h:ia', strtotime($evento->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Modificado em:</label>
					<p>{{ date('M j, Y h:ia', strtotime($evento->updated_at)) }}</p>
				</dl>

				<hr>
				@if (Auth::check() && $evento->user_id == Auth::user()->name )
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('eventos.edit', 'Editar', array($evento->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['eventos.destroy', $evento->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Apagar', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				@else
				@endif
				&nbsp
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('eventos.index', '', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing glyphicon glyphicon-arrow-left']) }}
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection