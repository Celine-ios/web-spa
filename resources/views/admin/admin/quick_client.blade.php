<!-- Modal content-->
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Datos del Cliente</h4>
		</div>
		<div class="modal-body">
			<table class="table">
				<tr>
					<th>Nombre: </th>
					<td>{{$user->first_name.' '.$user->last_name}}</td>
				</tr>
				<tr>
					<th>E-mail: </th>
					<td>{{$user->email}}</td>
				</tr>
				<tr>
					<th>Ciudad: </th>
					<td>{{$user->city}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>

