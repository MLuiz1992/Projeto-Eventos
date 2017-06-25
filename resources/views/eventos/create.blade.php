@extends('main')

@section('title', '| Agendar Evento')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Agendar Eventos</h1>
			<hr>

			{!! Form::open(array('route' => 'eventos.store', 'data-parsley-validate' => '')) !!}
				
				{{ Form::label('solicitante', 'Solicitante:') }}
				<select class="form-control select2-multi" name="solicitante_id">
					@foreach($solicitantes as $solicitante)
						<option value='{{ $solicitante->nome }}'>{{ $solicitante->nome }}</option>
					@endforeach
				</select>
				
				{{ Form::label('nome', 'Nome:') }}
				{{ Form::text('nome', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('data', 'Data:') }}
				{{ Form::date('data', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
				
				{{ Form::label('inicio', 'Início:') }}
				{{ Form::time('inicio', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
				
				{{ Form::label('termino', 'Término:') }}
				{{ Form::time('termino', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

				{{ Form::label('salas', 'Salas:') }}
				<select class="form-control select2-multi" name="salas[]" multiple="multiple">
					@foreach($salas as $sala)
						<option value='{{ $sala->id }}'>{{ $sala->nome }}</option>
					@endforeach
				</select>

				{{ Form::label('datashow', 'Vai utilizar datashows?') }}
				<select name="datashow" id="datashow" class="form-control">
					<option value="Sim">Sim!</option>
					<option value="Não">Não... :(</option>
				</select>

				{{ Form::label('som', 'Vai utilizar equipamentos de som?') }}
				<select name="som" id="som" class="form-control">
					<option value="Sim">Sim!</option>
					<option value="Não">Não... :(</option>
				</select>

				{{ Form::label('microfones', 'Número de Microfones:') }}
				{{ Form::number('microfones', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

				{{ Form::label('observacoes', 'Observações:') }}
				{{ Form::text('observacoes', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255', 'placeholder' => 'Café, Itens Adicionais, etc...') ) }}
				<input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->name}}">

				{{ Form::submit('Agendar Evento', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
		</div>
	</div>

@endsection


@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>

@endsection