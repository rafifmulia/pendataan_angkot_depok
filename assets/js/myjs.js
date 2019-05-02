switch (window.location.pathname) {
	case '/projects/pendataan_angkot/app/view/dashboard.php':
		// do
		break;
	case '/projects/pendataan_angkot/app/view/olah_juragan.php':
		$(function () {
		    $('#olahJuragan').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
	    	});
		});
		break;
	case '/projects/pendataan_angkot/app/view/olah_supir.php':
		$(function () {
		    $('#olahSupir').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
	    	});
		});
		break;
	case '/projects/pendataan_angkot/app/view/olah_angkot.php':
		$(function() {
			$('#olahAngkot').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/olah_rute.php':
		$(function() {
			$('#olahRute').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/olah_jadwal.php':
		$(function() {
			$('#olahJadwal').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/olah_penggunaan.php':
		$(function() {
			$('#olahPenggunaan').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/data_supir.php':
		$(function() {
			$('#dataSupir').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/data_juragan.php':
		$(function() {
			$('#dataJuragan').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/data_angkot.php':
		$(function() {
			$('#dataAngkot').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
	case '/projects/pendataan_angkot/app/view/data_angkot1.php':
		$(function() {
			$('#dataAngkot1').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : true,
		      'info'        : true,
		      'autoWidth'   : true
		    });
		});
		break;
}