@extends('main')

@section('title', '| Editar Evento')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		{!! Form::model($evento, ['route' => ['eventos.update', $evento->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			{{ Form::label('nome', 'Nome:') }}
			{{ Form::text('nome', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('data', 'Data:') }}
			{{ Form::date('data', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
				
			{{ Form::label('inicio', 'Início:') }}
			{{ Form::time('inicio', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
				
			{{ Form::label('termino', 'Término:') }}
			{{ Form::time('termino', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

			{{ Form::label('Salas', 'Salas:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('salas[]', $salas, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			
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


			<input id="user_id" class="form-control" name="user_id" type="hidden" value="{{Auth::user()->name}}">
			
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Criado em:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($evento->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Modificado em:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($evento->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('eventos.show', 'Cancelar', array($evento->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Salvar Modificações', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

			</div>
		</div>

		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">

		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($evento->salas()->allRelatedIds())
			!!}).trigger('change');

	</script>

@endsection