var DataValidate = {
    regex_alphabetic : new RegExp(/(^[A-Za-z]+$)/),
    regex_phone : new RegExp(/(^0[0-9]{9}$)/),
    regex_zipCode : new RegExp(/([0-9]{5}$)/),
    regex_email : new RegExp(/([\w-\.]+@[\w\.]+\.{1}[\w]+)/),
	
	required : function(a) {
	    var verify;
	    
	    if($('#'+a).val().length === 0)
	    {
		$('#'+a).css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		verify = false;
	    }
	    else
	    {
		$('#'+a).css('border', '');
		verify = true;
	    }
	    
	    return verify;
	},
	
	firstname : function() {
	    
	    var verifyFirstname;
	    
	    if($('#firstname').val().length > 0)
	    {
		if(this.regex_alphabetic.test($('#firstname').val()) === false)
		{
		    $('#firstname').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyFirstname = false;
		}
		else
		{
		    $('#firstname').css('border', '');
		    verifyFirstname = true;
		}
	    }
	    else
	    {
		$('#firstname').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		verifyFirstname = false;
	    }
	    
	    return verifyFirstname;
	},
	
	lastname: function() {
	    var verifyFirstname;
	    
	    if($('#lastname').val().length > 0)
	    {
		if(this.regex_alphabetic.test($('#lastname').val()) === false)
		{
		    $('#lastname').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyFirstname = false;
		}
		else
		{
		    $('#lastname').css('border', '');
		    verifyFirstname = true;
		}
	    }
	    else
	    {
		$('#lastname').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		verifyFirstname = false;
	    }
	    
	    return verifyFirstname;
	},
	
	phoneNumber: function() {
	    if($('#phoneNumber').val().length > 0)
	    {
		var verifyPhoneNumber;
		
		if (this.regex_phone.test($('#phoneNumber').val()) === false)
		{
		    $('#phoneNumber').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyPhoneNumber = false;
		    console.log("petit test");
		}
		else
		{
		    $('#phoneNumber').css('border', '');
		    verifyPhoneNumber = true;
		}
	    }
	    else
	    {
		$('#phoneNumber').css('border', '');
		verifyPhoneNumber = true;
	    }
	    
	    return verifyPhoneNumber;
	},
	
	cellphoneNumber: function() {
	    if($('#cellphoneNumber').val().length > 0)
	    {
		var verifyCellphoneNumber;
		
		if(this.regex_phone.test($('#cellphoneNumber').val()) === false)
		{
		    $('#cellphoneNumber').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyCellphoneNumber = false;
		}
		else
		{
		    $('#cellphoneNumber').css('border', '');
		    verifyCellphoneNumber = true;
		}
	    }
	    else
	    {
		$('#cellphoneNumber').css('border', '');
		verifyCellphoneNumber = true;
	    }
	    
	    return verifyCellphoneNumber;
	},
	
	email: function() {
	    if($('#email').val().length > 0)
	    {
		var verifyEmail;
		
		if(this.regex_email.test($('#email').val()) === false)
		{
		    $('#email').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyEmail = false;
		}
		else
		{
		    $('#email').css('border', '');
		    verifyEmail = true;
		}
	    }
	    else
	    {
		verifyEmail = true;
	    }
	    
	    return verifyEmail;
	},
	
	zipCode: function() {
	    if($('#zipCode').val().length > 0)
	    {
		var verifyZipCode;
		
		if(this.regex_zipCode.test($('#zipCode').val()) === false)
		{
		    $('#zipCode').css({'border' : '1px solid #ff8c8c', 'background-color' : '#ff8c8c'});
		    verifyZipCode = false;
		}
		else
		{
		    $('#zipCode').css('border', '');
		    verifyZipCode = true;
		}
	    }
	    else
	    {
		$('#zipCode').css('border', '');
		verifyZipCode = true;
	    }
	    
	    return verifyZipCode;
	}
};