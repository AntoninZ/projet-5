var Candidate = {
    
    search: function()
    {
        $('#search').keyup(function(e)
        {
	    
	    e.preventDefault();
	    
	    if($(this).val().length > 0)
	    {
		$.post(
		    'index.php?action=search',
		    {
			lastname : $('#search').val(),
			email : $('#search').val(),
			phoneNumber : $('#search').val(),
			cellphoneNumber : $('#search').val()
		    },

		    function(data)
		    {
			$('#getAllCandidate').html(data);
			DataTable.init();
		    }
		);
	    }
        });
    },
    
    createCandidate: function()
    {
        $('#btnCreateCandidate').click(function(e)
        {
	    
	    var verifyLastname = DataValidate.required($('#lastname').attr('id'));
	    var verifyFirstname = DataValidate.required($('#firstname').attr('id'));
	    var verifyBirthDate = DataValidate.required($('#birthDate').attr('id'));
	    
            e.preventDefault();
	    
            if(!verifyLastname || !verifyFirstname || !verifyBirthDate)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnCreateCandidate').after('<p id="confirm">Veuillez remplir tous les champs.</p>');
		}
	    }
	    else
	    {
		$.post(
		    'index.php?action=createCandidate',
		    {
			lastname : $('#lastname').val(),
			firstname : $('#firstname').val(),
			birthDate : $('#birthDate').val()
		    },

		    function(data){
			window.location.replace("?page=candidates&idCandidate="+data);
		    }
		);
	    }
        });
    },
    
    updateCandidate: function()
    {
        $('#btnUpdateCandidate').click(function(e)
        {
            e.preventDefault();
	    
	    var verifyLastname = DataValidate.required($('#lastname').attr('id'));
	    var verifyFirstname = DataValidate.required($('#firstname').attr('id'));
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    var verifyZipCode = DataValidate.zipCode();
	    
	    if(!verifyLastname || !verifyFirstname || !verifyPhoneNumber || !verifyCellphoneNumber || !verifyEmail || !verifyZipCode)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnUpdateCandidate').after('<p id="confirm">Erreur : champs invalide(s) ou vide(s).</p>');
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
		    'index.php?action=updateCandidate',
		    {
			firstname : $('#firstname').val(),
			lastname : $('#lastname').val(),
			birthDate : $('#birthDate').val(),
			gender : $('#gender').val(),
			email : $('#email').val(),
			phoneNumber : $('#phoneNumber').val(),
			cellphoneNumber : $('#cellphoneNumber').val(),
			address : $('#address').val(),
			zipCode : $('#zipCode').val(),
			city : $('#city').val(),
			allowable : $('#allowable').val(),
			idCandidate : $('#idCandidate').val()
		    },

		    function(){
			if($('#confirm').length === 0)
			{
			    $('#btnUpdateCandidate').after('<p id="confirm">Informations sauvegardées !</p>')
			    
			    setInterval(function(){
				$('#confirm').fadeOut('slow', function(){
				    $('#confirm').remove();
				});
			    }, 1000);
			}
		    }
		);
	    }
        });
    },
    
    createCandidateWithoutSession: function()
    {
	$('#btnCreateCandidateWithoutSession').click(function(e)
	{
	    e.preventDefault();
	    
	    var requiredLastname = DataValidate.required($('#lastname').attr('id'));
	    var requiredFirstname = DataValidate.required($('#firstname').attr('id'));
	    var requiredEmail = DataValidate.required($('#email').attr('id'));
	    
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    
	    if(!requiredLastname || !requiredFirstname || !requiredEmail || !verifyPhoneNumber || !verifyCellphoneNumber || !verifyEmail)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnCreateCandidateWithoutSession').after('<p id="confirm">Erreur : champs invalide(s) ou vide(s).</p>');
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
		    'index.php?action=createCandidateWithoutSession',
		    {
			lastname : $('#lastname').val(),
			firstname : $('#firstname').val(),
			email : $('#email').val(),
			phoneNumber : $('#phoneNumber').val(),
			cellphoneNumber : $('#cellphoneNumber').val(),
			creationDate : $('#creationDate').val(),
			downPayment : $('#downPayment').val(),
			reservationDate : $('#reservationDate').val(),
			meeting : $('#meeting').val(),
			assistantNote : $('#assistantNote').val()
		    },

		    function(data){
			window.location.replace("?page=candidates&idCandidate="+data);
		    }
		);
	    }
	});
    },
    
    updateCandidateWithoutSession: function()
    {
	$('#btnUpdateCandidateWithoutSession').click(function(e)
	{
	    e.preventDefault();
	    
	    $.post(
                'index.php?action=updateCandidateWithoutSession',
                {
                    creationDate : $('#creationDate').val(),
		    downPayment : $('#downPayment').val(),
		    reservationDate : $('#reservationDate').val(),
		    assistantNote : $('#assistantNote').val(),
		    meeting : $('#meeting').val(),
                    idCandidate : $('#idCandidate').val()
                },
                
                function(data){
			if($('#confirm').length === 0)
			{
			    $('#btnUpdateCandidateWithoutSession').after('<p id="confirm">Informations sauvegardées !</p>')
			    
			    setInterval(function(){
				$('#confirm').fadeOut('slow', function(){
				    $('#confirm').remove();
				});
			    }, 1000);
			}
		    }
            );
	});
    },
    
    deleteCandidate: function(idCandidate)
    {
	var confirmation = confirm('Attention, la suppression d\'un candidat et de ces informations est définitive !');

	if(confirmation)
	{
	    $.post(
		'index.php?action=deleteCandidate',
		{
		    idCandidate : idCandidate
		},

		function(){
		    window.location.replace("?page=candidates");
		}
	    );
	}
    }
    
    
};

Candidate.search();
Candidate.createCandidate();
Candidate.updateCandidate();
Candidate.createCandidateWithoutSession();
Candidate.updateCandidateWithoutSession();
