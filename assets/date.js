
// $(document).ready(function() {
// 	$('#TGL_PERMOHONAN').daterangepicker({
// 		timePicker: true,
// 		showDropdowns: true,
// 		locale: {
// 			format: 'DD MMM YYYY',
// 			separator: ' s/d ',
// 		},
// 		startDate: moment(),
//        endDate: moment().add(1, 'year').subtract(1, 'day'),

// 		alwaysShowCalendars: true,
// 	});
// });

$(document).ready(function() {
	$('#TGL_PEMBAYARAN').daterangepicker({
		timePicker: true,
		showDropdowns: true,
		locale: {
			format: 'DD MMM YYYY',
			separator: ' s/d ',
		},
		startDate: moment(),
       endDate: moment().add(7, 'days'),

		alwaysShowCalendars: true,
	});
});





