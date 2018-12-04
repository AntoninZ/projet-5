var Session = {
    
    createSession: function()
    {
        $('#btnCreateSession').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=createSession',
                {
		    idUser : $('#idUser').val(),
		    idCandidate : $('#idCandidate').val(),
		    idCompany : $('#idCompany').val(),
                    date : $('#date').val(),
		    grade : $('#grade').val(),
		    aptitude : $('#aptitude').val(),
		    psychologistNote : $('#psychologistNote').val(),
		    price : $('#price').val(),
		    computerStation : $('#computerStation').val()  
                },
                
                function(data){
                    console.log(data)
                }
            );
        });
    },
    
    updateSession: function()
    {
        $('#btnUpdateSession').click(function(e)
        {
            e.preventDefault();
            
	    var psychologistNote;
	    
	    if($('#psychologistNote')){
		psychologistNote = $('#psychologistNote').val();
	    }
	    
            $.post(
                'index.php?action=updateSession',
                {
		    idSession : $('#idSession').val(),
		    idUser : $('#idUser').val(),
		    idCompany : $('#idCompany').val(),
                    date : $('#date').val(),
		    grade : $('#grade').val(),
		    aptitude : $('#aptitude').val(),
		    psychologistNote : psychologistNote,
		    price : $('#price').val(),
		    computerStation : $('#computerStation').val()  
                },
                
                function(data){
                    location.reload();
                }
            );
        });
    },
    
    getAllSessionByFilter: function()
    {
	$('#btnGetAllSessionByFilter').click(function(e)
	{
	    e.preventDefault();
	    
	    $.post(
		'index.php?action=getAllSessionByFilter',
		{
		  date : $('#date').val(),
		  filterDate : $('#filterDate').val(),
		  idCompany : $('#idCompany').val(),
		  grade : $('#grade').val(),
		  aptitude : $('#aptitude').val()
		},
		
		function(data){
		    $('#articleGetAllSessionByFilter').html(data);
		    DataTable.init();
		}
	    );
	});
    },
    
    
};

Session.createSession();
Session.updateSession();
Session.getAllSessionByFilter();

