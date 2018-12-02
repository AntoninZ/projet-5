var DataValidate = {
    regex_phone : new RegExp(/(^0[0-9]{9}$)/),
    regex_zipCode : new RegExp(/([0-9]{5}$)/),
    regex_email : new RegExp(/([\w-\.]+@[\w\.]+\.{1}[\w]+)/),
	
	phoneNumber: function() {
	    if($('#phoneNumber').val().length > 0)
	    {
		var verifyPhoneNumber;
		
		if (this.regex_phone.test($('#phoneNumber').val()) === false)
		{
		    $('#phoneNumber').css('border', '1px solid #ff6565');
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
		    $('#cellphoneNumber').css('border', '1px solid #ff6565');
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
		    $('#email').css('border', '1px solid #ff6565');
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
		$('#email').css('border', '');
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
		    $('#zipCode').css('border', '1px solid #ff6565');
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