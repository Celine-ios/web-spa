@extends('mercadolibre::layouts.master')
@section('title', 'Items')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Items</h1>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="portlet">
			<div class="portlet-title">
				<div class="actions btn-set text-right">
					<button type="button" name="back" class="btn btn-secondary-outline" onclick="window.history.back()"><i class="fa fa-angle-left"></i> Back</button>
					<button class="btn btn-success" onclick="window.location='{{ url('/meli/item/add') }}'"><i class="fa fa-plus"></i> Add</button>
					<div class="btn-group">
						<a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
							<i class="fa fa-share"></i> Actions
							<i class="fa fa-angle-down"></i>
						</a>
						<div class="dropdown-menu pull-right">
							<li>
								<a href="javascript:;"> Update </a>
							</li>
							<li>
								<a href="javascript:;"> Export </a>
							</li>
						</div>
					</div>
					<p></p>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<th width="1%">
								<input type="checkbox" class="group-checkable">
							</th>
							<th width="5%">ID</th>
							<th width="20%">Product&nbsp;Name</th>
							<th width="10%">Category</th>
							<th width="5%">Price</th>
							<th width="5%">Stock</th>
							<th width="5%">Sold</th>
							<th width="5%">Date&nbsp;Stop</th>
							<th width="10%">Image</th>
							<th width="5%">Actions</th>
						</thead>
						<tbody>
							@foreach($items->results as $item)
							<tr>
								<td>
									<input type="checkbox" name="id[]" value="{{ $item->id }}">
								</td>
								<td>
									<a href="{{ $item->permalink }}" target="_blank">{{ $item->id }}</a>
								</td>
								<td>
									{{ $item->title}}
								</td>
								<td>
									{{ $item->category_id }}
								</td>
								<td>
									$ {{ number_format($item->price, 2)}}
								</td>
								<td>
									{{ $item->available_quantity}}
								</td>
								<td>
									{{ $item->sold_quantity }}
								</td>
								<td>
									{{ date('Y-m-d H:i', strtotime($item->stop_time)) }}
								</td>
								<td>
									<img src="{{ $item->thumbnail }}">
								</td>
								<td>
									<a href="{{ url('/meli/item', ['id'=> $item->id]) }}" class="btn btn-sm btn-success btn-circle"><i class="fa fa-edit"></i></a>
									<a href="{{ url('/meli/item/delete', ['id'=> $item->id]) }}" class="btn btn-sm btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection