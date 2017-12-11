@extends('main')

@section('title', '| Todas as Salas')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<h1>Salas
			<a href="/salas/create" class="btn btn-primary">Cadastrar Sala</a></h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nome</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@forelse ($salas as $sala)
					<tr>
						<td>{{ $sala->ident }}</td>
						<td>{{ $sala->nome }}</td>
						<td>@if (Auth::check())
                        <a class="btn btn-primary" href="/salas/{{$sala->id}}/edit">
                                            Editar
                                        </a>

                                            <a href="#delete" data-toggle="modal" class="btn btn-danger">Apagar</a>
	    <div class="col-md-12">
						<div class="modal fade" id="delete">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
									<h4 class="modal-title">Plantão</h4>
									</div>
									<div class="modal-body">
                                        <h3>Você tem certeza?
										<form style="display: inline;" action="{{route('salas.destroy', $sala->id)}}" method="post">
                                        
                                             {{csrf_field()}}

                                            <input type="hidden" name="_method" value="delete">

                                            <button style="border-radius: 50px" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i></button>
											</h3>
                                        </form>
                                    </div>
								</div>
							</div>
						</div>

                                        @else
                                        @endif
                                        </td>

					</tr>
                    @empty
                    <tr>
                    <th>Nenhuma Sala Cadastrada</th>
                    </tr>
					@endforelse
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

	</div>

@endsection