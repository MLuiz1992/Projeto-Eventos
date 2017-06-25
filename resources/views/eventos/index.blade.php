@extends('main')

@section('title', '| Todas as Listas')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="row">
			<h1>Eventos:</h1> 	
			@if (Auth::check())		
			<a href='\listas\create' class="btn btn-primary">Marcar Evento</a>
			@else
				@endif
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
                        <th>Usuário Admin</th>
                        <th>Data</th>
                        <th>Visualizar</th>
                        <th></th>
					</tr>
				</thead>

				<tbody>
					@foreach ($eventos as $evento)
					<tr>
						<td>{{ $evento->nome }}</td>
						<td>{{ $evento->user_id }}</td>
						<td>{{ $evento->data }}</td>
						<td><a class="btn glyphicon glyphicon-eye-open" href="/eventos/{{$evento->id}}"></td>
						<td>@if (Auth::check() && $evento->user_id == Auth::user()->name )
                        <a class="btn btn-primary" href="/eventos/{{$evento->id}}/edit">
                                            Editar
                                        </a>

                                        <form style="display: inline;" action="{{route('eventos.destroy', $evento->id)}}" method="post">
                                        
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
@endsection