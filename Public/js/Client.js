var Client = {
    
    createClient: function()
    {
        $('#btnCreateClient').click(function(e)
        {
            e.preventDefault();
	    
	    var btn = $(this);
	    
	    var verifyLastname = DataValidate.lastname();
	    var verifyFirstname = DataValidate.firstname();
	    var requiredEmail = DataValidate.required($('#email').attr('id'));
	    var verifyEmail = DataValidate.email();
	    
	    if(!verifyLastname || !verifyFirstname || !verifyEmail || !requiredEmail)
	    {
		DataValidate.confirm(btn, 'Erreur : champs invalide(s)');
	    }
	    else {
		$.post(
		    'index.php?action=createClient',
		    {
			idCompany : $('#idCompany').val(),
			firstname : $('#firstname').val(),
			lastname : $('#lastname').val(),
			email : $('#email').val()    
		    },

		    function(data)
		    {
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
	    }
        });
    },
    
    updateClient: function()
    {
        $('#btnUpdateClient').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
	    var verifyLastname = DataValidate.lastname();
	    var verifyFirstname = DataValidate.firstname();
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    var verifyZipCode = DataValidate.zipCode();
	    
	    if(!verifyLastname || !verifyFirstname || !verifyPhoneNumber|| !verifyCellphoneNumber || !verifyEmail || !verifyZipCode)
	    {
		DataValidate.confirm(btn, 'Erreur : champs invalide(s).')
	    }
	    else {
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

		function(data)
		{
		    if(data.error)
		    {
			alert(data.error);
		    }
		    else
		    {
			location.reload();
		    }
		}
	    );
	}
    }
    
    
};

Client.createClient();
Client.updateClient();
