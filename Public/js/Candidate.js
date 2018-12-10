var Candidate = {
    
    search: function()
    {
        $('#search').keyup(function(e)
        {
	    e.preventDefault();
	    
	    var btn = $(this);
	    
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
			if(data.error)
			{
			    alert(data.error);
			}
			else
			{
			    $('#getAllCandidate').html(data);
			    DataTable.init();
			}
		    }
		);
	    }
        });
    },
    
    createCandidate: function()
    {
        $('#btnCreateCandidate').click(function(e)
        {
	    e.preventDefault();
	    
	    var btn = $(this);
	    
	    var verifyLastname = DataValidate.required($('#lastname').attr('id'));
	    var verifyFirstname = DataValidate.required($('#firstname').attr('id'));
	    var verifyBirthDate = DataValidate.required($('#birthDate').attr('id'));
	    
            if(!verifyLastname || !verifyFirstname || !verifyBirthDate)
	    {
		DataValidate.confirm(btn, 'Champs requis');
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

		    function(data)
		    {
			if(data.error)
			{
			    DataValidate.confirm(btn, data.error);
			}
			else
			{
			    window.location.replace("?page=candidates&idCandidate="+data);
			}
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
	    
	    var btn = $(this);
	    
	    var requiredLastname = DataValidate.required($('#lastname').attr('id'));
	    var requiredFirstname = DataValidate.required($('#firstname').attr('id'));
	    var verifyFirstname = DataValidate.firstname();
	    var verifyLastname = DataValidate.lastname();
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    var verifyZipCode = DataValidate.zipCode();
	    
	    if(!requiredFirstname || !requiredLastname || !verifyLastname || !verifyFirstname || !verifyPhoneNumber || !verifyCellphoneNumber || !verifyEmail || !verifyZipCode)
	    {
		DataValidate.confirm(btn, 'Erreur : champs invalide(s) ou vide(s).')
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
    },
    
    createCandidateWithoutSession: function()
    {
	$('#btnCreateCandidateWithoutSession').click(function(e)
	{
	    e.preventDefault();
	    
	    var btn = $(this);
	    
	    var requiredLastname = DataValidate.required($('#lastname').attr('id'));
	    var requiredFirstname = DataValidate.required($('#firstname').attr('id'));
	    var requiredEmail = DataValidate.required($('#email').attr('id'));
	    
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    
	    if(!requiredLastname || !requiredFirstname || !requiredEmail || !verifyPhoneNumber || !verifyCellphoneNumber || !verifyEmail)
	    {
		DataValidate.confirm(btn, 'Erreur : champs invalide(s) ou vide(s).')
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
    },
    
    updateCandidateWithoutSession: function()
    {
	$('#btnUpdateCandidateWithoutSession').click(function(e)
	{
	    e.preventDefault();
	    
	    var btn = $(this);
	    
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
		
		function(data)
		{
		    if(data.error)
		    {
			alert(data.error);
		    }
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
