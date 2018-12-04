var Company = {
    
    createCompany: function()
    {
        $('#btnCreateCompany').click(function(e)
        {
            e.preventDefault();
            
	    var requiredName = DataValidate.required($('#name').attr('id'));
	    
	    if(!requiredName)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnCreateCompany').after('<p id="confirm">Erreur: champs vide.</p>');

		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
	    }
	    else
	    {
		$.post(
		    'index.php?action=createCompany',
		    {
			name : $('#name').val()   
		    },

		    function(data){
			window.location.replace('?page=clients&idCompany='+data);
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
            
	    var requiredName = DataValidate.required($('#name').attr('id'));
	    
	    if(!requiredName)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnUpdateCompany').after('<p id="confirm">Erreur: champs vide.</p>');

		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
	    }
	    else
	    {
		$.post(
		    'index.php?action=updateCompany',
		    {
			name : $('#name').val(),
			idCompany : $('#idCompany').val()
		    },

		    function(){
			
			$('#btnUpdateCompany').after('<p id="confirm">Information sauvegardée.</p>')
			
			setInterval(function(){
			    $('#confirm').fadeOut('slow', function(){
				$('#confirm').remove();
			    });
			}, 2000);
		    }
		);
	    }
        });
    }
    
    
};

Company.createCompany();
Company.updateCompany();