@extends('admin.layout.index')
@section('content')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <section class="content-header">
      <h1 class="text-center">Administración de Pagos</h1>
    </section>
  </div>



  <div class="col-md-12 col-sm-12 col-xs-12 panel" style="padding: 20px">
    <div class="row">
      <div class="col-sm-12" id="contenido_principal">
        <div id="list-loteria">
          <table id="datatable" class="table" role="grid" aria-describedby="datatable_info">
            <thead>
              <th>ID</th>
              <th>Nombre</th>
              <th>CC</th>
              <th>Correo</th>
              <th>Inicio</th>
              <th>PAGOS</th>
            </thead>
            <tbody>
              @foreach ($pagos as $pago)
                <tr>
                  <td>{{$pago->id}}</td>
                  <td>{{$pago->name}}</td>
                  <td>{{$pago->cc}}</td>
                  <td>{{$pago->email}}</td>
                  <td>{{$pago->star}}</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$pago->id}}">
                    <i class="fa fa-eye"></i>
                  </button>
                </td>
                </tr>
              @endforeach


            </tbody>
          </table>
          {{ $pagos->links() }}
          <div class="text-center"></div>

          @foreach ($pagos as $pago)
            <!-- Modal -->
<div class="modal fade" id="myModal{{$pago->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">{{$pago->name}}</h4>
    </div>
    <div class="modal-body">
      <table class="table-striped" style="width:100%">
        <thead>
          <tr>
            <th>Plan</th>
            <th>Fecha del pago</th>

          </tr>
        </thead>
        @foreach ($status as $st)
          @if ($st->cc == $pago->cc)
          <tr>
            <td>{{$st->plan}}</td>
            <td>{{$st->created_at}}</td>

          </tr>
          @endif
        @endforeach
      </table>
    </div>

  </div>
</div>
</div>
          @endforeach


        </div>
      </div>
    </div>
  </div>

@endsection
