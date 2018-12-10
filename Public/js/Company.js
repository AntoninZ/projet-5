var Company = {
    
    createCompany: function()
    {
        $('#btnCreateCompany').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
	    var requiredName = DataValidate.required($('#name').attr('id'));
	    
	    if(!requiredName)
	    {
		DataValidate.confirm(btn, 'Erreur : champs vide.');
	    }
	    else
	    {
		$.post(
		    'index.php?action=createCompany',
		    {
			name : $('#name').val()   
		    },

		    function(data){
			if(data.error)
			{
			    DataValidate.confirm(btn, data.error);
			}
			else
			{
			    window.location.replace('?page=clients&idCompany='+data);
			}
		    }
		);
	    }
        });
    },
    
    updateCompany: function()
    {
        $('#btnUpdateCompany').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
	    var requiredName = DataValidate.required($('#name').attr('id'));
	    
	    if(!requiredName)
	    {
		DataValidate.confirm(btn, 'Erreur : champs vide.');
	    }
	    else
	    {
		$.post(
		    'index.php?action=updateCompany',
		    {
			name : $('#name').val(),
			idCompany : $('#idCompany').val()
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
	    }
        });
    }
    
    
};

Company.createCompany();
Company.updateCompany();