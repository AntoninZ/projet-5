var Session = {
    
    createSession: function()
    {
        $('#btnCreateSession').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
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
		    if(data.error)
		    {
			DataValidate.confirm(btn, data.error);
		    }
		    else
		    {
			location.reload();
		    }
		}
	    );
        });
    },
    
    updateSession: function()
    {
        $('#btnUpdateSession').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
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
		function(data)
		{
		   if(data.error)
		    {
			DataValidate.confirm(btn, data.error);
		    }
		    else
		    {
			DataValidate.confirm(btn, 'Informations sauvegardées !');
		    }
		}
	    );
        });
    },
    
    getAllSessionByFilter: function()
    {
	$('#btnGetAllSessionByFilter').click(function(e)
	{
	    e.preventDefault();
	    
	    var btn = $(this);
	    
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
		    if(data.error)
		    {
			DataValidate.confirm(btn, data.error);
		    }
		    else
		    {
			$('#articleGetAllSessionByFilter').html(data);
			DataTable.init();
		    }
		}
	    );
	});
    }
};

Session.createSession();
Session.updateSession();
Session.getAllSessionByFilter();

