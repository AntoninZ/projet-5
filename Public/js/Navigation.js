var Navigation = {
    
    active: function(){
	if($('.dashboard').length > 0)
	{
	    $('.nav-dashboard').click(function(e){e.preventDefault()});
	    $('.nav-dashboard').addClass('nav-active');
	}
	else if($('.getAllCandidateWithoutSession').length > 0)
	{
	    $('.nav-meeting').click(function(e){e.preventDefault()});
	    $('.nav-meeting').addClass('nav-active');
	}
	else if($('.candidateHome').length > 0)
	{
	    $('.nav-candidates').click(function(e){e.preventDefault()});
	    $('.nav-candidates').addClass('nav-active');
	}
	else if($('.companiesHome').length > 0)
	{
	    $('.nav-companies').click(function(e){e.preventDefault()});
	    $('.nav-companies').addClass('nav-active');
	}
	else if($('.userHome').length > 0)
	{
	    $('.nav-settings').click(function(e){e.preventDefault()});
	    $('.nav-settings').addClass('nav-active');
	}
    }
    
}

Navigation.active();