@extends('mercadolibre::layouts.master')
@section('title', 'Profile')

@section('css')
<link href="{{ asset('mercadolibre/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Profile</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal form-row-seperated" action="{{ url('/meli/user/update') }}" method="post">
      {{ csrf_field() }}
      <div class="portlet">
        <div class="portlet-title">
          <div class="actions btn-set text-right">
            <button class="btn btn-success"><i class="fa fa-check"></i> Save</button>
            <button class="btn btn-success"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
          </div>
        </div>
        <div class="portlet-body">
          <div class="tabbable-bordered">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_general" data-toggle="tab"> Account Data </a>
              </li>
              <li>
                <a href="#tab_meta" data-toggle="tab"> Personal Information </a>
              </li>
              <li>
                <a href="#tab_images" data-toggle="tab"> Address </a>
              </li>
              <li>
                <a href="#tab_reviews" data-toggle="tab"> Reviews</a>
              </li>
              <li>
                <a href="#tab_history" data-toggle="tab"> History </a>
              </li>
              <li>
                <a href="#tab_invoice" data-toggle="tab"> Invoice </a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab_general">
                <div class="row">
                  @if($me->logo)
                  <div class="form-group">
                    <label class="col-md-2 control-label">Logo:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[logo]" placeholder="" value="{{ $me->logo }}" readonly="true">
                    </div>
                  </div>
                  @endif
                  <div class="form-group">
                    <label class="col-md-2 control-label">Nickname:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[nickname]" placeholder="" value="{{ $me->nickname }}" readonly="true">
                      <span class="help-block">{{ $me->permalink }} <a href="{{ $me->permalink }}">Here >></a></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Registration Date:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[registration_date]" value="{{ date('d/m/Y', strtotime($me->registration_date)) }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Country:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[country]" placeholder="" value="{{ $me->country_id }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Experience:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[seller_experience]" placeholder="" value="{{ $me->seller_experience }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Site:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[site_id]" placeholder="" value="{{ $me->site_id }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Points:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[points]" placeholder="" value="{{ $me->points }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">User Type:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="account[user_type]" placeholder="" value="{{ $me->user_type }}" readonly="true">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab_meta">
                <div class="table-container">
                  <div class="form-group">
                    <label class="col-md-2 control-label">First Name:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="personal[first_name]" placeholder="" value="{{ $me->first_name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Last Name:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="personal[last_name]" placeholder="" value="{{ $me->last_name }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Email:
                      <span class="required"> * </span>
                    </label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="personal[email]" placeholder="" value="{{ $me->email }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Secure Email:</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control" name="personal[secure_email]" placeholder="" value="{{ $me->secure_email }}" readonly="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Phone:</label>
                    <div class="col-md-10">
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <span class="input-group-addon">Area Code: </span>
                        <input type="text" class="form-control" name="personal[phone][area_code]" placeholder="" value="{{ $me->phone->area_code }}">
                        <span class="input-group-addon">Phone:</span>
                        <input type="text" class="form-control" name="personal[phone][number]" placeholder="" value="{{ $me->phone->number }}">
                        <span class="input-group-addon">Ext:</span>
                        <input type="text" class="form-control" name="personal[phone][extension]" placeholder="" value="{{ $me->phone->extension }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Alternative Phone:</label>
                    <div class="col-md-10">
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <span class="input-group-addon">Area Code: </span>
                        <input type="text" class="form-control" name="personal[alternative_phone][area_code]" placeholder="" value="{{ $me->alternative_phone->area_code }}">
                        <span class="input-group-addon">Phone:</span>
                        <input type="text" class="form-control" name="personal[alternative_phone][number]" placeholder="" value="{{ $me->alternative_phone->number }}">
                        <span class="input-group-addon">Ext:</span>
                        <input type="text" class="form-control" name="personal[alternative_phone][extension]" placeholder="" value="{{ $me->alternative_phone->extension }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Identification:</label>
                    <div class="col-md-10">
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <span class="input-group-addon">Type: </span>
                        <input type="text" class="form-control" name="personal[identification][type]" placeholder="" value="{{ $me->alternative_phone->area_code }}">
                        <span class="input-group-addon">Number:</span>
                        <input type="text" class="form-control" name="personal[identification][number]" placeholder="" value="{{ $me->alternative_phone->number }}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">Company:</label>
                    <div class="col-md-10">
                      <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <span class="input-group-addon">Name: </span>
                        <input type="text" class="form-control" name="personal[company][corporate_name]" placeholder="" value="{{ $me->company->corporate_name }}">
                        <span class="input-group-addon">Brand Name: </span>
                        <input type="text" class="form-control" name="personal[company][brand_name]" placeholder="" value="{{ $me->company->brand_name }}">
                        <span class="input-group-addon">Identification: </span>
                        <input type="text" class="form-control" name="personal[company][identification]" placeholder="" value="{{ $me->company->identification }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab_images">
                <div class="row"></div>
                <table width="100%" class="table table-striped table-bordered table-hover" id="address-table">
                  <thead>
                    <tr role="row" class="heading">
                      <th> Address </th>
                      <th> Zip Code </th>
                      <th> City </th>
                      <th> State </th>
                      <th> Country </th>
                      <th> Neighborhood </th>
                      <th> Municipality</th>
                      <th> Types</th>
                      <th> Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="tab_reviews">
                <div class="table-container">
                Reviews
                </div>
              </div>
              <div class="tab-pane fade" id="tab_history">
                <div class="table-container">
                History
                </div>
              </div>
              <div class="tab-pane fade" id="tab_invoice">
                <div class="table-container">
                Invoices
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
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
jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = jQuery(e.target).attr("href"); // activated tab

  switch(target) {
    case '#tab_images':

      if ($('#address-table >tbody >tr').length != 0){
        return;
      }

      $('#address-table').DataTable({
        paging: false,
        //processing: true,
        //serverSide: true,
        ajax : '{{ url('meli/user/address') }}',
        responsive: true,
        columns: [
          { "data": "address" },
          { "data": "zip_code" },
          { "data": "city" },
          { "data": "state" },
          { "data": "country" },
          { "data": "neighborhood" },
          { "data": "municipality" },
          { "data": "types" },
          { "data": "actions" }
        ]
      });
      break;
  }  
});
</script>
@endsection