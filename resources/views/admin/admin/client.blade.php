@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Clientes</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<a href="{{ route('admin.client.create') }}" class="btn btn-primary col-sm-3"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Cliente</a>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="col-sm-12" id="contenido_principal">
			<div id="list-loteria">
				<table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Correo</th>
						<th>Estado</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							{!!Form::model($user,['route'=>['admin.client.update',$user->id],'method'=>'PUT', 'class'=> 'form-horizontal'])!!}
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->username}}</td>
							<td>{{$user->email}}</td>
							<td class="{{($user->active ? 'success': 'danger')}}">{{($user->active ? 'Activo': 'Inactivo')}}</td>
							<td><a href="{{ route('admin.client.edit', $user->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;{!!Form::open(['route'=> ['admin.client.destroy', $user->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}<button type="submit" class="btn {{($user->active ? 'btn-danger': 'btn-success')}}" onclick="{{($user->active ? 'return confirm(\'¿Desea eliminar éste registro?\');': 'return confirm(\'¿Desea activar éste registro?\');')}}"><span class="glyphicon  {{($user->active ? 'glyphicon-remove': 'glyphicon-ok')}}" aria-hidden="true"></span></button>{!!Form::close()!!}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
			<div class="text-center"></div>
		</div>
	</div>
</div>
</div>

@endsection
