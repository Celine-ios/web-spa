@extends('admin.layout.index')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<section class="content-header">
		<h1 class="text-center">Administración de Roles de Usuarios</h1>
	</section>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <a href="{{ route('admin.role.create') }}" class="btn btn-primary col-sm-3"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Rol de Usuario</a>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Lista de Permisos de Usuario</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content"></div>
        <div class="row">
            <div class="col-sm-12" id="contenido_principal">
                <div id="list-loteria">
                    <table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{$role->description}}</td>
                                <td class="alin"><a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;{!!Form::open(['route'=> ['admin.role.destroy', $role->id] , 'method'=>'DELETE', 'class'=> 'form-horizontal'])!!}{!!Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('type' => 'submit', 'class'=>'btn btn-danger', 'onclick' => 'return confirm("¿Desea eliminar éste registro?");'))!!}{!!Form::close()!!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{{ $roles->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
