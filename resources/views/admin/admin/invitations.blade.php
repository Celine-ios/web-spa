@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Invitaciones</h1>
	</section>
</div>



<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-sm-12" id="contenido_principal">
			<div id="list-loteria">
				<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>CC</th>
						<th>Correo</th>
						<th>Estado</th>
						<th>Activar</th>
					</thead>
					<tbody>
						@foreach($invitation as $invi)
						<tr>
							{!!Form::model($invi,['route'=>['admin.invitations.update',$invi->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
							<td>{{$invi->id}}</td>
							<td>{{$invi->name}}</td>
							<td>{{$invi->cc}}</td>
							<td>{{$invi->email}}</td>
							<td class="{{($invi->estado ? 'success': 'danger')}}">{{($invi->estado ? 'Activo': 'Inactivo')}}</td>
							<td><!--<a href="{{ route('admin.invitations.edit', $invi->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;-->
								{!!Form::open(['route'=> ['admin.invitations.destroy', $invi->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}
								<button type="submit" class="btn {{($invi->active ? 'btn-danger': 'btn-success')}}" onclick="{{($invi->active ? 'return confirm(\'¿Desea eliminar éste registro?\');': 'return confirm(\'¿Desea activar éste registro?\');')}}"><span class="glyphicon  {{($invi->active ? 'glyphicon-remove': 'glyphicon-ok')}}" aria-hidden="true"></span></button>
								{!!Form::close()!!}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $invitation->links() }}
			<div class="text-center"></div>
		</div>
	</div>
</div>
</div>

@endsection
