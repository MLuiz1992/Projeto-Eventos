@extends('main')

@section('title', '| Cadastrar Sala')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Cadastro de Salas</h1>
			<hr>

			{!! Form::open(array('route' => 'salas.store', 'data-parsley-validate' => '')) !!}				
			
				{{ Form::label('id', 'Identificação da Sala:') }}
				{{ Form::text('id', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
			
				{{ Form::label('nome', 'Nome da Sala:') }}
				{{ Form::text('nome', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::submit('Cadastrar Sala', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
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