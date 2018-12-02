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
	    
	    var lastname = $('#lastname').val();
	    var firstname = $('#firstname').val();
	    var birthDate = $('#birthDate').val();
	    
            e.preventDefault();
	    
            if(lastname.length === 0 || lastname.length === 0 || birthDate.length === 0)
	    {
		if($('#error').length === 0)
		{
		    $('#btnCreateCandidate').after('<p class="center" id="error">Veuillez remplir tous les champs.</p>');
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
	    var verifyPhoneNumber = DataValidate.phoneNumber();
	    var verifyCellphoneNumber = DataValidate.cellphoneNumber();
	    var verifyEmail = DataValidate.email();
	    var verifyZipCode = DataValidate.zipCode();
	    
	    if(verifyPhoneNumber === true && verifyCellphoneNumber === true && verifyEmail === true && verifyZipCode === true)
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

		    function(data){
			location.reload();
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
                    location.reload();

                }
            );
	});
    },
    
    deleteCandidate: function(idCandidate)
    {
	var confirmation = confirm('Attention, la suppression de ce candidat est définitive !');

	if(confirmation)
	{
	    $.post(
		'index.php?action=deleteCandidate',
		{
		    idCandidate : idCandidate
		},

		function(data){
		    location.reload();
		}
	    );
	}
    }
    
    
};

Candidate.search();
Candidate.createCandidate();
Candidate.updateCandidate();
Candidate.updateCandidateWithoutSession();
