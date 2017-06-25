@extends('main')

@section('title', '| Editar Comentário')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Editar Comentário</h1>
			
			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
			
				{{ Form::label('nota', 'Nota:') }}
				<input type="number" min="0" max="10" class="form-control" name="nota" value="nota" placeholder="Digite uma nota de 0 a 10 se desejar">
			
				{{ Form::label('comment', 'Comentário:') }}
				{{ Form::text('comment', null, ['class' => 'form-control', 'placeholder' => 'Digite seu comentário']) }}
			
				{{ Form::submit('Atualizar Comentário', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}
			
			{{ Form::close() }}
		</div>
	</div>

@endsection