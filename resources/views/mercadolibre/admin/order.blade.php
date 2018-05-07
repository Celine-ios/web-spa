@extends('mercadolibre::layouts.master')
@section('title', 'Orders')

@section('css')
<link href="{{ asset('mercadolibre/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Orders</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <!-- Begin: life time stats -->
    <div class="portlet light portlet-fit portlet-datatable bordered">
      <div class="portlet-title">
      </div>
      <div class="portlet-body">
        <div class="table-container">
          <table width="100%" class="table table-striped table-bordered table-hover" id="orders-table">
            <thead>
              <tr role="row" class="heading">
                <th width="2%">
                  <input type="checkbox" class="group-checkable">
                </th>
                <th width="5%"> Order&nbsp;# </th>
                <th width="15%"> Purchased&nbsp;On </th>
                <th width="15%"> Customer </th>
                <th width="10%"> Ship&nbsp;To </th>
                <th width="10%"> Base&nbsp;Price </th>
                <th width="10%"> Purchased&nbsp;Price </th>
                <th width="10%"> Status </th>
                <th width="10%"> Actions </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts_libs')
<!-- DataTables JavaScript -->
<script src="{{ asset('mercadolibre/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('mercadolibre/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('mercadolibre/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
@endsection
@section('scripts')
<script>
/*if (jQuery('#orders-table >tbody >tr').length != 0) {
  return
}*/

jQuery('#orders-table').DataTable({
  paging: false,
  //processing: true,
  //serverSide: true,
  ajax : '{{ url('meli/order/get_orders') }}',
  responsive: true,
  });
</script>
@endsection