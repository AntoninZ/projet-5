var DataTable = {

    init: function()
	{
	    var table = $('.dataTable').DataTable({
		"language": {
		    "decimal":		"",
		    "emptyTable" :	"Aucun résultat",
		    "info" :		"Elements _START_ à _END_ sur _TOTAL_ résultats",
		    "infoEmpty" :	"Aucun résultat",
		    "infoFiltered" :	"(Filtré sur _MAX_ résultats",
		    "lengthMenu":	"Voir _MENU_ éléments par page",
		    "loadingRecords" :	"Chargement...",
		    "processing" :	"Traitement des informations...",
		    "search" :		"Recherche",
		    "zeroRecords" :	"Aucun résultat",
		    "paginate" :	
			{
			    "first":	    "Premier",
			    "last" :	    "Dernier",
			    "next" :	    "Suivant",
			    "previous" :    "Précédent"
			}
		},
		
		"searching": false,
		"order" : [[1, 'asc']],
		"responsive" : true,
		"columnDefs": [ {"targets": 0, "orderable": false} ]
	    });

	    table.on('order.dt search.dt', function(){
		table
		    .column(0, {order:'applied'})
		    .nodes()
		    .each(
			function(cell, i){
			cell.innerHTML = i+1;
			}
		    );

	    }).draw();
	}
}

DataTable.init();