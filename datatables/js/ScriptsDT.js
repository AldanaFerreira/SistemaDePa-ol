$(document).ready(function () {
    $('#example').DataTable({
        responsive: true,
		layout: {
        top2End: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
    });
});

