var Client = {
    
    createClient: function()
    {
        $('#btnCreateClient').click(function(e)
        {
            e.preventDefault();
	    
	    var verifyLastname = DataValidate.lastname();
	    var verifyFirstname = DataValidate.firstname();
	    var requiredEmail = DataValidate.required($('#email').attr('id'));
	    var verifyEmail = DataValidate.email();
	    
	    if(!verifyLastname || !verifyFirstname || !verifyEmail || !requiredEmail)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnCreateClient').after('<p id="confirm">Erreur: champs vide(s) ou invalide()s</p>');

		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
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

		    function(data){
			location.reload();
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
            
	    var verifyLastname = DataValidate.lastname();
	    var verifyFirstname = DataValidate.firstname();
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    var verifyZipCode = DataValidate.zipCode();
	    
	    if(!verifyLastname || !verifyFirstname || !verifyPhoneNumber|| !verifyCellphoneNumber || !verifyEmail || !verifyZipCode)
	    {
		if($('#error').length === 0)
		{
		    if($('#confirm').length === 0)
		    {
			$('#btnUpdateClient').after('<p id="confirm">Erreur: champs vide(s) ou invalide()s</p>');

			setInterval(function(){
			    $('#confirm').fadeOut('slow', function(){
				$('#confirm').remove();
			    });
			}, 2000);
		    }
		}
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
			location.reload();
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

		function(data){
		    location.reload();
		}
	    );
	}
    }
    
    
};

Client.createClient();
Client.updateClient();
