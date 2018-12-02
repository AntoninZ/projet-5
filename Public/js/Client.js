var Client = {
    
    createClient: function()
    {
        $('#btnCreateClient').click(function(e)
        {
            e.preventDefault();
	    
            $.post(
                'index.php?action=createClient',
                {
		    idCompany : $('#idCompany').val(),
		    firstname : $('#firstname').val(),
		    lastname : $('#lastname').val(),
		    email : $('#email').val()    
                },
                
                function(data){
                    location.reload();
                }
            );
        });
    },
    
    updateClient: function()
    {
        $('#btnUpdateClient').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=updateClient',
                {
		    idClient : $('#idClient').val(),
		    idCompany : $('#idCompany').val(),
		    firstname : $('#firstname').val(),
		    lastname : $('#lastname').val(),
		    gender : $('#gender').val(),
		    address : $('#address').val(),
		    zipCode : $('#zipCode').val(),
		    city : $('#city').val(),
		    phoneNumber : $('#phoneNumber').val(),
		    cellphoneNumber : $('#cellphoneNumber').val(),
		    email : $('#email').val()
                },
                
                function(data){
		    location.reload();
                }
            );
        });
    },
    
    deleteClient: function(idClient)
    {
	var confirmation = confirm('Voulez-vous supprimer ce client ?');

	if(confirmation)
	{
	    $.post(
		'index.php?action=deleteClient',
		{
		    idClient : idClient
		},

		function(data){
		    //location.reload();
		}
	    );
	}
    }
    
    
};

Client.createClient();
Client.updateClient();
