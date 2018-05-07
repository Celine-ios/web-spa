$('select').selectpicker();
$('#fecha_inicio').daterangepicker({
	singleDatePicker: true,
	startDate: moment()
});

$('#fecha_fin').daterangepicker({
	singleDatePicker: true,
	startDate: moment().add(6, 'days')
});

$('#activar_codigo').change(function(event) {
	if ($('#activar_codigo').is(':checked')) {
		$('#codigo').removeAttr('disabled');
	} else {
		$('#codigo').attr('disabled', 'disabled');
	}
});

$('#asignacion').change(function(event) {
	switch ($('#asignacion').val()) {
		case 'producto':
		$('.product_subcategories_id').hide(0);
		$('#products_id').selectpicker('show');
		$('.products_id').show(0);
		break;
		case 'categoria':
		$('.product_subcategories_id').show(0);
		$('.products_id').hide(0);
		break;
	}
});
